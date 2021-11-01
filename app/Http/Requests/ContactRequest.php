<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nameEmail' => 'required',
            'nameSend' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nameEmail.required' => 'Please enter name Email',
            'nameSend.required' => 'Please enter name Send',
            'subject.required' => 'Please enter subject',
            'message.required' => 'Please enter message',
        ];
    }
}
