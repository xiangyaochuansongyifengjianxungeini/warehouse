<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;

trait ProductHelper
{
    /**
     * 上传图片
     */
    public function uploadImages($data)
    {
        foreach($data as &$val){
            $images = [];
            if(isset($val['image'])) foreach($val['image'] as $val1){
                //判断是否已经存在图片
                if(strpos($val1,'storage')){
                    $images[] = substr($val1,strripos($val1,'/')+1);
                    continue;
                }
                $base64_str = substr($val1, strpos($val1, ",")+1);
                $image=base64_decode($base64_str);
                $imgname=rand(1000,10000).time().'.png';
                Storage::disk('public')->put($imgname,$image);
                $images[] = $imgname;
            }
            $val['image'] = json_encode($images,JSON_UNESCAPED_UNICODE);
        }

        return $data;
    }
}

