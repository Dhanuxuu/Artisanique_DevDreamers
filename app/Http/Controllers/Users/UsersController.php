<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    //
    public function myOrders(){
        $orders = Order::select()->where('user_id',Auth::user()->id)->get();

        return view('users.myorders',compact('orders'));

    }

    public function settings(){
        $user = User::find(Auth::user()->id);

        return view('users.settings',compact('user'));

    }

    public function updateUserSettings(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all()); 

        // return view('users.settings',compact('user'));
        if($user){
            return Redirect::route("users.settings")->with('update', 'User data updated successfully!');
        }

    }

}
