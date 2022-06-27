<?php
function getAmount($amount, $length = 0)
{
    if(0 < $length){
        return number_format( $amount + 0, $length);
    }
    return $amount + 0;
}