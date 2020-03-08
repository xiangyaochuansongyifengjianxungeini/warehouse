<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $path = \Request::route()->getName();
       switch($path){
           case 'items.store':
                return [
                    'name' => 'required|unique:items',
                ];
                break;
           case 'items.update':
                return [
                    'name' => ['required',Rule::unique('items')->ignore($this->route('item')->id)],
                ];
                break;
            case 'items.valueStore':
                return [
                    'item_id' => 'required',
                    'name' => ['required',Rule::unique('item_values')->where('user_id',auth('api')->user()->id)],
                ];
                break;
           default:
                return [

                ];
       }
    }
}
