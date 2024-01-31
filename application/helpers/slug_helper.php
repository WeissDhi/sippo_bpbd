<?php
defined('BASEPATH') or exit('No direct script access allowed');

function createSlug($slug)
{
    $spacesHypens = '/[^\-\s\pN\pL]+/u';
    $duplicateHypens = '/[\-\s]+/';
    $slug = preg_replace($spacesHypens, '', mb_strtolower($slug, 'UTF-8'));
    $slug = preg_replace($duplicateHypens, '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

function convertYoutube($string)
{
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "$2\"",
        $string
        // "//www.youtube.com/embed/$2\"",
    );
}
