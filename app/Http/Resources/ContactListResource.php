<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResponsibleResource;

class ContactListResource extends JsonResource
{
    /**
     * @OA\Schema(
     *   schema="ContactListResource",
     *   type="object",
     *   description="Contact list item structure",
     *   @OA\Property(
     *      property="id",
     *      type="integer",
     *      example="1",
     *   ),
     *   @OA\Property(
     *      property="name",
     *      type="string",
     *      example="Contact name",
     *   ),
     *   @OA\Property(
     *      property="email",
     *      type="string",
     *      example="example@email.com",
     *      nullable=true
     *   ),
     *   @OA\Property(
     *      property="phone",
     *      type="string",
     *      example="+380489544854",
     *      nullable=true
     *   ),
     *   @OA\Property(
     *      property="responsible",
     *      type="object",
     *      ref="#components/schemas/ResponsibleResource",
     *   ),
     * )
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email?->email,
            'phone' => $this->phone?->phone,
            'responsible' => ResponsibleResource::withoutWrapping($this->responsible),
        ];
    }
}
