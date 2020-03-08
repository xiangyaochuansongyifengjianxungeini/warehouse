<?php

namespace App\Http\Requests;

use App\Exceptions\CheckException;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgentRankRequest extends FormRequest
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
            case 'agentRanks.store':
                return [
                    'name' => 'required|unique:agent_ranks',
                    'rate' => 'required|numeric',
                ];
            break;
            case 'agentRanks.update':
                return [
                    'name' => ['required',Rule::unique('agent_ranks')->ignore($this->route('agentRank')->id)],
                    'rate' => 'required|numeric',
                ];
                break;
            case 'agentRanks.destroy':
                if(User::where('agent_rank_id','=',$this->route('agentRank')->id)->exists()){
                    throw new CheckException(0,'代理等级已关联相关代理');
                }
            default:
            return [

            ];
        }
    }
}
