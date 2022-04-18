<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'leader' => ['required'],
            'client_company' => ['required'],
            // 'status' => ['required', 'in:open, on-hold, closed'],
            'budget' => ['required', 'numeric', 'min:0'],
            'deadline' => ['required', 'numeric', 'min:0'],
        ];
    }
}
