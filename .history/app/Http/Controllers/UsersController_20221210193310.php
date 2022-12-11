<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Repositories\UserRepository;
use App\Http\Requests\ExtractionRequest;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**  @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('layouts.components.index', ['module' => 'Users', 'title' => 'Add User', 'icon' => 'person']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExtractionRequest $request)
    {
        $validated_data = $request->all();

        $input_fields = strtolower($validated_data['holder']) . '.input_fields';
        return view('layouts.components.modal_popup')->with([
            'input_fields' => $input_fields,
            'action' => $validated_data['action'],
            'module' => $validated_data['holder'],
            'title' => 'Add User',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
        $input = $userRequest->all();

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
