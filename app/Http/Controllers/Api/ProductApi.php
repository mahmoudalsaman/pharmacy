<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductPriceHistory;
use App\ProductTag;

use Carbon\Carbon;
use DB;
use Input;

class ProductApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_products'   => $this->queryProduct(null)
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
        try {
            DB::beginTransaction();
                
            $product = Product::create(array(
                'brand_id_fk'   => $request->brand_id_fk,
                'name'          => $request->name,
                'description'   => $request->description != null ? $request->description : null,
                'image_path'    => null, // for now
                'price'         => $request->price
            ));

            ProductPriceHistory::create(array(
                'product_id_fk' => $product->product_id,
                'price'         => $request->price,
                'created_at'    => Carbon::now()
            ));

            for($i = 0; $i < count($request->tags); $i++) {
                ProductTag::create(array(
                    'product_id_fk' => $product->product_id_fk,
                    'tag_id_fk'     => $request->tags[$i]
                ));
            }

            DB::commit();

            return response()->json(array(
                'message'   => $product->product_id
            ));
        } catch(QueryException $ex) {
            DB::rollBack();

            return response()->json(array(
                'message'   => 'Product creation failed! ' . $ex->getMessage()
            ));
        }
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
            'product_details' => $this->queryProduct($id)
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
        try {
            DB::beginTransaction();

            $product = $this->queryProduct($id);

            $product->name          = $request->name;
            $product->brand_id_fk   = $request->brand_id_fk;
            $product->description   = $request->description != null ? $request->description : null;
            $product->image_path    = null; // for now
            $product->price         = $request->price;

            $product->save();

            ProductPriceHistory::create(array(
                'product_id_fk' => $product->product_id,
                'price'         => $request->price
            ));

            DB::commit();

            return response()->json(array(
                'message'   => 'Product successfully updated!'
            ));
        } catch(QueryException $ex) {
            DB::rollBack();

            return response()->json(array(
                'message'   => 'Product update failed!'
            ));            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->queryProduct($id);

        $product->delete();

        return response()->json(array(
            'message'   => 'Product successfully deleted!'
        ));
    }

    public function queryProduct($id)
    {
        $productQuery = Product::join('brands', 'products.brand_id_fk', '=', 'brands.brand_id')
        ->leftJoin('product_tags', 'product_tags.product_id_fk', '=', 'products.product_id')
        ->join('tags', 'product_tags.tag_id_fk', '=', 'tags.tag_id')
        ->select(
            'products.product_id',
            'products.brand_id_fk',
            'brands.name as brand_name',
            'tags.name as tag_name',
            'products.name as product_name',
            'products.description',
            'products.image_path',
            'products.price',
            'products.created_at',
            'products.updated_at',
            'products.deleted_at'
        );

        if($id) {
            $productQueryResult = $productQuery->where('products.product_id', '=', $id)
                ->first();
        } else {
            $productQueryResult = $productQuery
                ->get();
        }

        return $productQueryResult;
    }
}
