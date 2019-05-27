<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request,$e)
    {
            //when the model of the product not Found
            if($this->isModel($e)){
                return $this->ModelResposse($e);
            }
            // when enter incorrect route
            if($this->isHttp($e)){
                return  $this->HttpResposse($e);
            }
            return parent::render($request, $e);
    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }

    protected function ModelResposse($e){
        return response()->json([
            'errors' => 'Product model not Found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function HttpResposse($e){
        return response()->json([
            'errors' => 'Incorrent Route'
        ],Response::HTTP_NOT_FOUND);
    }
        
}