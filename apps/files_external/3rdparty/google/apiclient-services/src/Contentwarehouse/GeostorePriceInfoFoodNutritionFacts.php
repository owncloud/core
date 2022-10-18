<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class GeostorePriceInfoFoodNutritionFacts extends \Google\Model
{
  protected $caloriesType = GeostorePriceInfoFoodNutritionFactsCaloriesFact::class;
  protected $caloriesDataType = '';
  protected $cholesterolType = GeostorePriceInfoFoodNutritionFactsNutritionFact::class;
  protected $cholesterolDataType = '';
  protected $proteinType = GeostorePriceInfoFoodNutritionFactsNutritionFact::class;
  protected $proteinDataType = '';
  protected $sodiumType = GeostorePriceInfoFoodNutritionFactsNutritionFact::class;
  protected $sodiumDataType = '';
  protected $totalCarbohydrateType = GeostorePriceInfoFoodNutritionFactsNutritionFact::class;
  protected $totalCarbohydrateDataType = '';
  protected $totalFatType = GeostorePriceInfoFoodNutritionFactsNutritionFact::class;
  protected $totalFatDataType = '';

  /**
   * @param GeostorePriceInfoFoodNutritionFactsCaloriesFact
   */
  public function setCalories(GeostorePriceInfoFoodNutritionFactsCaloriesFact $calories)
  {
    $this->calories = $calories;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsCaloriesFact
   */
  public function getCalories()
  {
    return $this->calories;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function setCholesterol(GeostorePriceInfoFoodNutritionFactsNutritionFact $cholesterol)
  {
    $this->cholesterol = $cholesterol;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function getCholesterol()
  {
    return $this->cholesterol;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function setProtein(GeostorePriceInfoFoodNutritionFactsNutritionFact $protein)
  {
    $this->protein = $protein;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function getProtein()
  {
    return $this->protein;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function setSodium(GeostorePriceInfoFoodNutritionFactsNutritionFact $sodium)
  {
    $this->sodium = $sodium;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function getSodium()
  {
    return $this->sodium;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function setTotalCarbohydrate(GeostorePriceInfoFoodNutritionFactsNutritionFact $totalCarbohydrate)
  {
    $this->totalCarbohydrate = $totalCarbohydrate;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function getTotalCarbohydrate()
  {
    return $this->totalCarbohydrate;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function setTotalFat(GeostorePriceInfoFoodNutritionFactsNutritionFact $totalFat)
  {
    $this->totalFat = $totalFat;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFactsNutritionFact
   */
  public function getTotalFat()
  {
    return $this->totalFat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePriceInfoFoodNutritionFacts::class, 'Google_Service_Contentwarehouse_GeostorePriceInfoFoodNutritionFacts');
