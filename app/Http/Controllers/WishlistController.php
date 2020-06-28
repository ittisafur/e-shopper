<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Cart::instance('wishlist')->content());
        return view('pages.cart-checkout.wishlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplication = Cart::instance('wishlist')->search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($duplication->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart');
        }
        Cart::instance('wishlist')->add([
            'id' => $request->id,
            'name' => $request->name,
            'details' => $request->details,
            'qty' => 1,
            'price' => $request->price
        ])->associate(Product::class);
        return redirect()->route('wishlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);
        return redirect()->route('wishlist.index')->with('success_message', 'Item has been removed from the wishlist');
    }
}
