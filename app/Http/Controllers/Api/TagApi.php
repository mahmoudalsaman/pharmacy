<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;

class TagApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_tags' => $this->queryTag(null);
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
        Tag::create(array(
            'name'  => $request->name
        ));
        
        return response()->json(array(
            'message' => 'Tag successfully created!'  
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
            'tag_details' => $this->queryTag($id)
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
        $tag = $this->queryTag($id);

        $tag->name = $request->name;

        $tag->save();

        return response()->json(array(
            'message' => 'Tag successfully updated!'
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
        $tag = $this->queryTag($id);

        $tag->delete();

        return response()->json(array(
            'message' => 'Tag successfully deleted!'
        ));
    }

    public function queryTag($id)
    {
        $tagQuery = Tag::select(
            'tag_id',
            'name',
            'created_at',
            'updated_at',
            'deleted_at'
        );

        if($id) {
            $tagQueryResult = $tagQuery->where('tag_id', '=', $tagQuery)
                ->first();
        } else {
            $tagQueryResult = $tagQuery->get()l
        }

        return $tagQueryResult;
    }
}
