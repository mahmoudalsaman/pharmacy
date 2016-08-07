<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Input;

class UserApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_users' => $this->queryUser(null)
        ));
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
        User::create(array(
            'branch_id_fk'  => $request->branch_id_fk != null ? $request->branch_id_fk : null,
            'user_type'     => $request->user_type,
            'first_name'    => $request->first_name,
            'middle_name'   => $request->middle_name,
            'last_name'     => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'cell_number'   => $request->cell_number,
            'password'      => bcrypt($request->password)
        ));

        return response()->json(array(
            'message'   => 'User successfully created!'
        ));
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
        return response()->json(array(
            'user_details' => $this->queryUser($id)
        ));
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
        $user = $this->queryUser($id);

        $user->branch_id_fk     = $request->branch_id_fk != null ? $request->branch_id_fk : null;
        $user->first_name       = $request->first_name;
        $user->middle_name      = $request->middle_name;
        $user->last_name        = $request->last_name;
        $user->cell_number      = $request->cell_number;
        $user->date_of_birth    = $request->date_of_birth;

        $user->save();

        return response()->json(array(
            'message'   => 'User successfully updated!'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->queryUser($id);

        $user->delete();

        return response()->json(array(
            'message'   => 'User successfully updated!'
        ));
    }

    public function queryUser($id)
    {
        $userQuery = User::join('branches', 'users.branch_id_fk', '=', 'branches.branch_id')
        ->select(
            'users.user_id',
            'branches.name',
            'users.user_type',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'users.date_of_birth',
            'users.cell_number',
            'users.created_at',
            'users.updated_at',
            'users.deleted_at'
        );

        if($id) {
            $userQueryResult = $userQuery->where('users.user_id', '=', $id)
                ->where('users.user_type', '=', (int)Input::get('userType'))
                ->first();
        } else {
            $userQueryResult = $userQuery->where('users.user_type', '=', (int)Input::get('userType'))
                ->get();
        }

        return $userQueryResult;
    }
}
