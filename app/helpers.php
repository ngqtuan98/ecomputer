<?php 
use App\Product;

function presentPrice($price)
{
        return ($price);
}

function Fee()
{
        return  Cart::total();
}

function productImage($path)
{
        return ($path != null ) && file_exists('Source/'.$path) ? asset(''.$path) : asset('img/not-found.gif'); 
}
