<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // pas de notion de user encore donc on met true pour tester
        // return $user->connected();
        //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:10',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.min' => 'This task name is really too short !'
        ];
    }
}
