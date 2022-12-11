<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Repositories\UserRepository;
use App\Repositories\VariantGroupRepository;

class DashboardController extends Controller
{
    /**  @var ProductRepository */
    protected $productRepository;

    /**  @var ProductVariantRepository */
    protected $productVariantRepository;

    /**  @var UserRepository */
    protected $userRepository;

    /**  @var VariantGroupRepository */
    protected $variantGroupRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductVariantRepository $productVariantRepository,
        VariantGroupRepository $variantGroupRepository,
        UserRepository $userRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->userRepository = $userRepository;
        $this->variantGroupRepository = $variantGroupRepository;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->userRepository->count();
        $products = $this->productRepository->count();
        $variants = $this->productVariantRepository->count();
        $variant_groups = $this->variantGroupRepository->count();

        $data = json_encode([
            ['name' => 'Products', 'y' => $products],
            ['name' => 'Variants', 'y' => $variants],
            ['name' => 'Variant Groups', 'y' => $variant_groups],
        ]);

        $products_names_list = [];
        $products_list = [];
        $products_names =  $this->productRepository->all();
        foreach ($products_names as $product_name) {
            array_push($products_names_list, $product_name->name);
            $prod = array(
                'name' => $product_name->name,
                'data' => $product_name->quantity
            );
            array_push($products_list, $prod);
        }

        // $products_names_list = json_encode($products_names_list);
        $products_list = json_encode($products_list);


        return view('dashboard.index', compact('users', 'products', 'variants', 'data', 'products_list', 'products_names'));
    }
}
