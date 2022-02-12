<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuperheroeResource;
use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Superheroe::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $superheroe = new Superheroe;
        $superheroe->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function show($superheroe)
    {
        $superheroe = Superheroe::find($superheroe);
        return $superheroe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $superheroe)
    {
        $superheroe = Superheroe::find($superheroe);
        $superheroe->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function destroy($superheroe)
    {

        $superheroe = Superheroe::find($superheroe);
        $superheroe->delete();
        // return SuperheroeResource::collection($superheroe);
    }
}
