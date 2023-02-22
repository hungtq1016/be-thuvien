<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Policies\LanguagePolicy;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $languages = Language::all();
            $languageData = $languages->map(function ($language) {
                 if ($language->status)
                    return[
                        'name' => $language->name,
                        'id' => $language->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];            
            })->filter();
            return response()->json($languageData);
        }
        return LanguageResource::collection(Language::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        $language = Language::create([
            'name' => $request->name,
            'status' => 1,
        ]);
        return new LanguageResource($language);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return new LanguagePolicy($language);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language ->update([
            'name' => $request->name,
        ]);
        return new LanguageResource($language);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        return $language->delete();

    }

    public function updateStatus(Request $request, Language $language)
    {
        $language ->update([
            'status' => $request->status ? false : true
        ]);
        return new LanguageResource($language);
    }
}
