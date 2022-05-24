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
  /**
   * @var bool
   */
  public $diningAreasAdditionalSanitation;
  /**
   * @var string
   */
  public $diningAreasAdditionalSanitationException;
  /**
   * @var bool
   */
  public $disposableFlatware;
  /**
   * @var string
   */
  public $disposableFlatwareException;
  /**
   * @var bool
   */
  public $foodPreparationAndServingAdditionalSafety;
  /**
   * @var string
   */
  public $foodPreparationAndServingAdditionalSafetyException;
  /**
   * @var bool
   */
  public $individualPackagedMeals;
  /**
   * @var string
   */
  public $individualPackagedMealsException;
  /**
   * @var bool
   */
  public $singleUseFoodMenus;
  /**
   * @var string
   */
  public $singleUseFoodMenusException;

  /**
   * @param bool
   */
  public function setDiningAreasAdditionalSanitation($diningAreasAdditionalSanitation)
  {
    $this->diningAreasAdditionalSanitation = $diningAreasAdditionalSanitation;
  }
  /**
   * @return bool
   */
  public function getDiningAreasAdditionalSanitation()
  {
    return $this->diningAreasAdditionalSanitation;
  }
  /**
   * @param string
   */
  public function setDiningAreasAdditionalSanitationException($diningAreasAdditionalSanitationException)
  {
    $this->diningAreasAdditionalSanitationException = $diningAreasAdditionalSanitationException;
  }
  /**
   * @return string
   */
  public function getDiningAreasAdditionalSanitationException()
  {
    return $this->diningAreasAdditionalSanitationException;
  }
  /**
   * @param bool
   */
  public function setDisposableFlatware($disposableFlatware)
  {
    $this->disposableFlatware = $disposableFlatware;
  }
  /**
   * @return bool
   */
  public function getDisposableFlatware()
  {
    return $this->disposableFlatware;
  }
  /**
   * @param string
   */
  public function setDisposableFlatwareException($disposableFlatwareException)
  {
    $this->disposableFlatwareException = $disposableFlatwareException;
  }
  /**
   * @return string
   */
  public function getDisposableFlatwareException()
  {
    return $this->disposableFlatwareException;
  }
  /**
   * @param bool
   */
  public function setFoodPreparationAndServingAdditionalSafety($foodPreparationAndServingAdditionalSafety)
  {
    $this->foodPreparationAndServingAdditionalSafety = $foodPreparationAndServingAdditionalSafety;
  }
  /**
   * @return bool
   */
  public function getFoodPreparationAndServingAdditionalSafety()
  {
    return $this->foodPreparationAndServingAdditionalSafety;
  }
  /**
   * @param string
   */
  public function setFoodPreparationAndServingAdditionalSafetyException($foodPreparationAndServingAdditionalSafetyException)
  {
    $this->foodPreparationAndServingAdditionalSafetyException = $foodPreparationAndServingAdditionalSafetyException;
  }
  /**
   * @return string
   */
  public function getFoodPreparationAndServingAdditionalSafetyException()
  {
    return $this->foodPreparationAndServingAdditionalSafetyException;
  }
  /**
   * @param bool
   */
  public function setIndividualPackagedMeals($individualPackagedMeals)
  {
    $this->individualPackagedMeals = $individualPackagedMeals;
  }
  /**
   * @return bool
   */
  public function getIndividualPackagedMeals()
  {
    return $this->individualPackagedMeals;
  }
  /**
   * @param string
   */
  public function setIndividualPackagedMealsException($individualPackagedMealsException)
  {
    $this->individualPackagedMealsException = $individualPackagedMealsException;
  }
  /**
   * @return string
   */
  public function getIndividualPackagedMealsException()
  {
    return $this->individualPackagedMealsException;
  }
  /**
   * @param bool
   */
  public function setSingleUseFoodMenus($singleUseFoodMenus)
  {
    $this->singleUseFoodMenus = $singleUseFoodMenus;
  }
  /**
   * @return bool
   */
  public function getSingleUseFoodMenus()
  {
    return $this->singleUseFoodMenus;
  }
  /**
   * @param string
   */
  public function setSingleUseFoodMenusException($singleUseFoodMenusException)
  {
    $this->singleUseFoodMenusException = $singleUseFoodMenusException;
  }
  /**
   * @return string
   */
  public function getSingleUseFoodMenusException()
  {
    return $this->singleUseFoodMenusException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IncreasedFoodSafety::class, 'Google_Service_MyBusinessLodging_IncreasedFoodSafety');
