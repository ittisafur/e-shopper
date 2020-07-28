<?php
function productImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('images/image-not-found-1024x576.png');
}
