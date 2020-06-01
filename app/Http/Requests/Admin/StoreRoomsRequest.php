<?php
// StoreRoomsRequest.php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomsRequest extends FormRequest
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
            // 'room_number' => 'required',
            // 'clean' => 'required',
            // 'floor' => 'required',
            // 'description' => 'required',
            // 'price' => 'required',
            // 'disc' => 'required',
            // 'state' => 'required',
            // 'type' => 'required',
            // 'title' => 'required',
            // 'rating' => 'required',
            // 'cover_image' => 'image|nullable|max:1999'
        ];
    }
}
