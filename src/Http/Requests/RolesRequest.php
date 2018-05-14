<?php

namespace IA\LaravelUserManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $actionMethod   = $this->route()->getActionMethod();

        if ( $actionMethod == 'store' ) return [
            'item.name'       => 'required|alpha_num',
        ];

        if ( $actionMethod == 'update' ) return [
            'item.name'       => 'required|alpha_num',
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
