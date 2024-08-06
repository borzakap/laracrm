<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\BaseCollection;

class ContactListCollection extends BaseCollection
{
    /**
     * @OA\Response(
     *      response="ContactListCollection",
     *      description="Contact list structure",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  ref="#/components/schemas/ContactListResource"
     *              )
     *          ),
     *          @OA\Property(
     *              property="meta",
     *              type="object",
     *              ref="#components/schemas/paginationInformation",
     *          ),
     *      )
     * )
     *
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
