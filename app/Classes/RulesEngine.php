<?php

namespace App\Classes;

class RulesEngine{
    public function runRules(Person $person, Product $product, Array $rules){
        //States that Disqualified a person to obtain this product
        if(!empty($rules['disqualified_states']) && in_array($person->getState(), $rules['disqualified_states'])){
            $product->setDisqualified(true);
        }
        //credit_score_modifier
        if(!empty($rules['credit_score_modifier'])){
            //Get Credit Score < to reduce the interest rate
            $reduceCreditScore = $rules['credit_score_modifier']['reduce'] ?? false;
            if($reduceCreditScore && $person->getCreditScore() >= $reduceCreditScore['credit_score']){
                $product->reduceInterestRate($reduceCreditScore['rate']);
            }
            //Get Credit Score > to increment the interest rate
            $incrementCreditScore = $rules['credit_score_modifier']['incremet'] ?? false;
            if ($incrementCreditScore && $person->getCreditScore() < $incrementCreditScore['credit_score']) {
                $product->incrementInterestRate($reduceCreditScore['rate']);
            }
        }
        //product_modifier
        if (!empty($rules['products_modifier'])) {
            //Get Product Name that reduce the interest rate if it exists
            $reduceRateByProductName = $rules['products_modifier']['reduce'] ?? false;
            if($reduceRateByProductName){
                if(array_key_exists($product->getName(), $reduceRateByProductName)){
                    $product->reduceInterestRate($reduceRateByProductName[$product->getName()]);
                }
            }

            //Get Product Name that increment the interest rate if it exists
            $incrementByProductName = $rules['products_modifier']['incremet'] ?? false;
            if ($incrementByProductName) {
                if (array_key_exists($product->getName(), $incrementByProductName)) {
                    $product->incrementInterestRate($incrementByProductName[$product->getName()]);
                }
            }
        }
        //Return an Array with the new interest rate and if the product Qualified for this person
        return
        [
            'interest_rate' => $product->getInterestRate(),
            'disqualified' => $product->getDisqualified()
        ];
    }

}
