<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'eventName' => 'required|min:2',
            'bandNames' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
//            'portfolio' => 'required',
            'ticketPrice' => 'required',
//            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'eventName.required' => 'Please enter eventName',
            'eventName.min' => 'eventName must at least 2 character',
            'bandNames.required' => 'Please enter bandNames',
            'startDate.required' => 'Please enter startDate',
            'endDate.required' => 'Please enter endDate',
//            'portfolio.required' => 'Please enter portfolio',
            'ticketPrice.required' => 'Please enter ticketPrice',
//            'status.required' => 'Please enter status',
        ];
    }

    // validate theo business riêng.
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->get('eventName') == 'AK'){
                $validator->errors()->add('eventName', 'Event không chơi với AK.');
            }
        });
    }
}
