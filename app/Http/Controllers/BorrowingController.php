<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBorrowingRequest;
use App\Http\Resources\BorrowingResource;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowing = Borrowing::with('member', 'bookCopy')->paginate(10);

        return BorrowingResource::collection($borrowing);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowingRequest $request)
    {
        $borrowing = Borrowing::create($request->validated());

        return (new BorrowingResource($borrowing));
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        return new BorrowingResource($borrowing);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBorrowingRequest $request, Borrowing $borrowing)
    {
        $borrowing->update($request->validated());

        return new BorrowingResource($borrowing);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return response()->json(['message' => 'Record deleted successfully'],200);
    }
}
