<?php

namespace App\Http\Controllers;

use App\Notifications\OrderInvoice;
use App\Order;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.cart-checkout.checkout');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Cart::content()->map(function ($item) {
            return $item->model->name . ' - '. $item->model->sku;
        })->values();
        $sku = Cart::content()->map(function ($item) {
            return $item->model->sku;
        })->values();
        $description = Cart::content()->map(function ($item) {
            return $item->model->description;
        })->values();

        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => $description,
                'receipt_email' => $request->email,
            ]);
            request()->user()->notify((new OrderInvoice())->delay(now()->addSeconds(5)));
            Order::create([
                'name' => $name,
                'sku_id' => $sku,
                'price' => floatval(preg_replace("/[^-0-9\.]/","",Cart::subtotal())),
                'quantity' => floatval(preg_replace("/[^-0-9\.]/","",Cart::count())),
                'total' => floatval(preg_replace("/[^-0-9\.]/","",Cart::total())),
                'status' => true,
                'ipn_status' => true,
                'user_id' => auth()->user()->id
            ]);
            Cart::destroy();
            return redirect()->route('home')->with('success_message', 'Thank you for your payment');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error !'. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
