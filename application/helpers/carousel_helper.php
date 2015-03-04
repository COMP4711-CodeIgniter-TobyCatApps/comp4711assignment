<?php

function makeCarousel($images)
{
    $carousel = array();
    $carousel['items'] = array();

    for ($count = 0; $count < count($images); $count++)
    {
        $image = $images[$count];

        $item = array();

        $item['extraclasses']   = ($count == 0) ? 'active' : '';
        $item['imgsrc']         = base_url($image->src);
        $item['imgalt']         = $image->alt;

        $carousel['items'][] = $item;
    }

    return $carousel;
}
