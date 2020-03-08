<?php

namespace App\Http\Requests;

use App\Exceptions\CheckException;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        switch($path)
        {
            case 'roles.store':
                return [
                    'name' => 'required|unique:roles',
                ];
                break;
            case 'roles.update':
                return [
                    'name' => ['required',Rule::unique('roles')->ignore($this->route('role')->id)],
                ];
                break;
            case 'roles.destroy':
                if($this->route('role')->system == '1'){
                    throw new CheckException(0,'该角色为系统默认,无法删除！');
                }
                if(User::role($this->route('role')->id)->Aviable()->exists()) throw new CheckException(0,'该角色存在用户,无法删除！');
            default:
                return [
                    
                ];
        }
    }
}
