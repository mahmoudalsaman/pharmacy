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

    public function forgotPassword(Request $request) 
    {
        $user = User::where('cell_number', '=', $request->mobile_number)
            ->first();

        if($user) {
            $newPassword = str_random(8);

            $user->password = bcrypt($newPassword);

            $user->save();

            $url = 'https://www.itexmo.com/php_api/api.php';
            $message = 'Your account has been successfully restored! Your new password is ' . $newPassword;
            $itexmo = array('1' => $request->mobile_number, '2' => $message, '3' => '09293310136_IT77U');
            $param = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($itexmo),
                ),
            );
            $context  = stream_context_create($param);
            
            file_get_contents($url, false, $context);

            return redirect('login');
        } else {
            return 'The mobile number you input is cannot be found.';
        }
    }
}
