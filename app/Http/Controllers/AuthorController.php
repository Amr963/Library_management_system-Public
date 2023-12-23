<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'author.index',
            [
                'authors' => Author::Paginate(10)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'authors_name' => $request->authors_name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
        ]);
        return redirect('/author')->with('message', 'Author Created successfully!!');
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
    public function edit(Author $author)
    {
        return View('author.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([
            'authors_name' => $request->authors_name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
        ]);
        return redirect('/author')->with('message', 'Author update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Author $author)
    {
        $author->books()->detach($request->id);
        $author->delete();
        return redirect('/author')->with('message', 'Author deleted successfully!');
    }
}
