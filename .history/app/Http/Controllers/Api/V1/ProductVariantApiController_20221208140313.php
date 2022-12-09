<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $variantgroups = $this->productVariantRepository->all();

        return $this->sendResponse($variantgroups, 'Product Variant retrieved successfully', 200);
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
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|min:3'
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
     * @param  \App\Models\ProductVariant  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $variantGroup)
    {
        return $this->sendResponse($variantGroup, 'Product Variant Retrieved Successfully', 201);
    }


    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $variantGroup)
    {
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|min:3'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Product Variant
        $variantGroup->update($validator->validated());

        return $this->sendResponse($variantGroup, 'Product Variant Updated Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $variantGroup)
    {
        $variantGroup->delete();

        return $this->sendResponse([], 'Product Variant Deleted Successfully', 201);
    }
}
