<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display a listing of the Products.
     * 
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return $this->sendResponse($products, 'Products retrieved successfully', 200);
    }


    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Request
        $validator = Validator::make($request->only('name', 'price', 'quantity', 'product_variants'), [
            'name' => 'required|min:3',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|min:0',
            'product_variants' => 'required|array|min:3',
            'product_variants.*' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Create Product
        $product = $this->productRepository->create(array_merge(
            $validator->validated(),
            ['user_id' => auth()->id()]
        ));

        // Check if Image is part of request
        if ($request->hasFile('image')) {
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }

        // Fill Pivot table with data
        $product->variants()->createMany($validator->validated()['product_variants']);

        return $this->sendResponse(new ProductResource($product), 'Product Created Successfully', 201);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->sendResponse(new ProductResource($product), 'Product Retrieved Successfully', 201);
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
        // Validate Request
        $validator = Validator::make($request->only('name', 'price', 'quantity'), [
            'name' => 'required|min:3',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Product
        $product->update($validator->validated());

        // Check if Image is part of request
        if ($request->hasFile('image')) {
            $mediaItems = $product->getFirstMedia('images');
            if (!$mediaItems == null) {
                $mediaItems->delete(); // delete old image
            }
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }


        return $this->sendResponse(new ProductResource($product), 'Product Updated Successfully', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->sendResponse([], 'Product Deleted Successfully', 201);
    }
}
