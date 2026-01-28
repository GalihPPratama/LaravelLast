<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $subjects = Subject::with('teacher')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('admin.subject.index', [
            'title' => 'Subjects',
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Subject::create($validated);

        return redirect()->back()->with('success', 'Subject berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validated);

        return redirect()->back()->with('success', 'Subject berhasil diupdate!');
    }

    public function destroy()
    {
        
    }
}