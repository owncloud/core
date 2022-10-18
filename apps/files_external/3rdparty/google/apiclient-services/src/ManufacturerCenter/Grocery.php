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

class Grocery extends \Google\Collection
{
  protected $collection_key = 'nutritionClaim';
  /**
   * @var string
   */
  public $activeIngredients;
  public $alcoholByVolume;
  /**
   * @var string
   */
  public $allergens;
  /**
   * @var string[]
   */
  public $derivedNutritionClaim;
  /**
   * @var string
   */
  public $directions;
  /**
   * @var string
   */
  public $indications;
  /**
   * @var string
   */
  public $ingredients;
  /**
   * @var string[]
   */
  public $nutritionClaim;
  /**
   * @var string
   */
  public $storageInstructions;

  /**
   * @param string
   */
  public function setActiveIngredients($activeIngredients)
  {
    $this->activeIngredients = $activeIngredients;
  }
  /**
   * @return string
   */
  public function getActiveIngredients()
  {
    return $this->activeIngredients;
  }
  public function setAlcoholByVolume($alcoholByVolume)
  {
    $this->alcoholByVolume = $alcoholByVolume;
  }
  public function getAlcoholByVolume()
  {
    return $this->alcoholByVolume;
  }
  /**
   * @param string
   */
  public function setAllergens($allergens)
  {
    $this->allergens = $allergens;
  }
  /**
   * @return string
   */
  public function getAllergens()
  {
    return $this->allergens;
  }
  /**
   * @param string[]
   */
  public function setDerivedNutritionClaim($derivedNutritionClaim)
  {
    $this->derivedNutritionClaim = $derivedNutritionClaim;
  }
  /**
   * @return string[]
   */
  public function getDerivedNutritionClaim()
  {
    return $this->derivedNutritionClaim;
  }
  /**
   * @param string
   */
  public function setDirections($directions)
  {
    $this->directions = $directions;
  }
  /**
   * @return string
   */
  public function getDirections()
  {
    return $this->directions;
  }
  /**
   * @param string
   */
  public function setIndications($indications)
  {
    $this->indications = $indications;
  }
  /**
   * @return string
   */
  public function getIndications()
  {
    return $this->indications;
  }
  /**
   * @param string
   */
  public function setIngredients($ingredients)
  {
    $this->ingredients = $ingredients;
  }
  /**
   * @return string
   */
  public function getIngredients()
  {
    return $this->ingredients;
  }
  /**
   * @param string[]
   */
  public function setNutritionClaim($nutritionClaim)
  {
    $this->nutritionClaim = $nutritionClaim;
  }
  /**
   * @return string[]
   */
  public function getNutritionClaim()
  {
    return $this->nutritionClaim;
  }
  /**
   * @param string
   */
  public function setStorageInstructions($storageInstructions)
  {
    $this->storageInstructions = $storageInstructions;
  }
  /**
   * @return string
   */
  public function getStorageInstructions()
  {
    return $this->storageInstructions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Grocery::class, 'Google_Service_ManufacturerCenter_Grocery');
