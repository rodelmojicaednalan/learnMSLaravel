<?php

namespace App\Http\Requests\Classes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        if ($user->roles->pluck( 'name' )->contains( 'school_administrator' )) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'user_id' => 'required',
            'subject_id' => 'required',
            'level_id' => 'required',
            'class' => 'required',
            'fee' => 'required',

        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => "Teacher ID is required",
            'subject_id.required' => "Subject ID is required",
            'level_id.required' => "Level ID is required",
            'class.required' => "Class name is required",
            'fee.required' => "Fee is required",
        ];
    }
}
