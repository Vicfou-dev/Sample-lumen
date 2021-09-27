<?php
namespace App\Modules\Users\Requests;

use App\Http\Requests\BaseFormRequest;
use App\Http\Requests\RequestInterface;

class StoreUserRequest extends BaseFormRequest implements RequestInterface
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
            'email' => 'required|email|unique:users',
            'name'  => 'required|string|max:50',
            'password' => 'required'
        ];
    }

    /**
     * Custom messages for validation.
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required' => 'Email is required !',
            'name.required'  => 'Name is required !',
            'password.required' => 'Password is required !'
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