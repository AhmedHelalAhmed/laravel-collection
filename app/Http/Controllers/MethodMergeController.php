<?php

namespace App\Http\Controllers;

use AhmedHelalAhmed\LaravelGreeting\Greeting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * The merge method merges the given array or collection with the original collection.
 * If a string key in the given items matches a string key in the original collection,
 * the given items's value will overwrite the value in the original collection
 *
 *
 * If the given items's keys are numeric,
 * the values will be appended to the end of the collection:
 *
 * Class MethodMergeController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class MethodMergeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        Greeting::resetLog();
        Greeting::sayAndLog('===== cast1 =====');
        Greeting::sayAndLog('Merge two arrays into one with the same key name in the two arrays example price');
        Greeting::sayAndLog('The new value will be the final value');
        Greeting::sayAndLog('New value override old value');
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

        $dataToMerge = [
            'price' => 200,
            'discount' => false
        ];

        $merged = $collection->merge($dataToMerge);

        Greeting::sayAndLog([
            'dataToMerge' => $dataToMerge,
            'merged' => $merged,
            'output' => $merged->all()
        ]);

        Greeting::sayAndLog([
            'input' => $input,
            'collection' => $collection,
            'merged' => $merged,
            'output' => $merged->all(),
            'info' => 'Original collection does not changed but new collection returned'
        ]);

        Greeting::sayAndLog('===== cast2 =====');
        Greeting::sayAndLog('Merge two arrays into one with the number key');
        Greeting::sayAndLog('The values will be appended to the end of the collection');

        $input = ['Desk', 'Chair'];

        Greeting::sayAndLog([
            'input' => $input
        ]);

        $collection = collect($input);

        Greeting::sayAndLog([
            'collection' => $collection
        ]);

        $dataToMerge = ['Bookcase', 'Door'];

        $merged = $collection->merge($dataToMerge);

        Greeting::sayAndLog([
            'dataToMerge' => $dataToMerge,
            'merged' => $merged,
            'output' => $merged->all()
        ]);

        Greeting::sayAndLog([
            'input' => $input,
            'collection' => $collection,
            'merged' => $merged,
            'output' => $merged->all(),
            'info' => 'Original collection does not changed but new collection returned with all values'
        ]);


        return view('welcome');
    }
}
