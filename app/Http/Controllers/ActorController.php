<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActorResource::collection(Actor::paginate(15));
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
     * @param  \App\Http\Requests\StoreActorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActorRequest $request)
    {
        $upload_path = public_path('images');
        $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move($upload_path, $generated_new_name);

        $name = $request->name;
        $slug = Str::slug($name,'-');
        $actor = Actor::create([
            'name' => $name,
            'image' =>$generated_new_name,
            'country' =>$request->country,
            'gender' =>$request->gender,
            'yob' =>$request->yob,
            'yod' =>$request->yod,
            'slug' => $slug,
            'status' => 1,
        ]);

        return new ActorResource($actor);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActorRequest  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActorRequest $request, Actor $actor)
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
        $actor ->update($data);
        return new ActorResource($actor);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        return $actor->delete();
    }
    public function updateStatus(Request $request,Actor $actor)
    {
        $actor ->update([
            'status' => $request->status,
        ]);
        return new ActorResource($actor);

    }
}
