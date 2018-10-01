<?php

namespace App\Http\Requests\Backend\Administration;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MachineDetailRequest.
 */
class MachineDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:100',
            'description' => 'required',
        ];
    }
}
