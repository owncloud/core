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

class SustainableSourcing extends \Google\Model
{
  public $ecoFriendlyToiletries;
  public $ecoFriendlyToiletriesException;
  public $locallySourcedFoodAndBeverages;
  public $locallySourcedFoodAndBeveragesException;
  public $organicCageFreeEggs;
  public $organicCageFreeEggsException;
  public $organicFoodAndBeverages;
  public $organicFoodAndBeveragesException;
  public $responsiblePurchasingPolicy;
  public $responsiblePurchasingPolicyException;
  public $responsiblySourcesSeafood;
  public $responsiblySourcesSeafoodException;
  public $veganMeals;
  public $veganMealsException;
  public $vegetarianMeals;
  public $vegetarianMealsException;

  public function setEcoFriendlyToiletries($ecoFriendlyToiletries)
  {
    $this->ecoFriendlyToiletries = $ecoFriendlyToiletries;
  }
  public function getEcoFriendlyToiletries()
  {
    return $this->ecoFriendlyToiletries;
  }
  public function setEcoFriendlyToiletriesException($ecoFriendlyToiletriesException)
  {
    $this->ecoFriendlyToiletriesException = $ecoFriendlyToiletriesException;
  }
  public function getEcoFriendlyToiletriesException()
  {
    return $this->ecoFriendlyToiletriesException;
  }
  public function setLocallySourcedFoodAndBeverages($locallySourcedFoodAndBeverages)
  {
    $this->locallySourcedFoodAndBeverages = $locallySourcedFoodAndBeverages;
  }
  public function getLocallySourcedFoodAndBeverages()
  {
    return $this->locallySourcedFoodAndBeverages;
  }
  public function setLocallySourcedFoodAndBeveragesException($locallySourcedFoodAndBeveragesException)
  {
    $this->locallySourcedFoodAndBeveragesException = $locallySourcedFoodAndBeveragesException;
  }
  public function getLocallySourcedFoodAndBeveragesException()
  {
    return $this->locallySourcedFoodAndBeveragesException;
  }
  public function setOrganicCageFreeEggs($organicCageFreeEggs)
  {
    $this->organicCageFreeEggs = $organicCageFreeEggs;
  }
  public function getOrganicCageFreeEggs()
  {
    return $this->organicCageFreeEggs;
  }
  public function setOrganicCageFreeEggsException($organicCageFreeEggsException)
  {
    $this->organicCageFreeEggsException = $organicCageFreeEggsException;
  }
  public function getOrganicCageFreeEggsException()
  {
    return $this->organicCageFreeEggsException;
  }
  public function setOrganicFoodAndBeverages($organicFoodAndBeverages)
  {
    $this->organicFoodAndBeverages = $organicFoodAndBeverages;
  }
  public function getOrganicFoodAndBeverages()
  {
    return $this->organicFoodAndBeverages;
  }
  public function setOrganicFoodAndBeveragesException($organicFoodAndBeveragesException)
  {
    $this->organicFoodAndBeveragesException = $organicFoodAndBeveragesException;
  }
  public function getOrganicFoodAndBeveragesException()
  {
    return $this->organicFoodAndBeveragesException;
  }
  public function setResponsiblePurchasingPolicy($responsiblePurchasingPolicy)
  {
    $this->responsiblePurchasingPolicy = $responsiblePurchasingPolicy;
  }
  public function getResponsiblePurchasingPolicy()
  {
    return $this->responsiblePurchasingPolicy;
  }
  public function setResponsiblePurchasingPolicyException($responsiblePurchasingPolicyException)
  {
    $this->responsiblePurchasingPolicyException = $responsiblePurchasingPolicyException;
  }
  public function getResponsiblePurchasingPolicyException()
  {
    return $this->responsiblePurchasingPolicyException;
  }
  public function setResponsiblySourcesSeafood($responsiblySourcesSeafood)
  {
    $this->responsiblySourcesSeafood = $responsiblySourcesSeafood;
  }
  public function getResponsiblySourcesSeafood()
  {
    return $this->responsiblySourcesSeafood;
  }
  public function setResponsiblySourcesSeafoodException($responsiblySourcesSeafoodException)
  {
    $this->responsiblySourcesSeafoodException = $responsiblySourcesSeafoodException;
  }
  public function getResponsiblySourcesSeafoodException()
  {
    return $this->responsiblySourcesSeafoodException;
  }
  public function setVeganMeals($veganMeals)
  {
    $this->veganMeals = $veganMeals;
  }
  public function getVeganMeals()
  {
    return $this->veganMeals;
  }
  public function setVeganMealsException($veganMealsException)
  {
    $this->veganMealsException = $veganMealsException;
  }
  public function getVeganMealsException()
  {
    return $this->veganMealsException;
  }
  public function setVegetarianMeals($vegetarianMeals)
  {
    $this->vegetarianMeals = $vegetarianMeals;
  }
  public function getVegetarianMeals()
  {
    return $this->vegetarianMeals;
  }
  public function setVegetarianMealsException($vegetarianMealsException)
  {
    $this->vegetarianMealsException = $vegetarianMealsException;
  }
  public function getVegetarianMealsException()
  {
    return $this->vegetarianMealsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SustainableSourcing::class, 'Google_Service_MyBusinessLodging_SustainableSourcing');
