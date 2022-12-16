<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductVariantResource;
use App\Repositories\ProductVariantRepository;
use Illuminate\Support\Facades\Validator;

class ProductVariantApiController extends Controller
{
    /**
     * @var ProductVariantRepository
     */
    protected $productvariantRepository;

    public function __construct(ProductVariantRepository $productvariantRepository)
    {
        $this->productvariantRepository = $productvariantRepository;
    }


    /**
     * @OA\Get(
     *   path="/api/v1/productvariants",
     *   operationId="getAllProductVariants",
     *   summary="Fetch All Product Variants",
     *   tags={"Product Variants"},
     *   description="Get list of product variants",
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
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display a listing of the ProductVariant.
     * 
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $productvariants = $this->productvariantRepository->all();

        return $this->sendResponse($productvariants, 'Product Variant retrieved successfully', 200);
    }


    /**
     * @OA\Post(
     *   path="/api/v1/productvariants",
     *   operationId="storeProductVariant",
     *   summary="Store a product variant",
     *   tags={"Product Variants"},
     *   description="Store Product Variant",
     *   security={ {"BearerAuth": {} }},
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="variant_name",
     *                   description="Product Variant",
     *                   type="string",
     *                   example="XL"
     *               ),
     *               @OA\Property(
     *                   property="variant_group_id",
     *                   description="Product Variant ID",
     *                   type="integer",
     *                   example="1"
     *               )
     *           )
     *       )
     *   ),   
     *  @OA\Response(
     *      response=201, 
     *      description="product variant created successfully",
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
        $validator = Validator::make($request->only('variant_name', 'variant_group_id'), [
            'variant_name' => 'required|min:3',
            'variant_group_id' => 'required|numeric'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Create Product Variant
        $variantgroup = $this->productvariantRepository->create($validator->validated());

        return $this->sendResponse($variantgroup, 'Product Variant Created Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productvariants
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productvariant)
    {
        return $this->sendResponse(new ProductVariantResource($productvariant), 'Product Variant Retrieved Successfully', 201);
    }


    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $productvariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $productvariant)
    {
        $validator = Validator::make($request->only('variant_name', 'variant_group_id'), [
            'variant_name' => 'required|min:3',
            'variant_group_id' => 'required|numeric'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Product Variant
        $productvariant->update($validator->validated());

        return $this->sendResponse(new ProductVariantResource($productvariant), 'Product Variant Updated Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $productvariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productvariant)
    {
        $productvariant->delete();

        return $this->sendResponse([], 'Product Variant Deleted Successfully', 201);
    }
}
