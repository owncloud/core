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

class FloodlightActivityGroup extends \Google\Model
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
  /**
   * @var string
   */
  public $floodlightConfigurationId;
  protected $floodlightConfigurationIdDimensionValueType = DimensionValue::class;
  protected $floodlightConfigurationIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $tagString;
  /**
   * @var string
   */
  public $type;

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
   * @param string
   */
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
  /**
   * @return string
   */
  public function getFloodlightConfigurationId()
  {
    return $this->floodlightConfigurationId;
  }
  /**
   * @param DimensionValue
   */
  public function setFloodlightConfigurationIdDimensionValue(DimensionValue $floodlightConfigurationIdDimensionValue)
  {
    $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getFloodlightConfigurationIdDimensionValue()
  {
    return $this->floodlightConfigurationIdDimensionValue;
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
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
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
   * @param string
   */
  public function setTagString($tagString)
  {
    $this->tagString = $tagString;
  }
  /**
   * @return string
   */
  public function getTagString()
  {
    return $this->tagString;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightActivityGroup::class, 'Google_Service_Dfareporting_FloodlightActivityGroup');
