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

class GeostoreRestrictionProto extends \Google\Collection
{
  protected $collection_key = 'travelMode';
  /**
   * @var string[]
   */
  public $autonomousDrivingProducts;
  protected $intersectionGroupType = GeostoreFeatureIdProto::class;
  protected $intersectionGroupDataType = '';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $restrictionGroupType = GeostoreFeatureIdProto::class;
  protected $restrictionGroupDataType = '';
  protected $scheduleType = GeostoreTimeScheduleProto::class;
  protected $scheduleDataType = '';
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $style;
  protected $subpathType = GeostoreFeatureIdProto::class;
  protected $subpathDataType = 'array';
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  /**
   * @var string[]
   */
  public $travelMode;
  /**
   * @var string
   */
  public $type;
  protected $vehicleAttributeFilterType = GeostoreVehicleAttributeFilterProto::class;
  protected $vehicleAttributeFilterDataType = '';

  /**
   * @param string[]
   */
  public function setAutonomousDrivingProducts($autonomousDrivingProducts)
  {
    $this->autonomousDrivingProducts = $autonomousDrivingProducts;
  }
  /**
   * @return string[]
   */
  public function getAutonomousDrivingProducts()
  {
    return $this->autonomousDrivingProducts;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setIntersectionGroup(GeostoreFeatureIdProto $intersectionGroup)
  {
    $this->intersectionGroup = $intersectionGroup;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getIntersectionGroup()
  {
    return $this->intersectionGroup;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setRestrictionGroup(GeostoreFeatureIdProto $restrictionGroup)
  {
    $this->restrictionGroup = $restrictionGroup;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getRestrictionGroup()
  {
    return $this->restrictionGroup;
  }
  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setSchedule(GeostoreTimeScheduleProto $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param string
   */
  public function setStyle($style)
  {
    $this->style = $style;
  }
  /**
   * @return string
   */
  public function getStyle()
  {
    return $this->style;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setSubpath($subpath)
  {
    $this->subpath = $subpath;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getSubpath()
  {
    return $this->subpath;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
  /**
   * @param string[]
   */
  public function setTravelMode($travelMode)
  {
    $this->travelMode = $travelMode;
  }
  /**
   * @return string[]
   */
  public function getTravelMode()
  {
    return $this->travelMode;
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
  /**
   * @param GeostoreVehicleAttributeFilterProto
   */
  public function setVehicleAttributeFilter(GeostoreVehicleAttributeFilterProto $vehicleAttributeFilter)
  {
    $this->vehicleAttributeFilter = $vehicleAttributeFilter;
  }
  /**
   * @return GeostoreVehicleAttributeFilterProto
   */
  public function getVehicleAttributeFilter()
  {
    return $this->vehicleAttributeFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRestrictionProto::class, 'Google_Service_Contentwarehouse_GeostoreRestrictionProto');
