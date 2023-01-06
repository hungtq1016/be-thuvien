<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Http\Resources\DirectorResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DirectorResource::collection(Director::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDirectorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectorRequest $request)
    {
        $upload_path = public_path('images');
        $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move($upload_path, $generated_new_name);

        $name = $request->name;
        $slug = Str::slug($name,'-');
        $director = Director::create([
            'name' => $name,
            'image' =>$generated_new_name,
            'country' =>$request->country,
            'gender' =>$request->gender,
            'yob' =>$request->yob,
            'yod' =>$request->yod,
            'slug' => $slug,
            'status' => 1,
        ]);

        return new DirectorResource($director);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        return new DirectorResource($director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDirectorRequest  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirectorRequest $request, Director $director)
    {
        $data = $request->all();
        $request->validated($data);
        if ($request->hasFile('image')) {
            $upload_path = public_path('images');
            $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($upload_path, $generated_new_name);
            $data['image'] = $generated_new_name;
        }else{
            unset($data['image']);
        }

        $data['slug'] = Str::slug($data['name'],'-');
        $director ->update($data);
        return new DirectorResource($director);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        return $director->delete();
    }
    public function updateStatus(Request $request,Director $director)
    {
        $director ->update([
            'status' => $request->status,
        ]);
        return new DirectorResource($director);

    }
}
