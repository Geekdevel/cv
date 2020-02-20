<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'user_id' => ['nullable'],
            'slug' => ['string', 'min:3', 'max:255'],
            'job_title' => ['string', 'min:3', 'max:100'],
            'description' => ['string', 'min:3', 'max:10000']
        ];
    }
}
