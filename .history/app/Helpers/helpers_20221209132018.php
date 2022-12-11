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
 * Function to format amount
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


// /**
//  * @param array $array
//  * @param string $colName
//  * @return string
//  */
// function geColumnRowValue($array = [], $colName = 'name')
// {
//     foreach ($array as $link) {
//         $rowValue = $link[$colName];
//     }
//     return $rowValue;
// }
