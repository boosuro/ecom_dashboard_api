<?php

namespace App\Http\Controllers;

use App\DataTables\VariantGroupsDataTable;
use App\Models\VariantGroup;
use Illuminate\Http\Request;

class VariantGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VariantGroupsDataTable $dataTable)
    {
        return $dataTable->render('layouts.components.index', ['module' => 'categories', 'title' => __('lang.category_add'), 'icon' => 'book']);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function show(VariantGroup $variantGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(VariantGroup $variantGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariantGroup $variantGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariantGroup $variantGroup)
    {
        //
    }
}
