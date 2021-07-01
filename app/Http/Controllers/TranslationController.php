<?php

namespace App\Http\Controllers;

use App\Http\Resources\TranslationResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Translation;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(TranslationResource::collection(Translation::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(), [
            'table' => 'required',
            'row' => 'required',
            'column' => 'required',
            'value' => 'required'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new TranslationResource(Translation::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation)
    {
        return response(new TranslationResource($translation), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translation $translation)
    {

        $validate = Validator::make($request->toArray(), [
            'table' => 'required',
            'row' => 'required',
            'column' => 'required',
            'value' => 'required'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new TranslationResource(
            $translation->update($validate->validate())
        ), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translation $translation)
    {
        $translation->delete();

        return response(null, 204);
    }
}
