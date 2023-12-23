<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\StoreAuthorRequest;

class BookController extends Controller
{
    // All Books
    public function index()
    {
        return view('book.index', [
            'books' => Book::with('authors')->Paginate(10),
        ]);
    }
    // Show Create Form
    public function create()
    {
        return View('book.create', [
            'authors' => Author::all(),
        ]);
    }

    // Store Book Data
    public function store(StoreBookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->publishing_house = $request->publishing_house;
        $book->release_date = $request->release_date;
        $book->save();
        $book->authors()->attach($request->author_id);

        return redirect('/book')->with('message', 'book created successfully!');
    }

    // Show Edit Form
    public function edit(Book $book)
    {
        return View('book.edit', [
            'book' => $book,
            'allAuthors' => Author::all(),
        ]);
    }

    // Update Book Info
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update([
            'name' => $request->name,
            'publishing_house' => $request->publishing_house,
            'release_date' => $request->release_date,
        ]);
        if ($request->filled('author_id'))
            $book->authors()->sync($request->author_id);
        return redirect('/book')->with('message', 'book update successfully!');
    }

    public function archive()
    {
        $books = Book::with('authors')->onlyTrashed()->get();
        return view('archive.book', compact('books'));
    }

    //Delete a Book Info
    public function destroy(Request $request, Book $book)
    {
        if ($book->trashed()) {
            $book->authors()->detach();
            $book->forceDelete();
            return redirect('archive/book')->with('message', 'book delete successfully!');
        } else {
            $book->delete();
            return redirect('/book')->with('message', 'book deleted successfully!');
        }
    }

    public function restore(Request $request, Book $book)
    {
        $book = Book::withTrashed()->find($request->id);
        $book->restore();
        return redirect('/book')->with('message', 'book restored successfully!');
    }
}
