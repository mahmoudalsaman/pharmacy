<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CustomerCart;
use App\CustomerCartDetail;
use App\ProductInventory;

use DB;

class CartApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_carts'  => $this->queryCart(null, null),
            'active_cart_total' => CustomerCart::join('customer_cart_details', 'customer_cart_details.customer_cart_id_fk', '=', 'customer_carts.customer_cart_id')
                ->join('products', 'customer_cart_details.product_id_fk', '=', 'products.product_id')
                ->select(
                    'customer_carts.customer_cart_id',
                    'products.product_id',
                    'products.name',
                    'products.description',
                    'products.price',
                    'customer_cart_details.quantity',
                    DB::raw('SUM(customer_cart_details.quantity * products.price) as total')
                )
                ->where('customer_carts.user_id_fk', '=', session('user_id'))
                ->groupBy('customer_carts.user_id_fk')
                ->get()
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

            $customerCartCheck = $this->queryCart(null, $request->product_id);

            $productQuantity = ProductInventory::select('current_value')
                ->where('product_id_fk', '=', $request->product_id)
                ->first();
                

            if(count($customerCartCheck) > 0) {
                $customerCartDetail = CustomerCartDetail::where('customer_cart_detail_id', '=', $customerCartCheck->customer_cart_detail_id)
                    ->first();
                $subtotal = $customerCartDetail->quantity + $request->quantity;

                if($subtotal <= $productQuantity->current_value) {
                    $customerCartDetail->quantity = $subtotal;

                    $customerCartDetail->save();
                }
                else {
                    return response()->json(array(
                        'message'   => 'Product quantity exceeded!'
                    ));
                }
            } else {
                $customerCart = new CustomerCart();

                $customerCart->user_id_fk = session('user_id');

                $customerCart->save();

                CustomerCartDetail::create(array(
                    'customer_cart_id_fk'   => $customerCart->customer_cart_id,
                    'product_id_fk'         => $request->product_id,
                    'quantity'              => $request->quantity
                ));
            }

            DB::commit();

            return response()->json(array(
                'message'   => 'Product successfully added to cart!'
            ));
        } catch(QueryException $ex) {
            DB::rollBack();

            return response()->json(array(
                'message'   => 'Product cart creation failed! ' . $ex->getMessage()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function queryCart($id, $productId)
    {
        $cartQuery = CustomerCart::join('customer_cart_details', 'customer_cart_details.customer_cart_id_fk', '=', 'customer_carts.customer_cart_id')
            ->join('products', 'customer_cart_details.product_id_fk', '=', 'products.product_id')
            ->select(
                'customer_carts.customer_cart_id',
                'products.product_id',
                'products.name',
                'products.description',
                'products.price',
                'customer_cart_details.customer_cart_detail_id',
                'customer_cart_details.quantity',
                DB::raw('SUM(customer_cart_details.quantity * products.price) as subtotal')
            )
            ->where('customer_carts.user_id_fk', '=', session('user_id'));

        if($id) {
            $cartQueryResult = $cartQuery->where('customer_carts.customer_cart_id', '=', $id)
                ->first();
        } if($productId) {
            $cartQueryResult = $cartQuery->where('customer_cart_details.product_id_fk', '=', (int) $productId)
                ->first();
        } else {
            $cartQueryResult = $cartQuery
                ->groupBy('products.product_id')
                ->get();
        }

        return $cartQueryResult;
    }
}
