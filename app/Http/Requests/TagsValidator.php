<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TagValidator 
 * 
 * @package App\Http\Requests
 */
class TagsValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //! The authorization check is set to true because the check mainly 
        //! happen on the controller action function. 

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191', 'unique:tags,name'],
            'description' => ['required', 'string', 'max:191'],
        ];
    }
}
