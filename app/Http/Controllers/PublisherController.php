<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::paginate(10);

        return response()->json([
            'publishers' => $publishers
,        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->validated());

        return response()->json([
            'publisher' => $publisher,
            'message' => "successfully created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return response()->json([
            'publisher' => $publisher
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());

        return response()->json([
            'publisher' => $publisher
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return response()->json([
            'message' => 'publisher deleted successfully'
        ]);
    }
}
