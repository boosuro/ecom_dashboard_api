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
     * @OA\Get(
     *   path="/api/v1/variantgroups",
     *   operationId="getAllVariantGroups",
     *   summary="Fetch All Variant Groups",
     *   tags={"Variant Groups"},
     *   description="Get list of Variant Groups",
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
     * Display a listing of the Variant Group.
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
     * @OA\Post(
     *   path="/api/v1/variantgroups",
     *   operationId="storeVariantGroup",
     *   summary="Store a variant group",
     *   tags={"Variant Groups"},
     *   description="Store Variant Group",
     *   security={ {"BearerAuth": {} }},
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="variant_group_name",
     *                   description="Variant Group Name",
     *                   type="string",
     *                   example="Weight"
     *               )
     *           )
     *       )
     *   ),   
     *  @OA\Response(
     *      response=201, 
     *      description="variant group created successfully",
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
     * @OA\Get(
     *   path="/api/v1/variantgroups/{id}",
     *   operationId="getVariantGroup",
     *   summary="Fetch a Variant Group",
     *   tags={"Variant Groups"},
     *   description="Fetch a variant group",
     *   security={ {"BearerAuth": {} }},
     *   @OA\Parameter(
     *       name="id",
     *       description="Variant Group id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *          type="integer"
     *       )
     *   ),
     *  @OA\Response(
     *      response=201, 
     *      description="variant group retrieved successfully",
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
     * )
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\VariantGroup  $variantGroup
     * @return \Illuminate\Http\Response
     */
    public function show(VariantGroup $variantgroup)
    {
        return $this->sendResponse($variantgroup, 'Variant Group Retrieved Successfully', 201);
    }


    /**
     * @OA\Put(
     *   path="/api/v1/variantgroups/{id}",
     *   operationId="updateVariantGroup",
     *   summary="Update a variant group",
     *   tags={"Variant Groups"},
     *   description="Update Variant Group",
     *   security={ {"BearerAuth": {} }},
     *   @OA\Parameter(
     *       name="id",
     *       description="Variant Group id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *          type="integer"
     *       )
     *   ),
     *   @OA\Parameter(
     *        name="variant_group_name",
     *        description="Variant Group Name",
     *        example="Color",
     *        in="query",
     *        @OA\Schema(
     *          type="string"
     *        )
     *   ),
     * 
     *  @OA\Response(
     *      response=201, 
     *      description="variant group updated successfully",
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariantGroup $variantgroup)
    {
        $validator = Validator::make($request->only('variant_group_name'), [
            'variant_group_name' => 'required|min:3'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Update Variant Group
        $variantgroup->update(array_merge($validator->validated(), ['description' => $request->input('description')]));

        return $this->sendResponse($variantgroup, 'Variant Group Updated Successfully', 201);
    }

    /**
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantGroup  $variantgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariantGroup $variantgroup)
    {
        $variantgroup->delete();

        return $this->sendResponse([], 'Variant Group Deleted Successfully', 201);
    }
}
