<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

use Input;

class CategoryApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_categories' => $this->queryCategory(null)
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
        Category::create(array(
            'name'  => $request->name
        ));
        
        return response()->json(array(
            'message' => 'Category successfully created!'  
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
            'category_details' => $this->queryCategory($id)
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
        $tag = $this->queryCategory($id);

        $tag->name = $request->name;

        $tag->save();

        return response()->json(array(
            'message' => 'Category successfully updated!'
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
        $categoryIds = json_decode(Input::get('categoryIds'));

        for($i = 0; $i < count($categoryIds); $i++) 
        { 
            $category = $this->queryCategory($categoryIds[$i]);

            $category->delete();
        }

        return response()->json(array(
            'message' => 'Category successfully deleted!'
        ));
    }

    public function queryCategory($id)
    {
        $tagQuery = Category::select(
            'category_id',
            'name',
            'created_at',
            'updated_at',
            'deleted_at'
        );

        if($id) {
            $tagQueryResult = $tagQuery->where('category_id', '=', $id)
                ->first();
        } else {
            $tagQueryResult = $tagQuery->get();
        }

        return $tagQueryResult;
    }
}
