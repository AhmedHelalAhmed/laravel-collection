<?php

namespace App\Http\Controllers;

use AhmedHelalAhmed\LaravelGreeting\Greeting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * The union method adds the given array to the collection.
 * If the given array contains keys that are already in the original collection,
 * the original collection's values will be preferred:
 * Class MethodUnionController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class MethodUnionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        Greeting::resetLog();
        Greeting::sayAndLog('Merge two arrays into one with the same key name in the two arrays old one will be selected');
        Greeting::sayAndLog('The old value will be the final value');
        Greeting::sayAndLog('Old value override new value');
        Greeting::sayAndLog('New collection will return with two arrays merged this will not modify the original collection');

        $input = [
            'product_id' => 1,
            'price' => 100
        ];

        Greeting::sayAndLog([
            'input' => $input
        ]);

        $collection = collect($input);

        Greeting::sayAndLog([
            'collection' => $collection
        ]);

        $dataToUnion = [
            'price' => 200,
            'discount' => false
        ];

        $union = $collection->union($dataToUnion);

        Greeting::sayAndLog([
            'dataToUnion' => $dataToUnion,
            'union' => $union,
            'output' => $union->all()
        ]);

        Greeting::sayAndLog([
            'input' => $input,
            'collection' => $collection,
            'union' => $union,
            'output' => $union->all(),
            'info' => 'Original collection does not changed but new collection returned'
        ]);

        return view('welcome');
    }
}
