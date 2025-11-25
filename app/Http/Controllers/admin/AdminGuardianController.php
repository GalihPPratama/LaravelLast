<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guardians;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardians::paginate(10);

        return view('admin.guardian.index', [
            'title' => 'Guardians',
            'guardians' => $guardians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * (Not used because you're using modal forms)
     */
    public function create()
    {
        return abort(404); // or return a view if you want
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        Guardians::create($validated);

        return redirect()->back()->with('success', 'Guardian data has been created!');
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $guardian = Guardians::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        $guardian->update($validated);

        return redirect()->back()->with('success', 'Guardian data has been edited!');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(string $id)
    {
        $guardian = Guardians::findOrFail($id);
        $guardian->delete();

        return redirect()->back()->with('success', 'Guardian data has been deleted!');
    }
}
