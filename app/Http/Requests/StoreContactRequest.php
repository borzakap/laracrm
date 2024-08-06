<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * @OA\Schema(
     *      schema="StoreContactRequest",
     *      type="object",
     *      description="Request DTO to store contact",
     *      @OA\Property(
     *          property="name",
     *          type="string",
     *          example="Contact Name",
     *      ),
     *      @OA\Property(
     *          property="phones",
     *          type="array",
     *          nullable=true,
     *          @OA\Items(
     *              @OA\Property(
     *                  type="stryng",
     *                  property="phone",
     *                  example="+380938499546",
     *              ),
     *              @OA\Property(
     *                  type="boolean",
     *                  property="default",
     *                  example="true",
     *              )
     *          ),
     *      ),
     *      @OA\Property(
     *          property="emails",
     *          type="array",
     *          nullable=true,
     *          @OA\Items(
     *              @OA\Property(
     *                  type="string",
     *                  property="email",
     *                  example="example@mail.com",
     *              ),
     *              @OA\Property(
     *                  type="boolean",
     *                  property="default",
     *                  example="true",
     *              )
     *          ),
     *      ),
     *      @OA\Property(
     *          property="userId",
     *          type="integer",
     *          nullable=true,
     *          example="1",
     *      )
     * )
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
