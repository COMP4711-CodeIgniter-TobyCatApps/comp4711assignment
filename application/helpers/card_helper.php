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
    $CI->load->model('adimages');

    $cardimgID = $CI->adimages->getAdImageID($ad->ID);
    $imgrecord = $CI->images->get($cardimgID);

    $card = array();
    $card['cardlink']       = base_url('Ad_detail/index/'.$ad->ID);
    $card['cardimgsrc']     = base_url($imgrecord->src);
    $card['cardimagealt']   = $ad->title;
    $card['cardtitle']      = $ad->title;
    $card['cardcaption']    = $ad->description;

    return $card;
}
