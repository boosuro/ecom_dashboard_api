<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    /**  @var ProductRepository */
    protected $variantGroupRepository;

    /**  @var ProductVariantRepository */
    protected $productVariantRepository;

    /**  @var UserRepository */
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository, ProductVariantRepository $productVariantRepository, UserRepository $userRepository)
    {
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->userRepository = $userRepository;
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

        $data = json_encode([
            ['name' => 'Products', 'y' => $products],
            ['name' => 'Variants', 'y' => $variants],
        ]);
        return view('dashboard.index', compact('users', 'products', 'variants', 'data'));
    }
}
