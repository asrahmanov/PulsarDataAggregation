<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kep;
use Illuminate\Http\Request;

class KepController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/data-aggregation-kep",
     *     tags={"Kep"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(Kep::get(), 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Kep"},
     *     path="/api/data-aggregation-kep/get-by-id/{id}",
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

        return Kep::select()
            ->where(['id' => $id])
            ->get();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Kep"},
     *     path="/api/data-aggregation-kep/get-by-name/{company_name}",
     *     @OA\Parameter( name="company_name", in="path", required=false, description="1", @OA\Schema( type="text" ) ),
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
    public function getByName($nomenclature)
    {
        $company_name = urldecode($nomenclature);
        return Kep::select()
            ->where(['nomenclature' => $nomenclature])
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
     *     path="/api/data-aggregation-kep",
     *     tags={"Kep"},
     *     @OA\RequestBody(
     *    request="Create Kep",
     *    description="Create Kep Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="source_name",description="Source.Name", type="text", example=""),
     *          @OA\Property(property="pp",description="??.??", type="text", example=""),
     *          @OA\Property(property="nomenclature",description="????????????????????????;", type="text", example=""),
     *          @OA\Property(property="action",description="Action;", type="text", example=""),
     *          @OA\Property(property="date_action",description="0", type="text", example=""),
     *          @OA\Property(property="val",description="1", type="number", example="0"),
     *          @OA\Property(property="year",description="2022", type="number", example="0"),
     *          @OA\Property(property="company_id",description="0", type="number", example="17"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="source_name",description="Source.Name", type="text", example=""),
     *          @OA\Property(property="pp",description="??.??", type="text", example=""),
     *          @OA\Property(property="nomenclature",description="????????????????????????;", type="text", example=""),
     *          @OA\Property(property="action",description="Action;", type="text", example=""),
     *          @OA\Property(property="date_action",description="0", type="text", example=""),
     *          @OA\Property(property="val",description="1", type="number", example="0"),
     *          @OA\Property(property="year",description="2022", type="number", example="0"),
     *          @OA\Property(property="company_id",description="0", type="number", example="17"),
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

        if ($request->id > 0) {
            $form = Kep::whereId($request->id)->first();
        } else {
            $form = new Kep();
        }

        $validator = $form->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $form->fill($request->only($form->getFillable()))->save();
        return response(
            Kep::whereId($form->id)->first()->toArray(), 200);


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
     *     path="/api/data-aggregation-kep/{id}",
     *     tags={"Kep"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Kep",
     *    description="Update Kep Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="source_name",description="Source.Name", type="text", example=""),
     *          @OA\Property(property="pp",description="??.??", type="text", example=""),
     *          @OA\Property(property="nomenclature",description="????????????????????????;", type="text", example=""),
     *          @OA\Property(property="action",description="Action;", type="text", example=""),
     *          @OA\Property(property="date_action",description="0", type="text", example=""),
     *          @OA\Property(property="val",description="0", type="number", example=""),
     *          @OA\Property(property="year",description="2022", type="number", example="0"),
     *          @OA\Property(property="company_id",description="0", type="number", example="17"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="source_name",description="Source.Name", type="text", example=""),
     *          @OA\Property(property="pp",description="??.??", type="text", example=""),
     *          @OA\Property(property="nomenclature",description="????????????????????????;", type="text", example=""),
     *          @OA\Property(property="action",description="Action;", type="text", example=""),
     *          @OA\Property(property="date_action",description="0", type="text", example=""),
     *          @OA\Property(property="val",description="1", type="number", example="0"),
     *          @OA\Property(property="year",description="2022", type="number", example="0"),
     *          @OA\Property(property="company_id",description="0", type="number", example="17"),
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
        $entity = Kep::whereId($request->id)->first();
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
     *     path="/api/data-aggregation-kep/{id}",
     *     tags={"Kep"},
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
        $is_deleted = (bool)Kep::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
