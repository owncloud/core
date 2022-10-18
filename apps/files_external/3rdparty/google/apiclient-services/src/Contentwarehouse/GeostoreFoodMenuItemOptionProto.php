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

class GeostoreFoodMenuItemOptionProto extends \Google\Collection
{
  protected $collection_key = 'restriction';
  /**
   * @var string[]
   */
  public $allergenAbsent;
  /**
   * @var string[]
   */
  public $allergenPresent;
  /**
   * @var int
   */
  public $calories;
  protected $ingredientsType = GeostoreFoodMenuItemOptionProtoIngredient::class;
  protected $ingredientsDataType = 'array';
  protected $mediaType = GeostoreMediaItemProto::class;
  protected $mediaDataType = 'array';
  protected $nameInfoType = GeostorePriceListNameInfoProto::class;
  protected $nameInfoDataType = 'array';
  protected $nutritionFactsType = GeostorePriceInfoFoodNutritionFacts::class;
  protected $nutritionFactsDataType = '';
  protected $portionSizeType = GeostoreFoodMenuItemOptionProtoPortionSize::class;
  protected $portionSizeDataType = '';
  /**
   * @var string[]
   */
  public $preparationMethods;
  protected $priceType = GeostorePriceRangeProto::class;
  protected $priceDataType = '';
  /**
   * @var string[]
   */
  public $restriction;
  /**
   * @var int
   */
  public $servesNumPeople;
  /**
   * @var string
   */
  public $spiciness;

  /**
   * @param string[]
   */
  public function setAllergenAbsent($allergenAbsent)
  {
    $this->allergenAbsent = $allergenAbsent;
  }
  /**
   * @return string[]
   */
  public function getAllergenAbsent()
  {
    return $this->allergenAbsent;
  }
  /**
   * @param string[]
   */
  public function setAllergenPresent($allergenPresent)
  {
    $this->allergenPresent = $allergenPresent;
  }
  /**
   * @return string[]
   */
  public function getAllergenPresent()
  {
    return $this->allergenPresent;
  }
  /**
   * @param int
   */
  public function setCalories($calories)
  {
    $this->calories = $calories;
  }
  /**
   * @return int
   */
  public function getCalories()
  {
    return $this->calories;
  }
  /**
   * @param GeostoreFoodMenuItemOptionProtoIngredient[]
   */
  public function setIngredients($ingredients)
  {
    $this->ingredients = $ingredients;
  }
  /**
   * @return GeostoreFoodMenuItemOptionProtoIngredient[]
   */
  public function getIngredients()
  {
    return $this->ingredients;
  }
  /**
   * @param GeostoreMediaItemProto[]
   */
  public function setMedia($media)
  {
    $this->media = $media;
  }
  /**
   * @return GeostoreMediaItemProto[]
   */
  public function getMedia()
  {
    return $this->media;
  }
  /**
   * @param GeostorePriceListNameInfoProto[]
   */
  public function setNameInfo($nameInfo)
  {
    $this->nameInfo = $nameInfo;
  }
  /**
   * @return GeostorePriceListNameInfoProto[]
   */
  public function getNameInfo()
  {
    return $this->nameInfo;
  }
  /**
   * @param GeostorePriceInfoFoodNutritionFacts
   */
  public function setNutritionFacts(GeostorePriceInfoFoodNutritionFacts $nutritionFacts)
  {
    $this->nutritionFacts = $nutritionFacts;
  }
  /**
   * @return GeostorePriceInfoFoodNutritionFacts
   */
  public function getNutritionFacts()
  {
    return $this->nutritionFacts;
  }
  /**
   * @param GeostoreFoodMenuItemOptionProtoPortionSize
   */
  public function setPortionSize(GeostoreFoodMenuItemOptionProtoPortionSize $portionSize)
  {
    $this->portionSize = $portionSize;
  }
  /**
   * @return GeostoreFoodMenuItemOptionProtoPortionSize
   */
  public function getPortionSize()
  {
    return $this->portionSize;
  }
  /**
   * @param string[]
   */
  public function setPreparationMethods($preparationMethods)
  {
    $this->preparationMethods = $preparationMethods;
  }
  /**
   * @return string[]
   */
  public function getPreparationMethods()
  {
    return $this->preparationMethods;
  }
  /**
   * @param GeostorePriceRangeProto
   */
  public function setPrice(GeostorePriceRangeProto $price)
  {
    $this->price = $price;
  }
  /**
   * @return GeostorePriceRangeProto
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string[]
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return string[]
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param int
   */
  public function setServesNumPeople($servesNumPeople)
  {
    $this->servesNumPeople = $servesNumPeople;
  }
  /**
   * @return int
   */
  public function getServesNumPeople()
  {
    return $this->servesNumPeople;
  }
  /**
   * @param string
   */
  public function setSpiciness($spiciness)
  {
    $this->spiciness = $spiciness;
  }
  /**
   * @return string
   */
  public function getSpiciness()
  {
    return $this->spiciness;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFoodMenuItemOptionProto::class, 'Google_Service_Contentwarehouse_GeostoreFoodMenuItemOptionProto');
