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

class GeostoreParkingProto extends \Google\Collection
{
  protected $collection_key = 'restriction';
  protected $allowanceType = GeostoreParkingAllowanceProto::class;
  protected $allowanceDataType = 'array';
  protected $openingHoursType = GeostoreOpeningHoursProto::class;
  protected $openingHoursDataType = '';
  /**
   * @var bool
   */
  public $parkingAvailable;
  protected $parkingProviderFeatureType = GeostoreFeatureIdProto::class;
  protected $parkingProviderFeatureDataType = 'array';
  protected $restrictionType = GeostoreParkingRestrictionProto::class;
  protected $restrictionDataType = 'array';

  /**
   * @param GeostoreParkingAllowanceProto[]
   */
  public function setAllowance($allowance)
  {
    $this->allowance = $allowance;
  }
  /**
   * @return GeostoreParkingAllowanceProto[]
   */
  public function getAllowance()
  {
    return $this->allowance;
  }
  /**
   * @param GeostoreOpeningHoursProto
   */
  public function setOpeningHours(GeostoreOpeningHoursProto $openingHours)
  {
    $this->openingHours = $openingHours;
  }
  /**
   * @return GeostoreOpeningHoursProto
   */
  public function getOpeningHours()
  {
    return $this->openingHours;
  }
  /**
   * @param bool
   */
  public function setParkingAvailable($parkingAvailable)
  {
    $this->parkingAvailable = $parkingAvailable;
  }
  /**
   * @return bool
   */
  public function getParkingAvailable()
  {
    return $this->parkingAvailable;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setParkingProviderFeature($parkingProviderFeature)
  {
    $this->parkingProviderFeature = $parkingProviderFeature;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getParkingProviderFeature()
  {
    return $this->parkingProviderFeature;
  }
  /**
   * @param GeostoreParkingRestrictionProto[]
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return GeostoreParkingRestrictionProto[]
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreParkingProto::class, 'Google_Service_Contentwarehouse_GeostoreParkingProto');
