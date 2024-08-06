<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
{
    /**
     * @OA\Schema(
     *      schema="EmailResource",
     *      type="object",
     *      description="Email collection",
     *      @OA\Property(
     *          property="id",
     *          type="integer",
     *          example="1",
     *      ),
     *      @OA\Property(
     *          property="email",
     *          type="string",
     *          example="example@email.com",
     *      ),
     *      @OA\Property(
     *          property="default",
     *          type="boolean",
     *          example="true",
     *      ),
     * )
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'email' => $this->email,
            'default' => $this->default,
        ];
    }
}
