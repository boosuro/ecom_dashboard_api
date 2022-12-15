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



    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new project",
     *      example="This is new project's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="Author ID",
     *      description="Author's id of the new project",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $author_id;


    /**
     * @OA\Property(
     *     title="Author",
     *     description="Project author's user model"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $author;
}
