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
    protected $productVariantRepository;

    public function __construct(ProductVariantRepository $productVariantRepository)
    {
        $this->productVariantRepository = $productVariantRepository;
    }


    /**
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
        $productvariants = $this->productVariantRepository->all();

        return $this->sendResponse($productvariants, 'Product Variant retrieved successfully', 200);
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
        $validator = Validator::make($request->only('variant_name', 'variant_group_id'), [
            'variant_name' => 'required|min:3',
            'variant_group_id' => 'required|numeric'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Create Product Variant
        $variantgroup = $this->productVariantRepository->create($validator->validated());

        return $this->sendResponse($variantgroup, 'Product Variant Created Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productVariant
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
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $productVariant)
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
        $productVariant->update($validator->validated());

        return $this->sendResponse($productVariant, 'Product Variant Updated Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productVariant->delete();

        return $this->sendResponse([], 'Product Variant Deleted Successfully', 201);
    }
}
