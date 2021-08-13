<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Product;
use App\Classes\Person;
use App\Classes\RulesEngine;
use Illuminate\Support\Facades\Validator;

class ProductRunRuleController extends Controller
{
    public function postProductRunRule(Request $request){
        // Get Data Person and Product Info
        $data = json_decode($request->getContent(), true);
        if(empty($data['person']) || empty($data['product'])){
            return response('Required params not available', 400)
                  ->header('Content-Type', 'text/plain');
        }

        $validator = Validator::make($data['person'], [
            'name' => 'required|max:255',
            'credit_score' => 'required|integer|min:300|max:850',
            'state' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response('Wrong Person data was sent', 400)
                ->header('Content-Type', 'text/plain');
        }

        $validator = Validator::make($data['product'], [
            'name' => 'required|max:255',
            'interest_rate' => 'required|numeric|between:0,99.99'
        ]);

        if ($validator->fails()) {
            return response('Wrong Product data was sent', 400)
            ->header('Content-Type', 'text/plain');
        }

        $person = new Person($data['person']['name'], $data['person']['credit_score'], $data['person']['state']);
        $product = new Product($data['product']['name'], $data['product']['interest_rate']);
        //Get Json file Rules
        $path = storage_path() . "/app/json/rules.json";
        $rules = json_decode(file_get_contents($path), true);
        //Run Rules
        $rules_engine = new RulesEngine();
        $result = $rules_engine->runRules($person, $product, $rules);
        return response()->json($result);
    }
}
