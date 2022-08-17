<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class committeeRequest extends FormRequest
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
            'commNumber' => ['required', 'Numeric',],
            'commDate' => ['required'],
            'commName' => ['required',],
            'isRegular' => ['nullable', 'boolean'],
            // members validation
            "membersGroup.*.memberName"  => ['required', 'string'],
            "membersGroup.*.memberDescription"  => ['required',],
            // tasks validation
            "tasksGroup.*.taskDescription"  => ['required',],
            //regulation validation
            "regulationsGroup.*.regulationDescription"  => ['required',],
            //sessions validation
            'firstSessionDate'=>['required_with:isRegular'],
            'firstSessionTimeStart'=>['required_with:isRegular'],
            'firstSessionTimeEnd'=>['required_with:isRegular'],
            'firstSessionPlace'=>['required_with:isRegular'],
        ];
    }

    public function messages()
    {
        return [
            'commNumber.required' =>'حقل رقم اللجنة مطلوب',
            'commNumber.Numeric' =>' حقل رقم اللجنة يجب أن يتكون من قيمة عددية',
            'commDate.required'=>'حقل تاريخ إنشاء اللجنة مطلوب',
            'commName.required'=>'حقل اسم اللجنة مطلوب',
           
            'membersGroup.*.memberName.required'=>'حقل اسم العضو مطلوب',
            'membersGroup.*.memberName.string'=>'حقل اسم العضو يجب أن يكون نصاً',
            'membersGroup.*.memberDescription.required'=>'حقل صفة العضو مطلوب',
            
            'tasksGroup.*.taskDescription.required'=>'حقل تفاصيل المهمة مطلوب',

            'regulationsGroup.*.regulationDescription.required'=>'حقل تفاصيل الضابط مطلوب',

            'firstSessionDate.required_with'=>'حقل تاريخ الجلسة الأولى مطلوب',
            'firstSessionTimeStart.required_with'=>'حقل وقت بداية الجلسة الأولى مطلوب',
            'firstSessionTimeEnd.required_with'=>'حقل وقت نهاية الجلسة الأولى مطلوب',
            'firstSessionPlace.required_with'=>'حقل مكان إقامة الجلسة الأولى مطلوب',


        ];
    }
}
