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
     * Switch to Cart by Removing the Wishlist.
     *
     * @param $id
     * @return void
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);
        Cart::instance('wishlist')->remove($id);
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart');
        }
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate(Product::class);
        return redirect()->route('cart.index')->with('success_message', 'Item added to your cart from wishlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplication = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($duplication->isNotEmpty()) {
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);
        return redirect()->route('wishlist.index')->with('success_message', 'Item has been removed from the wishlist');
    }
}
