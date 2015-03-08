<?php

/**
 * generates an array of columns of the class $colClass. each column contains an
 *   element of $colContents. although these are called columns, they're more
 *   like cells.
 *
 * @param      $colClass class used for all columns.
 * @param      $colContents each element of this array will be put into a
 *   separate column.
 *
 * @return     an array of columns that can be grouped together and put into
 *   rows.
 */
function makeColumns($colClass, $colContents)
{
    $columns = array();

    while(count($colContents) > 0)
    {
        $column = array();
        $column['columnclass']  = $colClass;
        $column['content']      = array_pop($colContents);
        $columns[] = $column;
    }

    return $columns;
}
