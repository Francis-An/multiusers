<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMedicineRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'generic_name' => 'required',
            'instructions' => 'required',
            'manufacture' => 'required',
            'description' => 'required',
            'starting_date' => 'required|date',
            'expiry_date' => 'required|date',
            'price' => 'required|integer',
            'available' => 'required|integer',
            'dose' => 'required|integer',
            'dose_unit' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg'
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ];
    }
}
