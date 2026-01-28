<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::with('classroom')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhereHas('classroom', function ($qc) use ($search) {
                            $qc->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(3)
            ->withQueryString();



        $classrooms = Classroom::all();

        return view('admin.student.index', [
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
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email',
            'addressphp' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
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
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => "required|email|unique:students,email,{$student->id}",
        'classroom_id' => 'required|exists:classrooms,id',
        'addressphp' => 'nullable|string|max:255',
        'birthdate' => 'required|date',
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
