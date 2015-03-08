<?php

/**
 * generates an array of "groups". each element has
 *
 * @param      $colsPerRow [description]
 * @param      $cols [description]
 *
 * @return     ads
 */
function makeGroups($elementsPerGroup, $groupName, $elements)
{
    $groups = array();

    while(count($elements) > 0)
    {
        $group = array();
        $group[$groupName] = array();
        for($count = 0;
            $count < $elementsPerGroup && count($elements) > 0;
            $count++)
        {
            $group[$groupName][] = array_pop($elements);
        }
        $groups[] = $group;
    }

    return $groups;
}
