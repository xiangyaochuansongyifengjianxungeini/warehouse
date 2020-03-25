<?php
namespace App\Models\Traits;

use App\Models\ProductSku;
use Carbon\Carbon;
use DB;

trait OrderHelper
{

    /**
     * 获取订单管理列表
     *
     * @param [type] $orders
     * @return void
     */
    public function orderManage($request)
    {
        $data = $request->all();
        (!$request->start_at && !$request->end_at) && $data = todayDate($data);

        $orders= auth('api')->user()->adminOrder()->confirm()->groupBy('users_id')->createdAtOrder()
        ->betweenDate($data)->filter($request->except(['start_at','end_at']))->select(DB::raw('sum(sale_price) as allPrice'),DB::raw('sum(num) as allNum'))
        ->paginateFilter(request('pageSize',10));

        foreach($orders as $key => $order){
            $orders[$key] = [
                'sno' => $order->sno,
                'price' => $order->allPrice,
                'productNum' => $order->allNum,
                'user_name'=>$order->user->name,
                'user_id' => $order->user->id,
                'created_at' => (string)$order->created_at,
                'is_print' => $order->is_print,
                'status' => '已下单',
            ];
        }

        return $orders;
    }


    /**
     * 获取订单管理列表打印
     *
     * @param [type] $orders
     * @return void
     */
    public function orderManagePrint($orders,$user)
    {
        $sorted = [];
        foreach($orders as $order){
            $sorted[$order['product_name']][$order['color']['name']][] = [
                'code' => $order['code']['name'],
                'color' => $order['color']['name'],
                'num' => $order['num'],
                'product_name' => $order['product_name'],
                'onePrice' => sprintf('%.2f',$order['sale_price']/$order['num']),
                'allPrice' => $order['sale_price'],
            ];
        }

        $cellData = [];
        foreach($sorted as $productName){
            foreach($productName as $color){
                foreach($color as $value){
                    $cellData[] = $value;
                }
            }
            $cellData[] = [
                'code' => '',
                'color' => '',
                'num' => '',
                'product_name' => '',
                'onePrice' => '',
                'allPrice' => '',
            ];
        }
        if(isset($cellData[count($cellData)-1])) unset($cellData[count($cellData)-1]);

        $result = [
            'userName' => $user->name,
            'orderNum' => count($orders),
            'productNum' => collect($orders)->sum('num'),
            'orderPrice' => sprintf('%.2f',collect($orders)->sum('sale_price')),
            'datetime' => (string)Carbon::now(),
            'order' => $cellData??[],
        ];

        return $result;
    }


    /**
     * 新增出库订单
     *
     * @param [type] $data
     * @param [type] $order
     * @return void
     */
    public function orderStore($data,$order,$request)
    {
        $sno = $order->build_order_sn();
        foreach($data as &$order){
            $productSku = ProductSku::with('product:id,warehouse_id')->find($order['product_sku_id']);
            $order['category'] = $request->category;
            $order['address'] = $request->address;
            $order['sno'] = $sno; 
            $order['cost_price'] = $productSku->cost_price*$order['num'];
            $order['sale_price'] = $productSku->sale_price*$order['num'];
            $order['warehouse_id'] = $productSku->product->warehouse_id;
            ProductSku::where('id',$order['product_sku_id'])->decrement('stock',$order['num']);
        };

        return $data;
    }
}