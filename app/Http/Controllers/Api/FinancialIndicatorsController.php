<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinancialIndicators;
use Illuminate\Http\Request;

class FinancialIndicatorsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/data-aggregation-financial-indicators",
     *     tags={"Financial-indicators"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(FinancialIndicators::get(), 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Financial-indicators"},
     *     path="/api/data-aggregation-financial-indicators/get-by-id/{id}",
     *     @OA\Parameter( name="id", in="path", required=false, description="1", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function getById($id)
    {

        return FinancialIndicators::select()
            ->where(['id' => $id])
            ->get();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/data-aggregation-financial-indicators",
     *     tags={"Financial-indicators"},
     *     @OA\RequestBody(
     *    request="Create Financial-indicators",
     *    description="Create Financial-indicators Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="mount",description="Месяц", type="text", example="Январь"),
     *          @OA\Property(property="company_id",description="company_id", type="number", example="0"),
     *          @OA\Property(property="year",description="year", type="number", example="0"),
     *          @OA\Property(property="budget",description="budget", type="number", example="0"),
     *          @OA\Property(property="fact",description="fact", type="number", example="0"),
     *          @OA\Property(property="forecast",description="0", type="number", example="0"),
     *          @OA\Property(property="last_year",description="last_year", type="number", example="0"),
     *          @OA\Property(property="type",description="type", type="text", example="profit"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="mount",description="Месяц", type="text", example="Январь"),
     *          @OA\Property(property="company_id",description="company_id", type="number", example="0"),
     *          @OA\Property(property="year",description="year", type="number", example="0"),
     *          @OA\Property(property="budget",description="budget", type="number", example="0"),
     *          @OA\Property(property="fact",description="fact", type="number", example="0"),
     *          @OA\Property(property="forecast",description="0", type="number", example="0"),
     *          @OA\Property(property="last_year",description="last_year", type="number", example="0"),
     *          @OA\Property(property="type",description="type", type="text", example="profit"),
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     * )
     * )
     *      ),
     * )
     */
    public function store(Request $request)
    {

       if($request->id > 0) {
           $form = FinancialIndicators::whereId($request->id)->first();
       } else {
           $form = new FinancialIndicators();
       }

        $validator = $form->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $form->fill($request->only($form->getFillable()))->save();
        return response(
            FinancialIndicators::whereId($form->id)->first()->toArray(), 200);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Patch (
     *     path="/api/data-aggregation-financial-indicators/{id}",
     *     tags={"Financial-indicators"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Financial-indicators",
     *    description="Update Financial-indicators Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="mount",description="Месяц", type="text", example="Январь"),
     *          @OA\Property(property="company_id",description="company_id", type="number", example="0"),
     *          @OA\Property(property="year",description="year", type="number", example="0"),
     *          @OA\Property(property="budget",description="budget", type="number", example="0"),
     *          @OA\Property(property="fact",description="fact", type="number", example="0"),
     *          @OA\Property(property="forecast",description="0", type="number", example="0"),
     *          @OA\Property(property="last_year",description="last_year", type="number", example="0"),
     *          @OA\Property(property="type",description="type", type="text", example="profit"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="mount",description="Месяц", type="text", example="Январь"),
     *          @OA\Property(property="company_id",description="company_id", type="number", example="0"),
     *          @OA\Property(property="year",description="year", type="number", example="0"),
     *          @OA\Property(property="budget",description="budget", type="number", example="0"),
     *          @OA\Property(property="fact",description="fact", type="number", example="0"),
     *          @OA\Property(property="forecast",description="0", type="number", example="0"),
     *          @OA\Property(property="last_year",description="last_year", type="number", example="0"),
     *          @OA\Property(property="type",description="type", type="text", example="profit"),
     *
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     * )
     *      ),
     * )
     */
    public function update(Request $request)
    {
        $entity = FinancialIndicators::whereId($request->id)->first();
        if (!$entity) {
            return response([], 404);
        }

        $validator = $entity->validate($request->all(), false);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()));

        if ($entity->save()) {

            return response($entity->toArray(), 200);
        } else {
            return response('anyError', 500);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Delete  (
     *     path="/api/data-aggregation-financial-indicators/{id}",
     *     tags={"Financial-indicators"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=true),
     *         )
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="Error Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=false),
     *         )
     *      ),
     *
     * )
     */
    public function destroy($id)
    {
        $is_deleted = (bool)FinancialIndicators::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
