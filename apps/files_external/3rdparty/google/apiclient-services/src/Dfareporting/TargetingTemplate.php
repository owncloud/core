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

namespace Google\Service\Dfareporting;

class TargetingTemplate extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  protected $dayPartTargetingType = DayPartTargeting::class;
  protected $dayPartTargetingDataType = '';
  protected $geoTargetingType = GeoTargeting::class;
  protected $geoTargetingDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $keyValueTargetingExpressionType = KeyValueTargetingExpression::class;
  protected $keyValueTargetingExpressionDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $languageTargetingType = LanguageTargeting::class;
  protected $languageTargetingDataType = '';
  protected $listTargetingExpressionType = ListTargetingExpression::class;
  protected $listTargetingExpressionDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $subaccountId;
  protected $technologyTargetingType = TechnologyTargeting::class;
  protected $technologyTargetingDataType = '';

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param DimensionValue
   */
  public function setAdvertiserIdDimensionValue(DimensionValue $advertiserIdDimensionValue)
  {
    $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getAdvertiserIdDimensionValue()
  {
    return $this->advertiserIdDimensionValue;
  }
  /**
   * @param DayPartTargeting
   */
  public function setDayPartTargeting(DayPartTargeting $dayPartTargeting)
  {
    $this->dayPartTargeting = $dayPartTargeting;
  }
  /**
   * @return DayPartTargeting
   */
  public function getDayPartTargeting()
  {
    return $this->dayPartTargeting;
  }
  /**
   * @param GeoTargeting
   */
  public function setGeoTargeting(GeoTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return GeoTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param KeyValueTargetingExpression
   */
  public function setKeyValueTargetingExpression(KeyValueTargetingExpression $keyValueTargetingExpression)
  {
    $this->keyValueTargetingExpression = $keyValueTargetingExpression;
  }
  /**
   * @return KeyValueTargetingExpression
   */
  public function getKeyValueTargetingExpression()
  {
    return $this->keyValueTargetingExpression;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LanguageTargeting
   */
  public function setLanguageTargeting(LanguageTargeting $languageTargeting)
  {
    $this->languageTargeting = $languageTargeting;
  }
  /**
   * @return LanguageTargeting
   */
  public function getLanguageTargeting()
  {
    return $this->languageTargeting;
  }
  /**
   * @param ListTargetingExpression
   */
  public function setListTargetingExpression(ListTargetingExpression $listTargetingExpression)
  {
    $this->listTargetingExpression = $listTargetingExpression;
  }
  /**
   * @return ListTargetingExpression
   */
  public function getListTargetingExpression()
  {
    return $this->listTargetingExpression;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param TechnologyTargeting
   */
  public function setTechnologyTargeting(TechnologyTargeting $technologyTargeting)
  {
    $this->technologyTargeting = $technologyTargeting;
  }
  /**
   * @return TechnologyTargeting
   */
  public function getTechnologyTargeting()
  {
    return $this->technologyTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetingTemplate::class, 'Google_Service_Dfareporting_TargetingTemplate');
