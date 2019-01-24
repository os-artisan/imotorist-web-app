<?php

namespace App\Http\Requests\Backend\Fine\Offence;

use App\Http\Requests\Request;

/**
 * Class StoreOffenceRequest.
 */
class StoreOffenceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|max:191',
            'description_si' => 'required|max:191',
            'fine' => 'required|numeric|min:0',
            'dip' => 'required|numeric|min:0',
        ];
    }
}
