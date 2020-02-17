<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserProfile extends FormRequest
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
        $user = $this->user;
        $user_id = $user['id'];

        return [
            // User
            'user.name' => ['required', 'string', 'min:3', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$user_id],
            'user.phone' => ['required', 'string', 'min:10', 'max:25', 'unique:users,phone,'.$user_id],
            //profileform
            'profileform.web_site' => ['nullable', 'string', 'max:100'],
            'profileform.photo' => ['string'],
            'profileform.dribbble' => ['nullable', 'string', 'max:100'],
            'profileform.behance' => ['nullable', 'string', 'max:100'],
            'profileform.git' => ['nullable', 'string', 'max:100'],
            'profileform.linkedin' => ['nullable', 'string', 'max:100'],
            //addressform
            'addressform.country' => ['required'],
            'addressform.region' => ['required'],
            'addressform.city' => ['required', 'string', 'min:3', 'max:100'],
            'addressform.index' => ['required', 'string', 'min:1', 'max:100'],
            'addressform.street' => ['required', 'string', 'min:1', 'max:100'],
            //lenguageform(array)
            'lenguageform.*.id' => ['nullable'],
            'lenguageform.*.lenguage' => ['required', 'string', 'min:3', 'max:100'],
            'lenguageform.*.level_id' => ['required'],
            //skillform(array)
            'skillform.*.id' => ['nullable'],
            'skillform.*.skill' => ['required', 'string', 'min:2', 'max:100'],
            'skillform.*.level_id' =>['required'],
            //educationform(array)
            'educationform.*.id' => ['nullable'],
            'educationform.*.university' => ['required', 'string', 'min:3', 'max:100'],
            'educationform.*.specialty' => ['required', 'string', 'min:3', 'max:100'],
            'educationform.*.start' => ['required', 'string', 'min:3', 'max:100'],
            'educationform.*.finish' => ['nullable', 'string', 'max:100'],
            'educationform.*.degree' => ['required', 'string', 'min:3', 'max:100'],
            //experienceform(array)
            'experienceform.*.id' => ['nullable'],
            'experienceform.*.company' => ['required', 'string', 'min:3', 'max:100'],
            'experienceform.*.position' => ['required', 'string', 'min:3', 'max:100'],
            'experienceform.*.start' => ['required', 'string', 'min:3', 'max:100'],
            'experienceform.*.finish' => ['nullable', 'string', 'max:100'],
            'experienceform.*.functions' => ['required', 'min:3', 'max:10000'],
            //projectsform
            'projectsform.description' => ['nullable', 'string', 'max:10000'],
            //hobbyform(array)
            'hobbyform.*.id' => ['nullable'],
            'hobbyform.*.hobby' => ['nullable', 'string', 'max:255']
        ];
    }
}
