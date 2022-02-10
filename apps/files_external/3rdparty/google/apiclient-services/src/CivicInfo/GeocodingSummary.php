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

namespace Google\Service\CivicInfo;

class GeocodingSummary extends \Google\Model
{
  /**
   * @var bool
   */
  public $addressUnderstood;
  protected $featureIdType = FeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var string
   */
  public $featureType;
  public $positionPrecisionMeters;
  /**
   * @var string
   */
  public $queryString;

  /**
   * @param bool
   */
  public function setAddressUnderstood($addressUnderstood)
  {
    $this->addressUnderstood = $addressUnderstood;
  }
  /**
   * @return bool
   */
  public function getAddressUnderstood()
  {
    return $this->addressUnderstood;
  }
  /**
   * @param FeatureIdProto
   */
  public function setFeatureId(FeatureIdProto $featureId)
  {
    $this->featureId = $featureId;
  }
  /**
   * @return FeatureIdProto
   */
  public function getFeatureId()
  {
    return $this->featureId;
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
  public function setPositionPrecisionMeters($positionPrecisionMeters)
  {
    $this->positionPrecisionMeters = $positionPrecisionMeters;
  }
  public function getPositionPrecisionMeters()
  {
    return $this->positionPrecisionMeters;
  }
  /**
   * @param string
   */
  public function setQueryString($queryString)
  {
    $this->queryString = $queryString;
  }
  /**
   * @return string
   */
  public function getQueryString()
  {
    return $this->queryString;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeocodingSummary::class, 'Google_Service_CivicInfo_GeocodingSummary');
