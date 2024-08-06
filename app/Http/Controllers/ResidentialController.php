<?php

namespace App\Http\Controllers;

use App\Models\Residential;
use App\Http\Resources\ResidentialGetResource;

/**
 * @OA\Tag(
 *      name="Residentials",
 *      description="Operations with Residentials",
 * )
 */
class ResidentialController extends Controller
{
    
    public function list()
    {
        
    }
    
    public function create()
    {
        
    }
    
    /**
     * @OA\Get(
     *      path="/api/residentials/{residentialId}",
     *      summary="Get residential by Id",
     *      tags={"Residentials"},
     *      @OA\Parameter(
     *          name="residentialId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/ResidentialGetResource"
     *      ),
     * )
     */
    public function get(Residential $residential)
    {
        return new ResidentialGetResource($residential);
    }
}
