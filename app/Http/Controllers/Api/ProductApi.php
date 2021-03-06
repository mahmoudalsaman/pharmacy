<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductInventory;
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
            'active_products'   => $this->queryProduct(null, Input::get('categoryId'))
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
                
            $product = new Product();

            $product->name                      = $request->name;
            $product->description               = $request->description != null ? $request->description : null;
            $product->image_path                = null; // for now
            $product->category_id_fk            = $request->category_id_fk;
            $product->price                     = $request->price;
            $product->amount                    = $request->amount;
            $product->is_prescription           = $request->is_prescription;
            $product->unit_of_measurement_id_fk = $request->unit_of_measurement_id_fk;

            $product->save();

            ProductPriceHistory::create(array(
                'product_id_fk' => $product->product_id,
                'price'         => $request->price,
                'created_at'    => Carbon::now()
            ));

            ProductInventory::create(array(
                'branch_id_fk'      => session('user_branch_id'),
                'user_id_fk'        => session('user_id'),
                'product_id_fk'     => $product->product_id,
                'previous_value'    => 0,
                'current_value'     => $request->quantity
            ));

            DB::commit();

            return response()->json(array(
                'message'   => 'Product successfully created!'
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

            $product->name              = $request->name;
            $product->description       = $request->description != null ? $request->description : null;
            $product->is_prescription   = $request->is_prescription;
            $product->image_path        = null; // for now
            $product->price             = $request->price;

            $product->save();

            ProductPriceHistory::create(array(
                'product_id_fk' => $product->product_id,
                'price'         => $request->price
            ));


            if($request->quantity != null) {
                $productInventory = ProductInventory::where('product_id_fk', '=', $product->product_id)
                ->first();

                $productInventory->previous_value = $productInventory->current_value;
                $productInventory->current_value += (int) $request->quantity;

                $productInventory->save();
            }


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
        $productIds = json_decode(Input::get('productIds'));

        for($i = 0; $i < count($productIds); $i++) 
        { 
            $product = $this->queryProduct($productIds[$i]);

            $product->delete();
        }

        return response()->json(array(
            'message'   => 'Product successfully deleted!'
        ));
    }

    public function queryProduct($id, $categoryId)
    {
        $productQuery = Product::join('product_inventories', 'product_inventories.product_id_fk', '=', 'products.product_id')
        ->join('categories', 'products.category_id_fk', '=', 'categories.category_id')
        ->join('unit_of_measurements', 'products.unit_of_measurement_id_fk', '=', 'unit_of_measurements.unit_of_measurement_id')
        ->select(
            'products.product_id',
            'categories.name as category_name',
            'products.name as product_name',
            'unit_of_measurements.abbreviation',
            'products.amount',
            'product_inventories.previous_value',
            'product_inventories.current_value',
            'products.description',
            'products.image_path',
            'products.is_prescription',
            'products.price',
            'products.created_at',
            'products.updated_at',
            'products.deleted_at'
        );

        if($id) {
            $productQueryResult = $productQuery->where('products.product_id', '=', $id)
                ->first();
        } else if($categoryId) {
            $productQueryResult = $productQuery->where('products.category_id_fk', '=', $categoryId)
                ->get();
        } else {
            $productQueryResult = $productQuery->get();
        }

        return $productQueryResult;
    }
}
