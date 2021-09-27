<?php
namespace App\Http\Requests;


/**
 * Interface RequestInterface
 * @package App\Http\Request\RequestInterface
 */
interface RequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() : bool;

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array;

    /**
     * Custom messages for validation.
     * @return array
     */
    public function messages() : array;

    /**
     * Filters to be applied to the input.
     * @return array
     */
    public function filters() : array;
}