<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use App\Http\Requests\ExtractionRequest;
use App\DataTables\VariantGroupsDataTable;
use App\Http\Requests\VariantGroupRequest;
use App\Repositories\VariantGroupRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class VariantGroupController extends Controller
{

    /**
     * @var VariantGroupRepository
     */
    protected $variantGroupRepository;

    public function __construct(VariantGroupRepository $variantGroupRepository)
    {
        $this->variantGroupRepository = $variantGroupRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VariantGroupsDataTable $dataTable)
    {
        return $dataTable->render('layouts.components.index', ['module' => 'VariantGroup', 'title' => 'Add Variant Group', 'icon' => 'book']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExtractionRequest $request)
    {
        $validated_data = $request->all();

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'title' => 'Add Variant Group'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VariantGroupRequest $request)
    {
        $input = $request->all();
        try {
            $this->variantGroupRepository->create($input);
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success('Variant Group Saved Successfully');

        return redirect(route('variantgroup.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function show(VariantGroup $variantgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(VariantGroup $variantgroup)
    {
        // $validated_data = $request->all();

        dd($variantgroup);

        // $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        // return view('layouts.components.modal_popup')->with([
        //     'input_fields' => $input_fields,
        //     'action' => $validated_data['action'],
        //     'module' => $validated_data['holder'],
        //     'model' => $variantgroup,
        //     'title' => 'Edit Variant Group'
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variantGroup = $this->variantGroupRepository->findWithoutFail($id);

        if (empty($variantGroup)) {
            Flash::error('Variant Group Not Found');

            return redirect(route('variantgroup.index'));
        }

        $this->variantGroupRepository->delete($id);

        Flash::success('Variant Group Deleted Successfully');

        return redirect(route('variantgroup.index'));
    }
}
