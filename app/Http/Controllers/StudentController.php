<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

$students = Student::all();
// [
//     [
//         'id' => 1,
//         'name' => 'Nabyl',
//         'mail' => 'thisgmail.com',
//         'address' => 'here'
//     ],
//     [
//         'id' => 2,
//         'name' => 'Maria',
//         'mail' => 'thisgmail.com',
//         'address' => 'there'
//     ],
//     [
//         'id' => 3,
//         'name' => 'Db',
//         'mail' => 'thisgmail.com',
//         'address' => 'where'
//     ],
//     ];

        return view('students', [
        'title' => 'students',
        'students' => $students
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
