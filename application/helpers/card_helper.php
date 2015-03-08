<?php

/**
 * takes an ad, and the CI instance, and returns a card object that can be
 *   parsed into the card view.
 *
 * @param      $CI the Code Igniter instance
 * @param      $ad a single record from the Ads model
 *
 * @return     a card object that can be parsed into the card view.
 */
function adToCard($CI, $ad)
{
    $CI->load->model('images');

    $imgrecord = $CI->images->getAdImage($ad->ID);

    $card = array();
    $card['cardlink']       = base_url('Ad_detail/index/'.$ad->ID);
    $card['cardimgsrc']     = base_url($imgrecord->src);
    $card['cardimagealt']   = $ad->title;
    $card['cardtitle']      = $ad->title;
    $card['cardcaption']    = $ad->description;

    return $card;
}


function generateCards($CI, $ads)
{
    $CI->load->library('parser');

    // putting ads onto the card views
    $cards = array();
    foreach($ads as $ad)
    {
        $card = adToCard($CI, $ad);   // convert ad into a card object
        $cards[] = $CI->parser->parse('_card', $card, true);
    }

    // put cards into columns
    $columns = makeColumns('col-sm-4', $cards);

    // generate rows with the columns inside them (3 columns per row)
    $grid = array();
    $grid['rows'] = makeGroups(3, 'columns', $columns);

    // return the card views
    return $CI->parser->parse('_grid', $grid, true);
}
