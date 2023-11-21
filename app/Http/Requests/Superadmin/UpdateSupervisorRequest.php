<?php

namespace App\Http\Requests\Superadmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupervisorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "full_name" => ['required'],
            "level_id" => ['required'],
//            "login" => ['required', 'unique:users,login'],
//            "old_password" => ['required'],
//            "password" => ['required', 'confirmed'],
//            "password_confirmation" => ['required'],
        ];
    }
}
