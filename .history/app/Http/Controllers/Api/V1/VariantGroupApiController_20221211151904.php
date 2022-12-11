<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VariantGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repositories\VariantGroupRepository;

class VariantGroupApiController extends Controller
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
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display a listing of the VariantGroup.
     * 
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $variantgroups = $this->variantGroupRepository->all();

        return $this->sendResponse($variantgroups, 'Variant Group retrieved successfully', 200);
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
        $validator = Validator::make($request->only('variant_group_name'), [
            'variant_group_name' => 'required|min:3'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Create Variant Group
        $variantgroup = $this->variantGroupRepository->create(array_merge($validator->validated(), ['description' => $request->input('description')]));

        return $this->sendResponse($variantgroup, 'Variant Group Created Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function show(VariantGroup $variantGroup)
    {
        return $this->sendResponse($variantGroup, 'Variant Group Retrieved Successfully', 201);
    }


    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariantGroup $variantGroup)
    {
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|min:3'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Variant Group
        $variantGroup->update(array_merge($validator->validated(), ['description' => $request->input('description')]));

        return $this->sendResponse($variantGroup, 'Variant Group Updated Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariantGroup $variantGroup)
    {
        $variantGroup->delete();

        return $this->sendResponse([], 'Variant Group Deleted Successfully', 201);
    }
}
