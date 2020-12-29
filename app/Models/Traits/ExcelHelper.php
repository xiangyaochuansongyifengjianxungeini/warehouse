<?php

namespace App\Models\Traits;

use App\Models\Item;
use App\Models\ItemValue;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelHelper
{

    protected $cellLetter = [
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q',
        'R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD',
        'AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN',
        'AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ'
    ];

    /**
     * 导出入库列表
     *
     * @param [type] $products
     * @return void
     */
    public function inputExport($products)
    {
        $cellData[] = ["产品名称","产品型号","产品状态","入库时间"];
        foreach($products as $val){
            $cellData[] = [
                $val['name'],
                $val['model'],
                $val['status']==1?'正常':'下架',
                $val['created_at']
            ];
        }

        return $cellData;
    }

    /**
     * 导出代理出库、退货列表
     *
     * @param [type] $orders
     * @return void
     */
    public function orderAgentExport($orders)
    {
        $cellData[] = ['产品名称','颜色','码数','仓库','类型','地址','价格','数量','状态','下单时间'];
        foreach($orders as $order){
            $cellData[] = [
                $order['product_name'],
                $order['color']['name'],
                $order['code']['name'],
                $order['warehouse']['name'],
                $order['category']==1?'代发':'自提',
                $order['address'],
                sprintf('%.2f',$order['sale_price']),
                $order['num'],
                $order['status'],
                $order['created_at'],
            ];
        }

        return $cellData;
    }

     /**
      * 导出管理员出库、退货列表
      *
      * @param [type] $orders
      * @return void
      */
    public function orderAdminExport($orders)
    {
        $cellData[] = ['产品名称','代理','类型','颜色','码数','地址','价格','数量','状态','下单时间'];
        foreach($orders as $order){
            $cellData[] = [
                $order['product_name'],
                $order['user']['name'],
                $order['category']==1?'代发':'自提',
                $order['color']['name'],
                $order['code']['name'],
                $order['address'],
                sprintf('%.2f',$order['sale_price']),
                $order['num'],
                $this->orderStatus($order['status']),
                $order['created_at'],
            ];
        }
        $cellData[] = [
            '订单数：'.count($orders),
            '',
            '',
            '',
            '',
            '',
            '合计：'.collect($orders)->sum('sale_price'),
            '合计：'.collect($orders)->sum('num'),
            '',
            '',
        ];
        return $cellData;
    }

    /**
     * 数据导出
     *
     * @param [type] $fileName
     * @param [type] $cellData
     * @return void
     */
    public function export($fileName,$cellData)
    { 
        Excel::create($fileName,function ($excel) use ($cellData,$fileName){
            $excel->sheet($fileName, function ($sheet) use ($cellData){
                $sheet->rows($cellData);

                for($i=0;$i<count($cellData)+1;$i++){
                    $sheet->setWidth($this->cellLetter[$i], 18);
                    $sheet->row($i, function ($row) use($i) {
                        $row->setAlignment('left');
                   });
                }
                $sheet->setAutoSize();
            });
        })->export('xls');
    }
    
    /**
     * 获取订单状态
     *
     * @param [type] $status
     * @return void
     */
    public function orderStatus($status)
    {
        switch($status){
            case '0':
                return '删除';
                break;

            case '1':
                return '待确认';
                break;

            case '2':
                return '待删除';
                break;

            case '3':
                return '已确认';
                break;

            case '4':
                return '待退货';
                break;

            case '5':
                return '已退货';
                break;

            case '6':
                return '已取消';
                break;

            default:
               return '';

        }
    }

    /**
     * 导出出库订单管理列表
     *
     * @return void
     */
    public function orderManageExport($orders,$user)
    {
        $cellData[] = ['订单列表'];
        $cellData[] = ['会员名:'.$user->name,'','','','',''];
        $cellData[] = ['时间：'.Carbon::now(),'','','','',''];
        $cellData[] = ['产品名称','颜色','码数','数量','单价','总价','地址'];

        foreach($orders as $order){
            $cellData[] = [
                $order['product_name'],
                $order['color']['name'],
                $order['code']['name'],
                $order['num'],
                sprintf('%.2f',$order['sale_price']/$order['num']),
                $order['sale_price'],
                $order['address'],
            ];
        }

        $cellData[] = [
            '订单数:'.count($orders),
            '',
            '',
            '合计:'.collect($orders)->sum('num'),
            '',
            '合计:'.sprintf('%.2f',collect($orders)->sum('sale_price')),
        ];

        $fileName = '订单列表';
        return Excel::create($fileName,function ($excel) use ($cellData,$fileName){
            $excel->sheet($fileName, function ($sheet) use ($cellData){

                $column = $this->cellLetter[count($cellData[1]) - 1];
                $sheet->rows($cellData);
                // $sheet->setAutoSize();
                
                $sheet->mergeCells('A1:' . $column . '1');
                $sheet->mergeCells('A2:' . $column . '2');
                $sheet->mergeCells('A3:' . $column . '3');

                for($i=0;$i<count($cellData[1]);$i++){
                    $sheet->setWidth($this->cellLetter[$i], 20);
                }
            
                for($i=4;$i<count($cellData)+1;$i++){
                    $sheet->row($i, function ($row) use($i) {
                        $row->setAlignment('center');
                        // $row->setValignment('center');
                   });
                }

                //设置标题的样式
                $sheet->row(1, function ($row) {
                    $row->setFont(array(
                            'family' => 'Calibri',
                            'size' => '16',
                            'bold' => true
                    ))->setAlignment('center');
                });
            });

        })->export('xls');
    }

}