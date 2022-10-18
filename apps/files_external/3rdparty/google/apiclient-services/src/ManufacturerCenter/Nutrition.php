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

namespace Google\Service\ManufacturerCenter;

class Nutrition extends \Google\Collection
{
  protected $collection_key = 'voluntaryNutritionFact';
  protected $addedSugarsType = FloatUnit::class;
  protected $addedSugarsDataType = '';
  public $addedSugarsDailyPercentage;
  protected $calciumType = FloatUnit::class;
  protected $calciumDataType = '';
  public $calciumDailyPercentage;
  protected $cholesterolType = FloatUnit::class;
  protected $cholesterolDataType = '';
  public $cholesterolDailyPercentage;
  protected $dietaryFiberType = FloatUnit::class;
  protected $dietaryFiberDataType = '';
  public $dietaryFiberDailyPercentage;
  protected $energyType = FloatUnit::class;
  protected $energyDataType = '';
  protected $energyFromFatType = FloatUnit::class;
  protected $energyFromFatDataType = '';
  public $folateDailyPercentage;
  protected $folateFolicAcidType = FloatUnit::class;
  protected $folateFolicAcidDataType = '';
  public $folateMcgDfe;
  protected $ironType = FloatUnit::class;
  protected $ironDataType = '';
  public $ironDailyPercentage;
  protected $monounsaturatedFatType = FloatUnit::class;
  protected $monounsaturatedFatDataType = '';
  /**
   * @var string
   */
  public $nutritionFactMeasure;
  protected $polyolsType = FloatUnit::class;
  protected $polyolsDataType = '';
  protected $polyunsaturatedFatType = FloatUnit::class;
  protected $polyunsaturatedFatDataType = '';
  protected $potassiumType = FloatUnit::class;
  protected $potassiumDataType = '';
  public $potassiumDailyPercentage;
  /**
   * @var string
   */
  public $preparedSizeDescription;
  protected $proteinType = FloatUnit::class;
  protected $proteinDataType = '';
  public $proteinDailyPercentage;
  protected $saturatedFatType = FloatUnit::class;
  protected $saturatedFatDataType = '';
  public $saturatedFatDailyPercentage;
  /**
   * @var string
   */
  public $servingSizeDescription;
  protected $servingSizeMeasureType = FloatUnit::class;
  protected $servingSizeMeasureDataType = '';
  /**
   * @var string
   */
  public $servingsPerContainer;
  protected $sodiumType = FloatUnit::class;
  protected $sodiumDataType = '';
  public $sodiumDailyPercentage;
  protected $starchType = FloatUnit::class;
  protected $starchDataType = '';
  protected $totalCarbohydrateType = FloatUnit::class;
  protected $totalCarbohydrateDataType = '';
  public $totalCarbohydrateDailyPercentage;
  protected $totalFatType = FloatUnit::class;
  protected $totalFatDataType = '';
  public $totalFatDailyPercentage;
  protected $totalSugarsType = FloatUnit::class;
  protected $totalSugarsDataType = '';
  public $totalSugarsDailyPercentage;
  protected $transFatType = FloatUnit::class;
  protected $transFatDataType = '';
  public $transFatDailyPercentage;
  protected $vitaminDType = FloatUnit::class;
  protected $vitaminDDataType = '';
  public $vitaminDDailyPercentage;
  protected $voluntaryNutritionFactType = VoluntaryNutritionFact::class;
  protected $voluntaryNutritionFactDataType = 'array';

  /**
   * @param FloatUnit
   */
  public function setAddedSugars(FloatUnit $addedSugars)
  {
    $this->addedSugars = $addedSugars;
  }
  /**
   * @return FloatUnit
   */
  public function getAddedSugars()
  {
    return $this->addedSugars;
  }
  public function setAddedSugarsDailyPercentage($addedSugarsDailyPercentage)
  {
    $this->addedSugarsDailyPercentage = $addedSugarsDailyPercentage;
  }
  public function getAddedSugarsDailyPercentage()
  {
    return $this->addedSugarsDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setCalcium(FloatUnit $calcium)
  {
    $this->calcium = $calcium;
  }
  /**
   * @return FloatUnit
   */
  public function getCalcium()
  {
    return $this->calcium;
  }
  public function setCalciumDailyPercentage($calciumDailyPercentage)
  {
    $this->calciumDailyPercentage = $calciumDailyPercentage;
  }
  public function getCalciumDailyPercentage()
  {
    return $this->calciumDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setCholesterol(FloatUnit $cholesterol)
  {
    $this->cholesterol = $cholesterol;
  }
  /**
   * @return FloatUnit
   */
  public function getCholesterol()
  {
    return $this->cholesterol;
  }
  public function setCholesterolDailyPercentage($cholesterolDailyPercentage)
  {
    $this->cholesterolDailyPercentage = $cholesterolDailyPercentage;
  }
  public function getCholesterolDailyPercentage()
  {
    return $this->cholesterolDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setDietaryFiber(FloatUnit $dietaryFiber)
  {
    $this->dietaryFiber = $dietaryFiber;
  }
  /**
   * @return FloatUnit
   */
  public function getDietaryFiber()
  {
    return $this->dietaryFiber;
  }
  public function setDietaryFiberDailyPercentage($dietaryFiberDailyPercentage)
  {
    $this->dietaryFiberDailyPercentage = $dietaryFiberDailyPercentage;
  }
  public function getDietaryFiberDailyPercentage()
  {
    return $this->dietaryFiberDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setEnergy(FloatUnit $energy)
  {
    $this->energy = $energy;
  }
  /**
   * @return FloatUnit
   */
  public function getEnergy()
  {
    return $this->energy;
  }
  /**
   * @param FloatUnit
   */
  public function setEnergyFromFat(FloatUnit $energyFromFat)
  {
    $this->energyFromFat = $energyFromFat;
  }
  /**
   * @return FloatUnit
   */
  public function getEnergyFromFat()
  {
    return $this->energyFromFat;
  }
  public function setFolateDailyPercentage($folateDailyPercentage)
  {
    $this->folateDailyPercentage = $folateDailyPercentage;
  }
  public function getFolateDailyPercentage()
  {
    return $this->folateDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setFolateFolicAcid(FloatUnit $folateFolicAcid)
  {
    $this->folateFolicAcid = $folateFolicAcid;
  }
  /**
   * @return FloatUnit
   */
  public function getFolateFolicAcid()
  {
    return $this->folateFolicAcid;
  }
  public function setFolateMcgDfe($folateMcgDfe)
  {
    $this->folateMcgDfe = $folateMcgDfe;
  }
  public function getFolateMcgDfe()
  {
    return $this->folateMcgDfe;
  }
  /**
   * @param FloatUnit
   */
  public function setIron(FloatUnit $iron)
  {
    $this->iron = $iron;
  }
  /**
   * @return FloatUnit
   */
  public function getIron()
  {
    return $this->iron;
  }
  public function setIronDailyPercentage($ironDailyPercentage)
  {
    $this->ironDailyPercentage = $ironDailyPercentage;
  }
  public function getIronDailyPercentage()
  {
    return $this->ironDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setMonounsaturatedFat(FloatUnit $monounsaturatedFat)
  {
    $this->monounsaturatedFat = $monounsaturatedFat;
  }
  /**
   * @return FloatUnit
   */
  public function getMonounsaturatedFat()
  {
    return $this->monounsaturatedFat;
  }
  /**
   * @param string
   */
  public function setNutritionFactMeasure($nutritionFactMeasure)
  {
    $this->nutritionFactMeasure = $nutritionFactMeasure;
  }
  /**
   * @return string
   */
  public function getNutritionFactMeasure()
  {
    return $this->nutritionFactMeasure;
  }
  /**
   * @param FloatUnit
   */
  public function setPolyols(FloatUnit $polyols)
  {
    $this->polyols = $polyols;
  }
  /**
   * @return FloatUnit
   */
  public function getPolyols()
  {
    return $this->polyols;
  }
  /**
   * @param FloatUnit
   */
  public function setPolyunsaturatedFat(FloatUnit $polyunsaturatedFat)
  {
    $this->polyunsaturatedFat = $polyunsaturatedFat;
  }
  /**
   * @return FloatUnit
   */
  public function getPolyunsaturatedFat()
  {
    return $this->polyunsaturatedFat;
  }
  /**
   * @param FloatUnit
   */
  public function setPotassium(FloatUnit $potassium)
  {
    $this->potassium = $potassium;
  }
  /**
   * @return FloatUnit
   */
  public function getPotassium()
  {
    return $this->potassium;
  }
  public function setPotassiumDailyPercentage($potassiumDailyPercentage)
  {
    $this->potassiumDailyPercentage = $potassiumDailyPercentage;
  }
  public function getPotassiumDailyPercentage()
  {
    return $this->potassiumDailyPercentage;
  }
  /**
   * @param string
   */
  public function setPreparedSizeDescription($preparedSizeDescription)
  {
    $this->preparedSizeDescription = $preparedSizeDescription;
  }
  /**
   * @return string
   */
  public function getPreparedSizeDescription()
  {
    return $this->preparedSizeDescription;
  }
  /**
   * @param FloatUnit
   */
  public function setProtein(FloatUnit $protein)
  {
    $this->protein = $protein;
  }
  /**
   * @return FloatUnit
   */
  public function getProtein()
  {
    return $this->protein;
  }
  public function setProteinDailyPercentage($proteinDailyPercentage)
  {
    $this->proteinDailyPercentage = $proteinDailyPercentage;
  }
  public function getProteinDailyPercentage()
  {
    return $this->proteinDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setSaturatedFat(FloatUnit $saturatedFat)
  {
    $this->saturatedFat = $saturatedFat;
  }
  /**
   * @return FloatUnit
   */
  public function getSaturatedFat()
  {
    return $this->saturatedFat;
  }
  public function setSaturatedFatDailyPercentage($saturatedFatDailyPercentage)
  {
    $this->saturatedFatDailyPercentage = $saturatedFatDailyPercentage;
  }
  public function getSaturatedFatDailyPercentage()
  {
    return $this->saturatedFatDailyPercentage;
  }
  /**
   * @param string
   */
  public function setServingSizeDescription($servingSizeDescription)
  {
    $this->servingSizeDescription = $servingSizeDescription;
  }
  /**
   * @return string
   */
  public function getServingSizeDescription()
  {
    return $this->servingSizeDescription;
  }
  /**
   * @param FloatUnit
   */
  public function setServingSizeMeasure(FloatUnit $servingSizeMeasure)
  {
    $this->servingSizeMeasure = $servingSizeMeasure;
  }
  /**
   * @return FloatUnit
   */
  public function getServingSizeMeasure()
  {
    return $this->servingSizeMeasure;
  }
  /**
   * @param string
   */
  public function setServingsPerContainer($servingsPerContainer)
  {
    $this->servingsPerContainer = $servingsPerContainer;
  }
  /**
   * @return string
   */
  public function getServingsPerContainer()
  {
    return $this->servingsPerContainer;
  }
  /**
   * @param FloatUnit
   */
  public function setSodium(FloatUnit $sodium)
  {
    $this->sodium = $sodium;
  }
  /**
   * @return FloatUnit
   */
  public function getSodium()
  {
    return $this->sodium;
  }
  public function setSodiumDailyPercentage($sodiumDailyPercentage)
  {
    $this->sodiumDailyPercentage = $sodiumDailyPercentage;
  }
  public function getSodiumDailyPercentage()
  {
    return $this->sodiumDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setStarch(FloatUnit $starch)
  {
    $this->starch = $starch;
  }
  /**
   * @return FloatUnit
   */
  public function getStarch()
  {
    return $this->starch;
  }
  /**
   * @param FloatUnit
   */
  public function setTotalCarbohydrate(FloatUnit $totalCarbohydrate)
  {
    $this->totalCarbohydrate = $totalCarbohydrate;
  }
  /**
   * @return FloatUnit
   */
  public function getTotalCarbohydrate()
  {
    return $this->totalCarbohydrate;
  }
  public function setTotalCarbohydrateDailyPercentage($totalCarbohydrateDailyPercentage)
  {
    $this->totalCarbohydrateDailyPercentage = $totalCarbohydrateDailyPercentage;
  }
  public function getTotalCarbohydrateDailyPercentage()
  {
    return $this->totalCarbohydrateDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setTotalFat(FloatUnit $totalFat)
  {
    $this->totalFat = $totalFat;
  }
  /**
   * @return FloatUnit
   */
  public function getTotalFat()
  {
    return $this->totalFat;
  }
  public function setTotalFatDailyPercentage($totalFatDailyPercentage)
  {
    $this->totalFatDailyPercentage = $totalFatDailyPercentage;
  }
  public function getTotalFatDailyPercentage()
  {
    return $this->totalFatDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setTotalSugars(FloatUnit $totalSugars)
  {
    $this->totalSugars = $totalSugars;
  }
  /**
   * @return FloatUnit
   */
  public function getTotalSugars()
  {
    return $this->totalSugars;
  }
  public function setTotalSugarsDailyPercentage($totalSugarsDailyPercentage)
  {
    $this->totalSugarsDailyPercentage = $totalSugarsDailyPercentage;
  }
  public function getTotalSugarsDailyPercentage()
  {
    return $this->totalSugarsDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setTransFat(FloatUnit $transFat)
  {
    $this->transFat = $transFat;
  }
  /**
   * @return FloatUnit
   */
  public function getTransFat()
  {
    return $this->transFat;
  }
  public function setTransFatDailyPercentage($transFatDailyPercentage)
  {
    $this->transFatDailyPercentage = $transFatDailyPercentage;
  }
  public function getTransFatDailyPercentage()
  {
    return $this->transFatDailyPercentage;
  }
  /**
   * @param FloatUnit
   */
  public function setVitaminD(FloatUnit $vitaminD)
  {
    $this->vitaminD = $vitaminD;
  }
  /**
   * @return FloatUnit
   */
  public function getVitaminD()
  {
    return $this->vitaminD;
  }
  public function setVitaminDDailyPercentage($vitaminDDailyPercentage)
  {
    $this->vitaminDDailyPercentage = $vitaminDDailyPercentage;
  }
  public function getVitaminDDailyPercentage()
  {
    return $this->vitaminDDailyPercentage;
  }
  /**
   * @param VoluntaryNutritionFact[]
   */
  public function setVoluntaryNutritionFact($voluntaryNutritionFact)
  {
    $this->voluntaryNutritionFact = $voluntaryNutritionFact;
  }
  /**
   * @return VoluntaryNutritionFact[]
   */
  public function getVoluntaryNutritionFact()
  {
    return $this->voluntaryNutritionFact;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Nutrition::class, 'Google_Service_ManufacturerCenter_Nutrition');
