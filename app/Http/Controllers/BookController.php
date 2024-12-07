<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Gate::allows('view-any', Book::class)) {
            return Book::all();
        }

        return Book::whereBelongsTo($request->user())->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        return $request->user()->books()->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        Gate::authorize('view', $book);

        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        Gate::authorize('update', $book);

        return $book->update($request->validate([
            'title' => 'string',
            'description' => 'string',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Gate::authorize('delete', $book);

        $book->delete();

        return response()->noContent();
    }
}
