<?php

/**
 * Functions for  custom helper functions
 */


/**
 * 
 * Function to format dates for model columns
 * 
 * @param $model
 * @param string $columnName
 * @return null|string|string[]
 */
function getDateColumn($model, $columnName = 'created_at')
{
    if (!isset($model[$columnName])) {
        return '';
    }

    $dateObj = new Carbon\Carbon($model[$columnName]);

    return $dateObj->diffForHumans();
}
