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

namespace Google\Service\MyBusinessLodging;

class IncreasedFoodSafety extends \Google\Model
{
  public $diningAreasAdditionalSanitation;
  public $diningAreasAdditionalSanitationException;
  public $disposableFlatware;
  public $disposableFlatwareException;
  public $foodPreparationAndServingAdditionalSafety;
  public $foodPreparationAndServingAdditionalSafetyException;
  public $individualPackagedMeals;
  public $individualPackagedMealsException;
  public $singleUseFoodMenus;
  public $singleUseFoodMenusException;

  public function setDiningAreasAdditionalSanitation($diningAreasAdditionalSanitation)
  {
    $this->diningAreasAdditionalSanitation = $diningAreasAdditionalSanitation;
  }
  public function getDiningAreasAdditionalSanitation()
  {
    return $this->diningAreasAdditionalSanitation;
  }
  public function setDiningAreasAdditionalSanitationException($diningAreasAdditionalSanitationException)
  {
    $this->diningAreasAdditionalSanitationException = $diningAreasAdditionalSanitationException;
  }
  public function getDiningAreasAdditionalSanitationException()
  {
    return $this->diningAreasAdditionalSanitationException;
  }
  public function setDisposableFlatware($disposableFlatware)
  {
    $this->disposableFlatware = $disposableFlatware;
  }
  public function getDisposableFlatware()
  {
    return $this->disposableFlatware;
  }
  public function setDisposableFlatwareException($disposableFlatwareException)
  {
    $this->disposableFlatwareException = $disposableFlatwareException;
  }
  public function getDisposableFlatwareException()
  {
    return $this->disposableFlatwareException;
  }
  public function setFoodPreparationAndServingAdditionalSafety($foodPreparationAndServingAdditionalSafety)
  {
    $this->foodPreparationAndServingAdditionalSafety = $foodPreparationAndServingAdditionalSafety;
  }
  public function getFoodPreparationAndServingAdditionalSafety()
  {
    return $this->foodPreparationAndServingAdditionalSafety;
  }
  public function setFoodPreparationAndServingAdditionalSafetyException($foodPreparationAndServingAdditionalSafetyException)
  {
    $this->foodPreparationAndServingAdditionalSafetyException = $foodPreparationAndServingAdditionalSafetyException;
  }
  public function getFoodPreparationAndServingAdditionalSafetyException()
  {
    return $this->foodPreparationAndServingAdditionalSafetyException;
  }
  public function setIndividualPackagedMeals($individualPackagedMeals)
  {
    $this->individualPackagedMeals = $individualPackagedMeals;
  }
  public function getIndividualPackagedMeals()
  {
    return $this->individualPackagedMeals;
  }
  public function setIndividualPackagedMealsException($individualPackagedMealsException)
  {
    $this->individualPackagedMealsException = $individualPackagedMealsException;
  }
  public function getIndividualPackagedMealsException()
  {
    return $this->individualPackagedMealsException;
  }
  public function setSingleUseFoodMenus($singleUseFoodMenus)
  {
    $this->singleUseFoodMenus = $singleUseFoodMenus;
  }
  public function getSingleUseFoodMenus()
  {
    return $this->singleUseFoodMenus;
  }
  public function setSingleUseFoodMenusException($singleUseFoodMenusException)
  {
    $this->singleUseFoodMenusException = $singleUseFoodMenusException;
  }
  public function getSingleUseFoodMenusException()
  {
    return $this->singleUseFoodMenusException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IncreasedFoodSafety::class, 'Google_Service_MyBusinessLodging_IncreasedFoodSafety');
