<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Requests\ExtractionRequest;
use App\Http\Requests\VariantGroupRequest;
use App\DataTables\ProductVariantDataTable;
use App\Http\Requests\ProductVariantRequest;
use App\Repositories\VariantGroupRepository;
use App\Repositories\ProductVariantRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductVariantController extends Controller
{

    /**  @var ProductVariantRepository */
    protected $productVariantRepository;

    /**  @var VariantGroupRepository */
    protected $variantGroupRepository;

    public function __construct(ProductVariantRepository $productVariantRepository, VariantGroupRepository $variantGroupRepository)
    {
        $this->productVariantRepository = $productVariantRepository;
        $this->variantGroupRepository = $variantGroupRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductVariantDataTable $dataTable)
    {
        dd(ProductVariant::with('variantgroup')->select('variant_group_name'));
        dd($this->productVariantRepository->variantgroup->variant_group_name);

        return $dataTable->render('layouts.components.index', ['module' => 'ProductVariant', 'title' => 'Add Product Variant', 'icon' => 'book']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExtractionRequest $request)
    {
        $validated_data = $request->all();

        $variantgroup = $this->variantGroupRepository->pluck('variant_group_name', 'id');
        $selectedVariantgroup = [];

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'title' => 'Add Product Variant',
            'variantgroup' => $variantgroup,
            'selectedVariantgroup' => $selectedVariantgroup,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVariantRequest $request)
    {
        $input = $request->all();
        try {
            $this->productVariantRepository->create($input);
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success('Product Variant Saved Successfully');

        return redirect(route('productvariant.index'));
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
    public function edit(ExtractionRequest $request, VariantGroup $variantgroup)
    {
        $validated_data = $request->all();

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'model' => $variantgroup,
            'title' => 'Edit Variant Group'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function update(VariantGroupRequest $request, VariantGroup $variantgroup)
    {

        $input = $request->all();

        $variantgroup->update($input);

        Flash::success('Variant Group Updated Successfully');

        return redirect(route('variantgroup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variantGroup = $this->productVariantRepository->findWithoutFail($id);

        if (empty($variantGroup)) {
            Flash::error('Variant Group Not Found');

            return redirect(route('variantgroup.index'));
        }

        $this->productVariantRepository->delete($id);

        Flash::success('Variant Group Deleted Successfully');

        return redirect(route('variantgroup.index'));
    }
}
