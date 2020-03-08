<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemValue;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    /**
     * 属性列表
     *
     * @return void
     */
    public function index()
    {
        $items = Item::with(['value'=>function($query){
            $query->available();
            $query->select('id','item_id','name');
        }])->get();

        return respond(1,'成功',$items);
    }
  

    /**
     * 属性值添加
     *
     * @param ItemRequest $request
     * @return void
     */
    public function valueStore(ItemRequest $request)
    {
        $result = auth('api')->user()->itemValue()->create($request->all());

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }

    /**
     * 属性值删除
     *
     * @param ItemValue $ItemValue
     * @return void
     */
    public function valueDestroy(ItemValue $ItemValue)
    {

        $result = $ItemValue->update(['status'=>0]);

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }


}
