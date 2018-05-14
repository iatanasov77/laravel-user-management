<?php

namespace IA\LaravelUserManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $actionMethod   = $this->route()->getActionMethod();

        if ( $actionMethod == 'store') return [
            'item.email'        => 'required|email|max:50',
            'item.roles'        => 'array|required',
            'item.name'         => 'required|alpha_num|max:50',
            'item.last_name'    => 'required|alpha_num|max:50',
            'item.password'     => 'required|between:3,50',
            'password_confirm'  => 'same:item.password'
        ];

        if( $actionMethod == 'update' ) return [
            'item.email'        => 'required|email',
            'item.roles'        => 'array|required',
            'item.name'         => 'required|alpha_num',
            'item.last_name'    => 'required|alpha_num',
            'password_confirm'  => 'same:item.password'
        ];

        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
