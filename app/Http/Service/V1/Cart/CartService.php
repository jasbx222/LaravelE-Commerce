<?php
namespace App\Http\Service\V1\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Http\Resources\Admin\CartResource;

class CartService extends Controller
{
    //get all carts
    public function index()
    {
        $carts = Cart::all();
        return CartResource::collection($carts);
}
//CREATE A CART
public function store( $request)
{
    $cart = Cart::create($request->validated());
    return new CartResource($cart); 
}



//PUT

public function update( $request, $cart)
{
    $cart->update($request->validated());
    return new CartResource($cart);


}


//DELETE
public function destroy( $cart)
{
    $cart->delete();
    return response()->json(['message' => 'Cart deleted successfully']);
}

//GET CART BY ID
public function show( $cart)
{
    return new CartResource($cart);
    
}





}