<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//reg_routes(
//    'samples',
//    \App\Http\Controllers\Api\SampleController::class,
//    $router,
//    [],
//    [],
//    [
//        ['method' => 'get', 'uri' => 'ready-to-qc'],
//        ['method' => 'get', 'uri' => 'validate-barcode','pathParams'=>['barcode']],
//        ['method' => 'post', 'uri' => 'search'],
//        ['method' => 'get', 'uri' => 'field-rules'],
//        ['method' => 'post', 'uri' => 'registration'],
//    ]
//);

$router->get('/', function () use ($router) {
    abort(404);
});



reg_routes('data-aggregation-contract-and-fact', \App\Http\Controllers\Api\ContractAndFactController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['company_name']],
    ]
);


reg_routes('data-aggregation-operational-plan', \App\Http\Controllers\Api\OperationalPlanController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['company_name']],
    ]
);

reg_routes('data-aggregation-financial-indicators', \App\Http\Controllers\Api\FinancialIndicatorsController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
    ]
);


reg_routes('data-aggregation-budget', \App\Http\Controllers\Api\BudgetController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
    ]
);


reg_routes('data-aggregation-defect', \App\Http\Controllers\Api\DefectController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['name']],
        ['method' => 'get', 'uri' => 'group-by-name', 'pathParams'=>['name']],
    ]
);


reg_routes('data-aggregation-plan-contract', \App\Http\Controllers\Api\PlanContractController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['company_name']],
        ['method' => 'get', 'uri' => 'get-group'],
    ]
);


reg_routes('data-aggregation-expected-revenue', \App\Http\Controllers\Api\ExpectedRevenueController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['company_name']],
        ['method' => 'get', 'uri' => 'get-group'],
    ]
);

reg_routes('data-aggregation-forecast', \App\Http\Controllers\Api\ForecastController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
        ['method' => 'get', 'uri' => 'get-by-name', 'pathParams'=>['company_name']],
        ['method' => 'get', 'uri' => 'get-group'],
    ]
);


reg_routes('data-aggregation-kep', \App\Http\Controllers\Api\KepController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
    ]
);


reg_routes('data-aggregation-kep-plan', \App\Http\Controllers\Api\KepPlanController::class,
    $router,
    [],
    [],
    [
        ['method' => 'get', 'uri' => 'get-by-id', 'pathParams'=>['id']],
    ]
);


function reg_routes($name, $controllerName, $router, $only = [], $except = [], $customUses = [])
{

    $router->group([
        'prefix' => "/$name",
        'as' => $name,
    ], function () use ($router, $controllerName, $only, $except, $customUses) {

        foreach ($customUses as $item) {

            $customMethod = $item['method'];
            $customUri = $item['uri'];
            $patParamsUri = '';
            if (isset($item['pathParams']) && is_array($item['pathParams'])) {
                foreach ($item['pathParams'] as $pathParamsItem) {
                    $patParamsUri .= '/{' . $pathParamsItem . '}';
                }
            }
            $action = '';
            $routName = '';

            foreach (explode('-', $customUri) as $keyUriItem => $uriItem) {
                if ($keyUriItem === 0) {
                    $action .= strtolower($uriItem);
                    $routName .= strtolower($uriItem);
                } else {
                    $action .= ucfirst(strtolower($uriItem));
                    $routName .= '_' . strtolower($uriItem);
                }

            }
            $router->$customMethod("/$customUri$patParamsUri", [
                'as' => $routName,
                'uses' => "$controllerName@$action"
            ]);
        }

        if (only_or_except($only, $except, 'index')) {
            $router->get('/', [
                'as' => 'index',
                'uses' => "$controllerName@index"
            ]);
        }
        if (only_or_except($only, $except, 'store')) {
            $router->post('/', [
                'as' => 'store',
                'uses' => "$controllerName@store"
            ]);
        }
        if (only_or_except($only, $except, 'show')) {
            $router->get("/{id}", [
                'as' => 'show',
                'uses' => "$controllerName@show"
            ]);
        }
        if (only_or_except($only, $except, 'update')) {
            $router->put("/{id}", [
                'as' => 'update',
                'uses' => "$controllerName@update"
            ]);
        }
        if (only_or_except($only, $except, 'update')) {
            $router->patch("/{id}", [
                'as' => 'update',
                'uses' => "$controllerName@update"
            ]);
        }
        if (only_or_except($only, $except, 'destroy')) {
            $router->delete("/{id}", [
                'as' => 'destroy',
                'uses' => "$controllerName@destroy"
            ]);
        }


    });

}
