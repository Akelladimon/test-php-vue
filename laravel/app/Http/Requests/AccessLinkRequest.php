<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessLinkRequest extends FormRequest
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
            'uuid' => ["required", "string", "exists:access_links,uuid"],
            'is_active' => ["required", "bool"],
        ];
    }
}
