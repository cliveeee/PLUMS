<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::with(['questions.answers'])->get(); // Eager load related data
        return response()->json(['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Quiz instance
        $quiz = new Quiz();

        // Assign values from the request to the quiz object
        $quiz->title = $request->title;
        $quiz->course_id = $request->course_id;
        $quiz->level = $request->level;

        // Save the quiz to the database
        $quiz->save();

        // Redirect to the quizzes index page with a success message
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully');
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
        $quiz = Quiz::findOrFail($id);
        $courses = Course::all();
        return view('quizzes.edit', [
            'quiz' => $quiz, 'courses' => $courses,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'level' => 'required|string|max:255',
        ]);

        $quiz->update($validatedData);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }
    public function delete($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quizzes.delete', compact('quiz'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz moved to trash successfully.');
    }
    public function trash()
    {
        $trashedQuizzes = Quiz::onlyTrashed()->get();
        return view('quizzes.trash', compact('trashedQuizzes'));
    }

    public function restore($id)
    {
        $quiz = Quiz::onlyTrashed()->findOrFail($id);
        $quiz->restore();
        return redirect()->route('quizzes.trash')->with('success', 'Quiz restored successfully.');
    }

    public function remove($id)
    {
        $quiz = Quiz::onlyTrashed()->findOrFail($id);
        $quiz->forceDelete();
        return redirect()->route('quizzes.trash')->with('success', 'Quiz permanently deleted.');
    }

    public function restoreAll()
    {
        Quiz::onlyTrashed()->restore();
        return redirect()->route('quizzes.trash')->with('success', 'All quizzes restored successfully.');
    }

    public function empty()
    {
        Quiz::onlyTrashed()->forceDelete();
        return redirect()->route('quizzes.trash')->with('success', 'All quizzes permanently deleted.');
    }


}
