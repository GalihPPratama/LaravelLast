<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Student;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        $classrooms = Classroom::all();

        return view('admin.student.index',[
            'title' => 'Students',
            'students' => $students,
            'classrooms' => $classrooms,
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
    $validated = $request->validate([
        'name'         => 'required|string|max:255',
        'classroom_id' => 'required|exists:classrooms,id',
        'email'        => 'required|email|unique:students,email',
        'addressphp'   => 'nullable|string|max:255',
        'birthdate'    => 'required|date',
    ]);

    // Ensure nullable keys exist (MySQL strict mode is unforgiving if column is NOT NULL)
    $validated['addressphp'] = $validated['addressphp'] ?? null;

    Student::create($validated);

    return redirect()->back()->with('success', 'Data is Stored ! !');
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
                $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => "required|email|unique:students,email,$student->id",
            'classroom_id' => 'required|exists:classrooms,id',
            'adressphp' => 'required|string|max:255',
        ]);

        $student->update($validated);

        return back()->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('Success!', 'Data has been destroyed !');
    }
}
