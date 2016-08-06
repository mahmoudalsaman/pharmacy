<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;

class BrandApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_brands' => $this->queryBrand(null)
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
        Brand::create(array(
            'name'          => $request->name,
            'description'   => $request->description != null ? $request->description : null,
            'image_path'    => null // for now
        ));

        return response()->json(array(
            'message'   => 'Brand successfully created!'
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
            'brand_details' => $this->queryBrand($id)
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
        $brand = $this->queryBrand($id);

        $brand->name            = $request->name;
        $brand->description     = $request->description != null ? $request->description : null;
        $brand->image_path      = null; // for now

        $brand->save();

        return response()->json(array(
            'message'   => 'Brand successfully updated!'
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
        $brand = $this->queryBrand($id);

        $brand->delete();

        return response()->json(array(
            'message'   => 'Brand successfully deleted!'
        ));
    }

    public function queryBrand($id)
    {
        $brandQuery = Brand::select(
            'brand_id',
            'name',
            'description',
            'image_path',
            'created_at',
            'updated_at',
            'deleted_at'
        );

        if($id) {
            $brandQueryResult = $brandQuery->where('brand_id', '=', $id)
                ->first();
        } else {
            $brandQueryResult = $brandQuery->get();
        }

        return $brandQueryResult;
    }
}
