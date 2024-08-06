<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactPhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @OA\Schema(
     *      schema="StoreContactPhoneRequest",
     *      type="object",
     *      description="Request DTO to update phone",
     *      @OA\Property(
     *          type="stryng",
     *          property="phone",
     *          example="+380938499546",
     *      ),
     *      @OA\Property(
     *          type="boolean",
     *          property="default",
     *          example="true",
     *      )
     * )
     */
    public function rules(): array
    {
        return [
            'default' => 'required|boolean',
            'phone' => ['required', Rule::unique('phones')->ignore($this->route('phone'))],
        ];
    }
}
