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
     * @OA\Get(
     *   path="/api/v1/products",
     *   summary="Fetch All Products",
     *   tags={"Products"},
     *   description="Get list of products",
     *   security={ {"BearerAuth": {} }},
     *   @OA\Response(
     *      response=200, 
     *      description="successful operation",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *      ),
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *   ),
     *   @OA\Response(
     *       response=403,
     *        description="Forbidden"
     *    )
     * ),
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
     * @OA\Post(
     *   path="/api/v1/products",
     *   operationId="storeProduct",
     *   summary="Store a product",
     *   tags={"Products"},
     *   description="Store Product",
     *   security={ {"BearerAuth": {} }},
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="Product Name",
     *                   type="string",
     *                   example="Iphone 14 Pro Max"
     *               ),
     *               @OA\Property(
     *                   property="price",
     *                   description="Product Price",
     *                   type="string",
     *                   example="2350.99"
     *               ),
     *              @OA\Property(
     *                   property="quantity",
     *                   description="Product Quantity",
     *                   type="int64",
     *                   example="30"
     *               ),
     *              @OA\Property(
     *                   property="product_variants[]",
     *                   description="Product Variants",
     *                   type="int64",
     *                   example=array()
     *               ),
     *           )
     *       )
     *   ),   
     *  @OA\Response(
     *      response=201, 
     *      description="successful operation",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *      ),
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *   ),
     *   @OA\Response(
     *       response=403,
     *        description="Forbidden"
     *    )
     * ),
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
        $validator = Validator::make($request->only('name', 'price', 'quantity', 'product_variants', 'image'), [
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
        $product->variants()->attach($validator->validated()['product_variants']);

        return $this->sendResponse(new ProductResource($product), 'Product Created Successfully', 201);
    }
    /**
     * @OA\Get(
     *   path="/api/v1/products/{id}",
     *   summary="Fetch a Product",
     *   tags={"Products"},
     *   description="Fetch a product",
     *   security={ {"BearerAuth": {} }},
     *   @OA\Parameter(
     *       name="id",
     *       description="Product id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *          type="integer"
     *       )
     *   ),
     *   @OA\Response(response=200, description="successful operation"),
     *   @OA\Response(response=401, description="Unauthorised"),
     * )
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
        $validator = Validator::make($request->only('name', 'price', 'quantity', 'product_variants', 'image'), [
            'name' => 'required|min:3',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'product_variants' => 'required|array|min:3',
            'product_variants.*' => 'required|numeric|min:1',

        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Product
        $product->update($validator->validated());

        $product->variants()->sync($validator->validated()['product_variants']);

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
