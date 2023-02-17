<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use App\Http\Requests\StoreBookshelfRequest;
use App\Http\Requests\UpdateBookshelfRequest;
use App\Http\Resources\BookShelfResource;
use App\Models\Book;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookShelfResource::collection(Bookshelf::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookshelfRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookshelfRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function show(Bookshelf $bookshelf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookshelf $bookshelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookshelfRequest  $request
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookshelfRequest $request, Bookshelf $bookshelf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookshelf $bookshelf)
    {
        //
    }
}
