<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitOfMeasurement;

class UnitOfMeasurementApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_uoms' => $this->queryUom(null)
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
        UnitOfMeasurement::create(array(
            'name'          => $request->name,
            'abbreviation'  => $request->abbreviation
        ));

        return response()->json(array(
            'message'   => 'Unit of Measurement successfully created!'
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
            'uom_details'   => $this->queryUom($id)
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
        $uom = $this->queryUom($id);

        $uom->name          = $request->name;
        $uom->abbreviation  = $request->abbreviation;

        $uom->save();

        return response()->json(array(
            'message'   => 'Unit of Measurement successfully updated!'
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
        $uomIds = json_decode(Input::get('uomIds'));

        for($i = 0; $i < count($uomIds); $i++) 
        { 
            $uom = $this->queryUom($uomIds[$i]);

            $uom->delete();
        }

        return response()->json(array(
            'message'   => 'Unit of measurement successully deleted!'
        ));
    }

    public function queryUom($id)
    {
        $uomQuery = UnitOfMeasurement::select(
            'unit_of_measurement_id',
            'name',
            'abbreviation',
            'created_at',
            'updated_at',
            'deleted_at'
        );

        if($id) {
            $uomQueryResult = $uomQuery->where('unit_of_measurement_id', '=', $id)
                ->first();
        } else {
            $uomQueryResult = $uomQuery->get();
        }

        return $uomQueryResult;
    }
}
