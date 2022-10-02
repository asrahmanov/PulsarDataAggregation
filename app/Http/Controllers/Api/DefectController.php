<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Defect;
use Illuminate\Http\Request;

class DefectController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/data-aggregation-defect",
     *     tags={"Defect"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(Defect::get(), 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Defect"},
     *     path="/api/data-aggregation-defect/get-by-id/{id}",
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

        return Defect::select()
            ->where(['id' => $id])
            ->get();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Defect"},
     *     path="/api/data-aggregation-defect/get-by-name/{name}",
     *     @OA\Parameter( name="name", in="path", required=false, description="1", @OA\Schema( type="string" ) ),
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
    public function getByName($name)
    {
        $name = urldecode($name);
        return Defect::select()
            ->where(['name' => $name])
            ->get();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Defect"},
     *     path="/api/data-aggregation-defect/group-by-name/{name}",
     *     @OA\Parameter( name="name", in="path", required=false, description="1", @OA\Schema( type="string" ) ),
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
    public function groupByName($name)
    {
        return Defect::select('name')
            ->groupBy('name')
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


//"name",
//"event",
//"name_product",
//"date_otk",
//"cover_sheet_number",
//"product_drawing",
//"name_operation",
//"code_operation",
//"quantity_operation",
//"au_per",
//"quantity_effective",
//"quantity_fail",
//"output_percentage_norm",
//"output_percentage_fact",
//"tnb",
//"other_defect",
//"date_defect",
//"regulatory_cost_rejected_product",
//"amount_defect_plan",
//"amount_defect_fact",
//"code_sto",
//"name_defect",
//"affiliation_defect",
//"sing_defect",
//"unit_detection_defect",
//"cause_defect",
//"name_culprit_defect",

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/data-aggregation-defect",
     *     tags={"Defect"},
     *     @OA\RequestBody(
     *    request="Create Defect",
     *    description="Create Defect Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="name",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="event",description="1", type="number", example="1"),
     *          @OA\Property(property="name_product",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="date_otk",description="-", type="date", example="2022-01-01"),
     *          @OA\Property(property="cover_sheet_number",description="0", type="number", example="1"),
     *          @OA\Property(property="product_drawing",description="0", type="string", example="1"),
     *          @OA\Property(property="name_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="code_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="quantity_operation",description="0", type="number", example="1"),
     *          @OA\Property(property="au_per",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_effective",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_fail",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_norm",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="tnb",description="0", type="string", example="1"),
     *          @OA\Property(property="other_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="date_defect",description="0", type="date", example="1"),
     *          @OA\Property(property="regulatory_cost_rejected_product",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_plan",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="code_sto",description="0", type="string", example="1"),
     *          @OA\Property(property="name_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="affiliation_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="sing_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="unit_detection_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="cause_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="name_culprit_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="year",description="0", type="number", example="2022"),
     *          @OA\Property(property="company_id",description="0", type="number", example="1"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="name",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="event",description="1", type="number", example="1"),
     *          @OA\Property(property="name_product",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="date_otk",description="-", type="date", example="2022-01-01"),
     *          @OA\Property(property="cover_sheet_number",description="0", type="number", example="1"),
     *          @OA\Property(property="product_drawing",description="0", type="string", example="1"),
     *          @OA\Property(property="name_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="code_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="quantity_operation",description="0", type="number", example="1"),
     *          @OA\Property(property="au_per",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_effective",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_fail",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_norm",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="tnb",description="0", type="string", example="1"),
     *          @OA\Property(property="other_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="date_defect",description="0", type="date", example="1"),
     *          @OA\Property(property="regulatory_cost_rejected_product",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_plan",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="code_sto",description="0", type="string", example="1"),
     *          @OA\Property(property="name_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="affiliation_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="sing_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="unit_detection_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="cause_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="name_culprit_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="year",description="0", type="number", example="2022"),
     *          @OA\Property(property="company_id",description="0", type="number", example="1"),
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
           $form = Defect::whereId($request->id)->first();
       } else {
           $form = new Defect();
       }

        $validator = $form->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $form->fill($request->only($form->getFillable()))->save();
        return response(
            Defect::whereId($form->id)->first()->toArray(), 200);


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
     *     path="/api/data-aggregation-defect/{id}",
     *     tags={"Defect"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Defect",
     *    description="Update Defect Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="name",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="event",description="1", type="number", example="1"),
     *          @OA\Property(property="name_product",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="date_otk",description="-", type="date", example="2022-01-01"),
     *          @OA\Property(property="cover_sheet_number",description="0", type="number", example="1"),
     *          @OA\Property(property="product_drawing",description="0", type="string", example="1"),
     *          @OA\Property(property="name_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="code_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="quantity_operation",description="0", type="number", example="1"),
     *          @OA\Property(property="au_per",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_effective",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_fail",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_norm",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="tnb",description="0", type="string", example="1"),
     *          @OA\Property(property="other_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="date_defect",description="0", type="date", example="1"),
     *          @OA\Property(property="regulatory_cost_rejected_product",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_plan",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="code_sto",description="0", type="string", example="1"),
     *          @OA\Property(property="name_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="affiliation_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="sing_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="unit_detection_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="cause_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="name_culprit_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="year",description="0", type="number", example="2022"),
     *          @OA\Property(property="company_id",description="0", type="number", example="1"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="name",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="event",description="1", type="number", example="1"),
     *          @OA\Property(property="name_product",description="-", type="string", example="ТРЛО1"),
     *          @OA\Property(property="date_otk",description="-", type="date", example="2022-01-01"),
     *          @OA\Property(property="cover_sheet_number",description="0", type="number", example="1"),
     *          @OA\Property(property="product_drawing",description="0", type="string", example="1"),
     *          @OA\Property(property="name_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="code_operation",description="0", type="string", example="1"),
     *          @OA\Property(property="quantity_operation",description="0", type="number", example="1"),
     *          @OA\Property(property="au_per",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_effective",description="0", type="number", example="1"),
     *          @OA\Property(property="quantity_fail",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_norm",description="0", type="number", example="1"),
     *          @OA\Property(property="output_percentage_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="tnb",description="0", type="string", example="1"),
     *          @OA\Property(property="other_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="date_defect",description="0", type="date", example="1"),
     *          @OA\Property(property="regulatory_cost_rejected_product",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_plan",description="0", type="number", example="1"),
     *          @OA\Property(property="amount_defect_fact",description="0", type="number", example="1"),
     *          @OA\Property(property="code_sto",description="0", type="string", example="1"),
     *          @OA\Property(property="name_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="affiliation_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="sing_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="unit_detection_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="cause_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="name_culprit_defect",description="0", type="string", example="1"),
     *          @OA\Property(property="year",description="0", type="number", example="2022"),
     *          @OA\Property(property="company_id",description="0", type="number", example="1"),
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
        $entity = Defect::whereId($request->id)->first();
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
     *     path="/api/data-aggregation-defect/{id}",
     *     tags={"Defect"},
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
        $is_deleted = (bool)Defect::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
