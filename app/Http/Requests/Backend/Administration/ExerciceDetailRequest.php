<?php

namespace App\Http\Requests\Backend\Administration;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ExerciceDetailRequest.
 */
class ExerciceDetailRequest extends FormRequest
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
            'nombre_series' => 'required|integer|max:10',
            'recuperation' => 'required|integer|max:1000',
            'id_machines' => 'required',
            'id_groupes_musculaires' => 'required',
        ];
    }
}
