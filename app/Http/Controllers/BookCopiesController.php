<?php

namespace App\Http\Controllers;

/**
 * Display the specified resource.
 *
 * @param \App\Models\BookCopy $bookCopy
 * @return \Illuminate\Http\JsonResponse
 */

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
            'bookCopies' => $bookCopies ,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCopyRequest $request)
    {
        $bookCopy = BookCopy::create($request->validated());

        return response()->json([
            'book' => $bookCopy,
            'message' => 'Success'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCopy $bookCopy)
    {
        return response()->json([
            'bookCopy' => $bookCopy,
            'message' => 'success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookCopyRequest $request, BookCopy $bookCopy)
    {
        $bookCopy->update($request->validated());

        return response()->json([
            'bookCopy' => $bookCopy,
            'message' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCopy $bookCopy)
    {
        $bookCopy->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
