<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class DashController extends Controller
{
        public function index(){
            return view('components.admin.dashboard', [
        'title' => 'Admin Dashboard'
        
    ]);
    }
}
