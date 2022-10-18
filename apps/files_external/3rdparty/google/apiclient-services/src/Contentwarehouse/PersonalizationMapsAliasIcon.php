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

class PersonalizationMapsAliasIcon extends \Google\Model
{
  protected $aliasIdType = PersonalizationMapsAliasAliasId::class;
  protected $aliasIdDataType = '';
  /**
   * @var string
   */
  public $droppedPinS2cellId;
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var string
   */
  public $featureName;
  /**
   * @var string
   */
  public $featureType;
  /**
   * @var string
   */
  public $formattedAddress;
  /**
   * @var string
   */
  public $nickname;
  protected $pointType = GeostorePointProto::class;
  protected $pointDataType = '';
  /**
   * @var string
   */
  public $stickerId;
  /**
   * @var bool
   */
  public $syntheticFeature;
  /**
   * @var string
   */
  public $timestamp;

  /**
   * @param PersonalizationMapsAliasAliasId
   */
  public function setAliasId(PersonalizationMapsAliasAliasId $aliasId)
  {
    $this->aliasId = $aliasId;
  }
  /**
   * @return PersonalizationMapsAliasAliasId
   */
  public function getAliasId()
  {
    return $this->aliasId;
  }
  /**
   * @param string
   */
  public function setDroppedPinS2cellId($droppedPinS2cellId)
  {
    $this->droppedPinS2cellId = $droppedPinS2cellId;
  }
  /**
   * @return string
   */
  public function getDroppedPinS2cellId()
  {
    return $this->droppedPinS2cellId;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureId(GeostoreFeatureIdProto $featureId)
  {
    $this->featureId = $featureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureId()
  {
    return $this->featureId;
  }
  /**
   * @param string
   */
  public function setFeatureName($featureName)
  {
    $this->featureName = $featureName;
  }
  /**
   * @return string
   */
  public function getFeatureName()
  {
    return $this->featureName;
  }
  /**
   * @param string
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return string
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param string
   */
  public function setFormattedAddress($formattedAddress)
  {
    $this->formattedAddress = $formattedAddress;
  }
  /**
   * @return string
   */
  public function getFormattedAddress()
  {
    return $this->formattedAddress;
  }
  /**
   * @param string
   */
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  /**
   * @return string
   */
  public function getNickname()
  {
    return $this->nickname;
  }
  /**
   * @param GeostorePointProto
   */
  public function setPoint(GeostorePointProto $point)
  {
    $this->point = $point;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param string
   */
  public function setStickerId($stickerId)
  {
    $this->stickerId = $stickerId;
  }
  /**
   * @return string
   */
  public function getStickerId()
  {
    return $this->stickerId;
  }
  /**
   * @param bool
   */
  public function setSyntheticFeature($syntheticFeature)
  {
    $this->syntheticFeature = $syntheticFeature;
  }
  /**
   * @return bool
   */
  public function getSyntheticFeature()
  {
    return $this->syntheticFeature;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersonalizationMapsAliasIcon::class, 'Google_Service_Contentwarehouse_PersonalizationMapsAliasIcon');
