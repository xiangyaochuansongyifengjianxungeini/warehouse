<?php

namespace App\Http\Requests;

use App\Exceptions\CheckException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            case 'users.login':
                return [
                    'tel' => 'required',
                    'password' => 'required',
                ];
                break;
            case 'users.store':
                return [
                    'tel' => 'required|regex:/^1[345789][0-9]{9}$/|unique:users',
                    'name' => 'required',
                ];
                break;
            case 'users.update':
                return [
                    'tel' => ['required','regex:/^1[345789][0-9]{9}$/',Rule::unique('users')->ignore($this->route('user')->id)],
                    'name' => ['required'],
                ];
                break;
            case 'users.updateStatus':
                return [
                    'status' => 'required|in:0,1,2',
                ];
                break;
            case 'users.resetPassword':
                $credentials['tel'] = auth('api')->user()->tel;
                $credentials['password'] = request('old_password');
                if (!$token = auth('api')->attempt($credentials)) {
                    throw new CheckException('0','旧密码错误');
                }
                return [
                    'old_password' => ['required'],
                    'new_password' => 'required|min:6|max:16',
                ];
                break;
            default:
                return [

                ];
        }
    }
}
