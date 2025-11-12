<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookCopyRequest;
use App\Models\BookCopy;
use Illuminate\Http\Request;

class BookCopiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookCopies = BookCopy::paginate(10);

        return response()->json([
            'bookCopies' => $bookCopies 
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCopyRequest $request)
    {
        $bookCopy = BookCopy::create($request->validated());

        return response()->json([
            'book' => $bookCopy
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
