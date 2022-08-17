<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sessionRequest extends FormRequest
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
            'committeeID'=>['required', ],
            '*'=>['required', ],
        ];
    }
    public function messages()
    {
        return [
            'committeeID.required' =>'حقل رقم اللجنة مطلوب',
            'firstSessionDate.required'=>'حقل تاريخ الجلسة القادمة مطلوب',
            'firstSessionTimeStart.required'=>'حقل وقت بداية الجلسة القادمة مطلوب',
            'firstSessionTimeEnd.required'=>'حقل وقت نهاية الجلسة القادمة مطلوب',
            'firstSessionPlace.required'=>'حقل مكان إقامة الجلسة القادمة مطلوب',
        ];
    }

}
