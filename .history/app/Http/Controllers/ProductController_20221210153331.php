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
        // $product = Product::with('variants')->get();
        $product = Product::find(1)->variants;
        // $vendors = $product->variants; // Returns a Laravel Collection
        // dd($product);
        foreach ($product as $vendor) {
            // Do what you want with $vendor
            // echo $vendor->pivot->updated_at;
            echo $vendor->variant_name;
        }

        return;

        $prod = Product::with('variants')->get();
        // dd($prod);
        // echo $prod->variants->variant_name;
        // return;
        foreach ($prod as $book) {
            echo $book->variants()->variant_name;
        }

        return;

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

            $product->productvariants()->attach(isset($input['productvariants']) ? $input['productvariants'] : []);

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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
