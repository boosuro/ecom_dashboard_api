<?php

/**
 * Functions for  custom helper functions
 */


/**
 * @author Boosuro Stephen <boosurostephen@yahoo.com>
 * 
 * Function to format dates for model columns
 * 
 * @param $model
 * @param string $columnName
 * @return null|string|
 */
function formatModelDate($model, $columnName = 'created_at')
{
    if (!isset($model[$columnName])) {
        return '';
    }

    $dateObj = new Carbon\Carbon($model[$columnName]);

    return $dateObj->diffForHumans();
}

/**
 * @author Boosuro Stephen <boosurostephen@yahoo.com>
 * 
 * Function to get model column value
 * 
 * @param $model
 * @param $relation_method
 * @param $colName
 * @return null|string|
 */

function getModelColumnValue($model, $relation_method, $colName)
{
    if ($model->$relation_method) {
        return "<strong style='font-weight:bold'>" . $model->$relation_method->$colName . "</strong>";
    }
}

function getVariants($product)
{
    // return 'good';
    $variants = '';
    $product_variants = $product->productvariants->variant_name;
    foreach ($product_variants as $var) {
        $variants .= $var;
    }

    return $variants;
}


function getMediaColumnResource($mediaModel, $mediaCollectionName = '')
{

    if ($mediaModel->hasMedia($mediaCollectionName)) {
        return "<a href='" .  $mediaModel->getFirstMediaUrl($mediaCollectionName) . "' data-lightbox='OrdersPackPHPTest' title='Product Image'><img style='width:50px' src='" . $mediaModel->getFirstMediaUrl($mediaCollectionName) . "' alt='Product Image'></a>";
    }
}

/**
 * @author Boosuro Stephen <boosurostephen@yahoo.com>
 * 
 * Function to format amount
 * 
 * @param $amount
 * @return null|string|
 */
function formatAmount($amount)
{
    return number_format((float)$amount, 2, '.', ',');
}


/**
 * Converts camelCase string to have spaces between each
 * 
 * @param $camelCaseString
 * @return string
 */
function fromCamelCase($camelCaseString)
{
    $re = '/(?<=[a-z])(?=[A-Z])/x';
    $a = preg_split($re, $camelCaseString);
    return join(" ", $a,);
}
