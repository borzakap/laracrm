<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactEmailRequest extends FormRequest
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
     *      schema="StoreContactEmailRequest",
     *      type="object",
     *      description="Request DTO to update email",
     *      @OA\Property(
     *          type="string",
     *          property="email",
     *          example="example@email.com",
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
            'email' => ['required', 'email:rfc,dns', Rule::unique('emails')->ignore($this->route('email'))],
        ];
    }
}
