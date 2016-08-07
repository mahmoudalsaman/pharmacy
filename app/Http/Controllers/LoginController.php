<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User; 

use Hash;

class LoginController extends Controller
{
    public function doLogin(Request $request)
    {
    	$user = User::where('cell_number', '=', $request->mobile_number)
    		->first();

    	if(count($user) > 0) {
    		if(Hash::check($request->password, $user->password)) {
                session()->put('user_phone_number', $user->cell_number);
    			session()->put('user_id', $user->user_id);
    			session()->put('user_type', $user->user_type);
    			session()->put('user_full_name', $user->first_name . ' ' . $user->last_name);
    			session()->put('user_branch_id', $user->branch_id_fk);

    			return redirect('home');
    		} else {
    			return 'Invalid mobile number/password combination.';
    		}
    	} else {
    		return 'No User found.';
    	}
    }
}
