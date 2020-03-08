<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;

class WarehouseRequest extends FormRequest
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
        $path = Request::route()->getName();
        switch($path)
        {
            case 'warehouses.store':
                return [
                    'name' => 'required|unique:warehouses',
                    'user_id' => 'required',
                ];
                break;
                
            case 'warehouses.update':
                return [
                    'name' => ['required',Rule::unique('warehouses')->ignore($this->route('warehouse')->id)],
                    'user_id' => 'required',
                ];
                break;
            default:
                return [

                ];
        }
    }
}
