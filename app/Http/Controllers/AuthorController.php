<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')->paginate(10);

        return response()->json([
            'authors' => AuthorResource::collection($authors),
            'message' => 'Success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return response()->json([
            'author'=> new AuthorResource($author),
            'message' => 'Author saved successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    { 
       return response()->json([
        'author' => new AuthorResource($author),
        'message' => 'success'
       ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return response()->json([
            'author' => new AuthorResource($author),
            'message' => 'Author updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
