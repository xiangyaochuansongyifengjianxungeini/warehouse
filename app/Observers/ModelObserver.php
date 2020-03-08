<?php

namespace App\Observers;

use App\Events\DefaultLoggable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class ModelObserver
{
    /**
     * 模型新建后
     */
    public function created($model)   
    {
        $attributes = $model->getAttributes();
        $attributes = Arr::except($attributes, ['created_at', 'updated_at']);
 
        $modelName = get_class($model);
        // $baseModelName = get_base_class($model);
        $baseModelName = class_basename($model);
        $modelId = $model->getKey();
        $title = "新建【{$baseModelName}】模型";
        // $content = "模型数据：".pretty_string($attributes);
        $content = "模型数据：".json_encode($attributes);
 
        $comment = '新建【'.$model->comment.'】'.$model->name.'数据';
        event(new DefaultLoggable($title, $content, null, $modelName, $modelId,$comment));
    }    
 
    /**
     * 只有确定更新后才记录日志
     */
    public function updated($model)   
    {
        $dirty = $model->getDirty();
        $original = $model->getOriginal();

        // 有时候可能只要监控某些字段
        if (method_exists($model, 'limitObservedFields')) {
            $fields = $model->limitObservedFields();
            $dirty = Arr::only($dirty, $fields);
            $original = Arr::only($original, array_keys($dirty));
        } else {
            $dirty = Arr::except($dirty, ['updated_at']);
            $original = Arr::only($original, array_keys($dirty));
        }
 
        if (count($dirty)) {
            $modelName = get_class($model);
            $baseModelName = class_basename($model);
            $modelId = $model->getKey();
            $title = "修改【{$baseModelName}】模型";
            // $content = "数据修改前：".pretty_string($original)."；数据修改后：".pretty_string($dirty);
            $content = "数据修改前：".json_encode($original)."；数据修改后：".json_encode($dirty);
            $comment = '修改【'.$model->comment.'】'.$model->name.'数据';
            event(new DefaultLoggable($title, $content, null, $modelName, $modelId,$comment));            
        }
    }
 
    /**
     * 模型删除后
     */
    public function deleted($model)   
    {
        $attributes = $model->getAttributes();
 
        $modelName = get_class($model);
        // $baseModelName = get_base_class($model);
        $baseModelName = class_basename($model);
        $modelId = $model->getKey();
        $title = "删除【{$baseModelName}】模型";
         // $content = "模型数据：".pretty_string($attributes);
         $content = "模型数据：".json_encode($attributes);
 
        $comment = '删除【'.$model->comment.'】'.$model->name.'数据';
        event(new DefaultLoggable($title, $content, null, $modelName, $modelId,$comment));
    }      

}
