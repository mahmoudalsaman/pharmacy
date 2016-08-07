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

    	$url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $request->cell_number, '2' => 'You can now login to this account. Password is ' . $request->password, '3' => '09293310136_IT77U');
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
    }
}
