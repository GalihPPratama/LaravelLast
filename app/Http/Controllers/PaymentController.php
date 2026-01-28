<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
        public function createSnapToken(Request $request)
    {
        $request->validate([
            'amount'      => 'required|integer|min:1000',
            'first_name'  => 'required|string',
            'email'       => 'required|email',
            'phone'       => 'required|string',
        ]);

        $orderId = 'ORDER-' . Str::uuid();
        $payload = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $request->amount,
            ],
            'customer_details' => [
                'first_name' => $request->first_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
            ],
            // 'item_details' => [...], // optional
            // 'enabled_payments' => ['gopay','bank_transfer','credit_card'], // optional
        ];

        $response = Http::withBasicAuth(config('services.midtrans.server_key'), '')
            ->post(config('services.midtrans.base_url') . '/snap/v1/transactions', $payload)
            ->json();

        $token = $response['token'] ?? null;
        $redirectUrl = $response['redirect_url'] ?? null;

        Order::create([
            'order_id'   => $orderId,
            'amount'     => (int) $request->amount,
            'status'     => 'pending',
            'snap_token' => $token,
            'meta'       => json_encode(['request' => $payload, 'response' => $response]),
        ]);

        return response()->json([
            'order_id'     => $orderId,
            'token'        => $token,
            'redirect_url' => $redirectUrl ?? (config('services.midtrans.base_url') . "/snap/v2/vtweb/{$token}"),
        ]);
    }

    public function handleNotification(Request $request)
    {
        // Midtrans sends: order_id, transaction_status, status_code, gross_amount, signature_key, etc.
        $notif = $request->all();

        // Optional: verify signature for certain payment types (credit card)
        // $this->verifySignature($notif); // implement if needed

        $orderId = $notif['order_id'] ?? null;
        $status  = $notif['transaction_status'] ?? 'pending';

        if (!$orderId) {
            return response()->json(['message' => 'Missing order_id'], 400);
        }

        $order = Order::where('order_id', $orderId)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Map Midtrans statuses to your domain
        // success: 'capture' (credit card), 'settlement' (VA/e-wallet)
        // pending: 'pending'
        // failed: 'deny'
        // cancel: 'cancel'
        // expire: 'expire'
        $mapped = match ($status) {
            'capture', 'settlement' => 'success',
            'pending'               => 'pending',
            'deny'                  => 'failed',
            'cancel'                => 'cancel',
            'expire'                => 'expire',
            default                 => 'pending',
        };

        $order->update([
            'status' => $mapped,
            'meta'   => json_encode(['notif' => $notif]),
        ]);

        return response()->json(['message' => 'OK']);
    }

    public function getStatus(string $orderId)
    {
        $order = Order::where('order_id', $orderId)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json([
            'order_id' => $order->order_id,
            'status'   => $order->status,
            'amount'   => $order->amount,
        ]);
    }

}
