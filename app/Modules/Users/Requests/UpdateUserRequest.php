<?php
namespace App\Modules\Users\Requests;

use App\Http\Requests\BaseFormRequest;
use App\Http\Requests\RequestInterface;

class UpdateUserRequest extends BaseFormRequest implements RequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array 
    {
        return [
            'email' => 'nullable|email|unique:users',
            'name'  => 'nullable|string|max:50',
            'password' => 'nullable'
        ];
    }

    /**
     * Custom messages for validation.
     * @return array
     */
    public function messages() : array
    {
        return [
            
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters() : array
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
}