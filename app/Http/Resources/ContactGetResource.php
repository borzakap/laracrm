<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\PhoneResource;
use App\Http\Resources\ResponsibleResource;

class ContactGetResource extends JsonResource
{
    /**
     * @OA\Response(
     *      response="ContactGetResource",
     *      description="Get contact`s data",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                  property="id",
     *                  type="integer",
     *                  example="1",
     *              ),
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  example="Contact Name",
     *              ),
     *              @OA\Property(
     *                  property="phones",
     *                  type="array",
     *                  @OA\Items(
     *                      ref="#components/schemas/PhoneResource",
     *                  ),
     *              ),
     *              @OA\Property(
     *                  property="emails",
     *                  type="array",
     *                  @OA\Items(
     *                      ref="#components/schemas/EmailResource"
     *                  ),
     *              ),
     *              @OA\Property(
     *                  property="responsible",
     *                  type="object",
     *                  ref="#components/schemas/ResponsibleResource",
     *              ),
     *          )
     *      )
     * )
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phones' => PhoneResource::collection($this->phones),
            'emails' => EmailResource::collection($this->emails),
            'responsible' => ResponsibleResource::withoutWrapping($this->responsible),
        ];
    }
}
