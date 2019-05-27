<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render(){
        return ['Error' => 'Product Not Belongs To User'];
    }
}
