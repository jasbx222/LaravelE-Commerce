<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $policyClass;

    public function isAble(string $ability, $model)
    {
        return $this->authorize($ability, [$model, $this->policyClass]);
    }
}