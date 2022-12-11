<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Requests\ExtractionRequest;
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

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'title' => 'Add Product Variant',
            'variantgroup' => $variantgroup,
            'selectedVariantgroup' => null,
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

        if (empty($input['variant_name'])) {
            return redirect(route('productvariant.index'));
        }

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
     * @param  \App\Models\ProductVariant  $productvariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productvariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productvariant
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(ExtractionRequest $request, ProductVariant $productvariant)
    {
        $validated_data = $request->all();

        $variantgroup = $this->variantGroupRepository->pluck('variant_group_name', 'id');

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'model' => $productvariant,
            'title' => 'Edit Product Variant',
            'variantgroup' => $variantgroup,
            'selectedVariantgroup' => $productvariant->variant_group_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $productvariant
     * @return \Illuminate\Http\Response
     */
    public function update(ProductVariantRequest $request, ProductVariant $productvariant)
    {

        $input = $request->all();

        $productvariant->update($input);

        Flash::success('Product Variant Updated Successfully');

        return redirect(route('productvariant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variantGroup = $this->productVariantRepository->findWithoutFail($id);

        if (empty($variantGroup)) {
            Flash::error('Product Variant Not Found');

            return redirect(route('productvariant.index'));
        }

        $this->productVariantRepository->delete($id);

        Flash::success('Product Variant Deleted Successfully');

        return redirect(route('productvariant.index'));
    }
}
