<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

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
            'eventName' => 'required|min:20',
            'bandNames' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
//            'portfolio' => 'required',
            'ticketPrice' => 'required|numeric|not_in:0',
            'thumbnail' => 'required|url',
            'status' => 'required|integer|min:0|max:3',
        ];
    }

    public function messages()
    {
        return [
            'eventName.required' => 'Please enter eventName',
            'eventName.min' => 'eventName must at least 20 character',
            'bandNames.required' => 'Please enter bandNames',
            'startDate.required' => 'Please enter startDate',
            'endDate.required' => 'Please enter endDate',
//            'portfolio.required' => 'Please enter portfolio',
            'ticketPrice.required' => 'Please enter ticketPrice',
            'ticketPrice.not_in' => 'Please enter not in 0',
            'thumbnail.required' => 'Please chose thumbnail',
            'thumbnail.url' => 'Thumbnail must url',
//            'status.required' => 'Please enter status',
        ];
    }

    // validate theo business riêng.
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $startDate = $this->get('startDate');
            $endDate = $this->get('endDate');

            if($this->get('eventName') == 'AK'){
                $validator->errors()->add('eventName', 'Event không chơi với AK.');
            }
            if(date("d/m/Y", strtotime($startDate)) < date("d/m/Y", strtotime(Carbon::now()))){ // startDate phải sau ngày hiện tại
                $validator->errors()->add('startDate', "Start date must after current date");
            }
            if($endDate < $startDate ){ // endDate phải sau phải sau ngày start
                $validator->errors()->add('endDate', "End date must after startDate");
            }
        });
    }
}
