<?php

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Project model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class Product
{

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Product Name",
     *     format="string",
     *     example="Tesla Model S"
     * )
     *
     * @var integer
     */
    private $name;

    /**
     * @OA\Property(
     *      title="Price",
     *      description="Product Price",
     *      example="25.00"
     * )
     *
     * @var string
     */
    public $price;

    /**
     * @OA\Property(
     *      title="Quantity",
     *      description="Product Quanity",
     *      format="int64",
     *      example=11
     * )
     *
     * @var integer
     */
    public $quantity;

    /**
     * @OA\Property(
     *     title="Product Variants",
     *     description="Product Variants",
     *     format="array",
     *     example="[1,2,3,4]"
     * )
     *
     * @var integer
     */
    private $product_variants;
}
