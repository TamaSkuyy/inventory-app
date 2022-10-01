<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Suplier;
use App\Http\Requests\StoreSuplierRequest;
use App\Http\Requests\UpdateSuplierRequest;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Suplier::get();

        return $query;
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
     * @param  \App\Http\Requests\StoreSuplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuplierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplier $suplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuplierRequest  $request
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuplierRequest $request, Suplier $suplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplier $suplier)
    {
        //
    }
}
