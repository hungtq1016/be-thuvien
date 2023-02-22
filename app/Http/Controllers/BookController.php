<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookAdmin;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->limit == 'all') {
            $books = Book::all();
            $bookData = $books->map(function ($book) {
                 if ($book->status)
                    return[
                        'name' => $book->name,
                        'id' => $book->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];            
            })->filter();
            return response()->json($bookData);
        }
        return ($request->author=='admin')? 
        BookAdmin::collection(Book::all()):
        BookResource::collection(Book::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->image) {
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('images');
            $request->image->move($image_path, $image_name);

            $name = $request->name;
            $slug = Str::slug($name,'-');
            $book = Book::create([
                'name'=> $request->name,
                'slug'=> $slug,
                'image'=> $image_name,
                'country'=> $request->country,
                'desc'=> $request->desc,
                'release'=> $request->release,
                'major_id'=> $request->major_id,
                'publisher_id'=> $request->publisher_id,
                'language_id'=>$request->major_id,
                'bookshelf_id'=> $request->bookshelf_id,
                'series_id'=> $request->major_id,
                'status'=> 1,
            ]);
            $book->tags()->attach($request->tags);
            $book->authors()->attach($request->authors);
            $book->categories()->attach($request->categories);
            return new BookResource($book);
        }else{
            return collect([
                'error'=> 'Có lỗi trong quá trình chuyển file',
                'code' => '204'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book,Request $request)
    {
        if($request->limit == 'all') {
            $books = Book::all();
            $bookData = $books->map(function ($book) {
                 if ($book->status)
                    return[
                        'name' => $book->name,
                        'id' => $book->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];            
            })->filter();
            return response()->json($bookData);
        }
        return ($request->author=='admin')?
         new BookAdmin($book):
         new BookResource($book);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
