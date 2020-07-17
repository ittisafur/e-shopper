<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $user = User::where('name', $username)->first();
        if(!$user){
            abort(404);
        }
        return view('pages.account.account-index');
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
        $request->validate([
            'first_name' => 'required|unique:users|min:3|alpha',
            'last_name' => 'required|min:3|alpha',
            'address' => 'required',
            'city' => 'required',
            'postalcode' => 'required|numeric',
            'country' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
        ]);
//        Auth::user()->update([
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'address' => $request->input('address'),
//            'city' => $request->input('city'),
//            'postalcode' => $request->input('postalcode'),
//            'country' => $request->input('country'),
//            'phone' => $request->input('phone'),
//            'email' => $request->input('email')
//        ]);
        $user = Auth::user();
        $user->first_name =$request->input('first_name');
        $user->last_name =$request->input('last_name');
        $user->address =$request->input('address');
        $user->city =$request->input('city');
        $user->postalcode =$request->input('postalcode');
        $user->country =$request->input('country');
        $user->phone =$request->input('phone');
        $user->email =$request->input('email');
        $user->save();
        return redirect()->route('account.index', Auth::user()->name)->with('success_message', 'You Updated your profile');
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
        //
    }
}
