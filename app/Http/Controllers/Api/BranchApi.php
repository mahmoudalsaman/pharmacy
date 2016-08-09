<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Branch;

use Input;

class BranchApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_branches' => $this->queryBranch(null)
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
        Branch::create(array(
            'name'          => $request->name,
            'description'   => $request->description != null ? $request->description : null,
            'address'       => $request->address != null ? $request->address : null,
            'image_path'    => null, // for now
        ));

        return response()->json(array(
            'message' => 'Branch added successfully!'
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
            'branch_details' => $this->queryBranch($id)
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
        $branch = $this->queryBranch($id);

        $branch->name           = $request->name;
        $branch->description    = $request->description != null ? $request->description : null;
        $branch->address        = $request->address != null ? $request->address : null;
        $branch->image_path     = null; // for now

        $branch->save();

        return response()->json(array(
            'message'   => 'Branch successfully updated!'
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
        $branchIds = json_decode(Input::get('branchIds'));

        for($i = 0; $i < count($branchIds); $i++) 
        { 
            $branch = $this->queryBranch($branchIds[$i]);

            $branch->delete();
        }

        return response()->json(array(
            'message' => 'Branch successfully deleted!'
        ));
    }

    public function queryBranch($id)
    {
        $branchQuery = Branch::select(
                'branch_id', 
                'name', 
                'description', 
                'address', 
                'image_path', 
                'created_at', 
                'updated_at',
                'deleted_at'
            );

        if($id) {
            $branchQueryResult = $branchQuery->where('branch_id', '=', $id)
                ->first();
        } else {
            $branchQueryResult = $branchQuery->get();
        }

        return $branchQueryResult;
    }
}
