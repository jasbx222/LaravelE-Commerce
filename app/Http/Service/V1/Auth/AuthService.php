<?php
namespace App\Http\Service\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AuthResource;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class AuthService extends Controller
{
     use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return  new AuthResource(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponse;
    public function login( $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error(
                'error authentcted',
                404
            );
        }


        $user = User::where('email', $validated['email'])->first();

        $tokenName = 'token name' . $user->email;
        $token = $user->createToken($tokenName)->plainTextToken;

        return $this->success('success authentcted', [
            'user' =>   AuthResource::make($user),
            'token' => $token,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register($request)
    {

        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return $this->success('User registered successfully',[
            'user' => AuthResource::make($user),
          
        ], 201);
    
    }
  
   
  
 
    public function logout( $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success('success logout', 200);
    }
}
