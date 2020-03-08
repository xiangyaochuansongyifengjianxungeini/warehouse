<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
            case 'suppliers.store':
            {
                return [
                    'name' => 'required|unique:suppliers',
                ];
            }
            break;
            case 'suppliers.update':
            {
                return [
                    'name' => ['required',Rule::unique('suppliers')->ignore($this->route('supplier')->id)],
                ];
                break;
            }
            default:
                return [

                ];
        }
        
    }
}
