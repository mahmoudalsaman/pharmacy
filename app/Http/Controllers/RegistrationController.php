<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class RegistrationController extends Controller
{
    public function doRegister(Request $request)
    {
    	User::create(array(
    		'user_type'	=> 2,
    		'first_name'	=> $request->first_name,
    		'middle_name'	=> $request->middle_name != null ? $request->middle_name : null,
    		'last_name'	=> $request->last_name,
    		'date_of_birth'	=> $request->date_of_birth,
    		'cell_number'	=> $request->cell_number,
    		'password'	=> bcrypt($request->password)
    	));

    	// Sms here...

    	return redirect('login');
    }
}
