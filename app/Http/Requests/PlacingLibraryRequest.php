<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class PlacingLibraryRequest extends FormRequest
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
            case 'placingLibraries.store':
                return [
                    'placingLibrary' => 'required',
                ];
                break;

            case 'placingLibraries.store':
                return [
                    'num' => 'required',
                ];
                break;

            default:
                return [
                    
                ];
        }
    }
}
