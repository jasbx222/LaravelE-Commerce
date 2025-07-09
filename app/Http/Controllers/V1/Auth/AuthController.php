<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\ApiController\ApiController;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest ;
use App\Http\Service\Admin\Auth\AuthService;

class AdminAuthController extends ApiController
{
    private $adminAuthService;
    public function __construct(AuthService $auth)
    {
        $this->adminAuthService =$auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register (RegisterRequest $request)
    {
        return $this->adminAuthService->register($request);
    }
    public function login (LoginRequest $request)
    {
        return $this->adminAuthService->login($request);
    }
    public function index()
    {
        return $this->adminAuthService->index();
    }
   
}
