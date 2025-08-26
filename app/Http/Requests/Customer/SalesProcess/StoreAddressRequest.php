<?php

namespace App\Http\Requests\Customer\SalesProcess;

use App\Rules\PostalCode;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|min:1|max:300',
            'postal_code' => ['required', new PostalCode()],
            'no' => 'required',
            'unit' => 'required',
            'receiver' => 'sometimes',
            'recipient_first_name' => 'required_with:receiver,on',
            'recipient_last_name' => 'required_with:receiver,on',
            'mobile' => 'required_with:receiver,on',
        ];
    }

    public function attributes()
    {
        return [
            'no'                        => 'پلاک',
        ];
    }

    public function messages()
    {
        return [
            'recipient_first_name.required_with' => '⚠️ :attribute الزامی است زمانی که گیرنده سفارش خودم نیستم انتخاب شده باشد.',
            'recipient_last_name.required_with'  => '⚠️ :attribute الزامی است زمانی که گیرنده سفارش خودم نیستم انتخاب شده باشد.',
            'mobile.required_with'               => '⚠️ :attribute الزامی است زمانی که گیرنده سفارش خودم نیستم انتخاب شده باشد.',
        ];
    }
}
