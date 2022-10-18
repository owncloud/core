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

class QualityActionsReminderLocation extends \Google\Model
{
  protected $categoryInfoType = QualityActionsReminderLocationCategoryInfo::class;
  protected $categoryInfoDataType = '';
  protected $chainInfoType = QualityActionsReminderLocationChainInfo::class;
  protected $chainInfoDataType = '';
  /**
   * @var string
   */
  public $customLocationType;
  /**
   * @var string
   */
  public $displayAddress;
  protected $geoFeatureIdType = GeostoreFeatureIdProto::class;
  protected $geoFeatureIdDataType = '';
  public $lat;
  public $lng;
  /**
   * @var string
   */
  public $locationType;
  /**
   * @var string
   */
  public $name;
  protected $personalLocationMetadataType = CopleySourceTypeList::class;
  protected $personalLocationMetadataDataType = '';
  /**
   * @var string
   */
  public $ttsAddress;

  /**
   * @param QualityActionsReminderLocationCategoryInfo
   */
  public function setCategoryInfo(QualityActionsReminderLocationCategoryInfo $categoryInfo)
  {
    $this->categoryInfo = $categoryInfo;
  }
  /**
   * @return QualityActionsReminderLocationCategoryInfo
   */
  public function getCategoryInfo()
  {
    return $this->categoryInfo;
  }
  /**
   * @param QualityActionsReminderLocationChainInfo
   */
  public function setChainInfo(QualityActionsReminderLocationChainInfo $chainInfo)
  {
    $this->chainInfo = $chainInfo;
  }
  /**
   * @return QualityActionsReminderLocationChainInfo
   */
  public function getChainInfo()
  {
    return $this->chainInfo;
  }
  /**
   * @param string
   */
  public function setCustomLocationType($customLocationType)
  {
    $this->customLocationType = $customLocationType;
  }
  /**
   * @return string
   */
  public function getCustomLocationType()
  {
    return $this->customLocationType;
  }
  /**
   * @param string
   */
  public function setDisplayAddress($displayAddress)
  {
    $this->displayAddress = $displayAddress;
  }
  /**
   * @return string
   */
  public function getDisplayAddress()
  {
    return $this->displayAddress;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setGeoFeatureId(GeostoreFeatureIdProto $geoFeatureId)
  {
    $this->geoFeatureId = $geoFeatureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getGeoFeatureId()
  {
    return $this->geoFeatureId;
  }
  public function setLat($lat)
  {
    $this->lat = $lat;
  }
  public function getLat()
  {
    return $this->lat;
  }
  public function setLng($lng)
  {
    $this->lng = $lng;
  }
  public function getLng()
  {
    return $this->lng;
  }
  /**
   * @param string
   */
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return string
   */
  public function getLocationType()
  {
    return $this->locationType;
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
   * @param CopleySourceTypeList
   */
  public function setPersonalLocationMetadata(CopleySourceTypeList $personalLocationMetadata)
  {
    $this->personalLocationMetadata = $personalLocationMetadata;
  }
  /**
   * @return CopleySourceTypeList
   */
  public function getPersonalLocationMetadata()
  {
    return $this->personalLocationMetadata;
  }
  /**
   * @param string
   */
  public function setTtsAddress($ttsAddress)
  {
    $this->ttsAddress = $ttsAddress;
  }
  /**
   * @return string
   */
  public function getTtsAddress()
  {
    return $this->ttsAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsReminderLocation::class, 'Google_Service_Contentwarehouse_QualityActionsReminderLocation');
