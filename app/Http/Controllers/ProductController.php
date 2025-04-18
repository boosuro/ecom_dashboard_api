<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Repositories\ProductRepository;
use App\Http\Requests\ExtractionRequest;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductVariantRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductController extends Controller
{

    /**  @var ProductRepository */
    protected $variantGroupRepository;

    /**  @var ProductVariantRepository */
    protected $productVariantRepository;

    public function __construct(ProductRepository $productRepository, ProductVariantRepository $productVariantRepository)
    {
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('layouts.components.index', ['module' => 'Product', 'title' => 'Add Product', 'icon' => 'gavel']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExtractionRequest $request)
    {
        $validated_data = $request->all();

        $product_variants = $this->productVariantRepository->groupedByVariantGroups();

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'title' => 'Add Product',
            'imageUrl' => asset('images/image_default.png'),
            'product_variants' => $product_variants,
            'selected_product_variants' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productRequest)
    {
        $input = $productRequest->all();

        if (empty($input['name'])) {
            return redirect(route('product.index'));
        }

        try {
            $product = $this->productRepository->create(array_merge($input, ['user_id' => auth()->id()]));

            $product->variants()->attach(isset($input['productvariants']) ? $input['productvariants'] : []);

            if (isset($input['image']) && $input['image']) {
                $product->addMediaFromRequest('image')->toMediaCollection('images');
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success('Product Saved Successfully');

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtractionRequest $request, Product $product)
    {
        $validated_data = $request->all();

        $product_variants = $this->productVariantRepository->groupedByVariantGroups();

        if ($product->hasMedia('images')) {
            $imageUrl = $product->getFirstMediaUrl('images');
        } else {
            $imageUrl = asset('images/image_default.png');
        }

        $selected_product_variants = $product->variants()->pluck('product_variant_id')->toArray();

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'model' => $product,
            'title' => 'Edit Product',
            'product_variants' => $product_variants,
            'selected_product_variants' => $selected_product_variants,
            'imageUrl' => $imageUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $input = $request->all();

        try {
            $product->update($input);
            $product->variants()->sync(isset($input['productvariants']) ? $input['productvariants'] : []);
            if (isset($input['image']) && $input['image']) {
                $mediaItems = $product->getFirstMedia('images');
                if (!$mediaItems == null) {
                    $mediaItems->delete();
                }
                $product->addMediaFromRequest('image')->toMediaCollection('images');
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }


        Flash::success('Product Updated Successfully');

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->variants()->detach();
        $product->delete();

        Flash::success('Product Deleted Successfully');

        return redirect(route('product.index'));
    }
}
