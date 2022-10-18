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

class GeostoreVehicleAttributeFilterProto extends \Google\Collection
{
  protected $collection_key = 'vehicleWidth';
  protected $axleCountType = GeostoreCountComparisonProto::class;
  protected $axleCountDataType = 'array';
  /**
   * @var bool
   */
  public $hasTrailer;
  /**
   * @var string[]
   */
  public $hazardousGoods;
  protected $numTrailersType = GeostoreCountComparisonProto::class;
  protected $numTrailersDataType = 'array';
  protected $trailerLengthType = GeostoreDimensionComparisonProto::class;
  protected $trailerLengthDataType = 'array';
  protected $vehicleHeightType = GeostoreDimensionComparisonProto::class;
  protected $vehicleHeightDataType = 'array';
  protected $vehicleLengthType = GeostoreDimensionComparisonProto::class;
  protected $vehicleLengthDataType = 'array';
  protected $vehicleWeightType = GeostoreWeightComparisonProto::class;
  protected $vehicleWeightDataType = 'array';
  protected $vehicleWidthType = GeostoreDimensionComparisonProto::class;
  protected $vehicleWidthDataType = 'array';

  /**
   * @param GeostoreCountComparisonProto[]
   */
  public function setAxleCount($axleCount)
  {
    $this->axleCount = $axleCount;
  }
  /**
   * @return GeostoreCountComparisonProto[]
   */
  public function getAxleCount()
  {
    return $this->axleCount;
  }
  /**
   * @param bool
   */
  public function setHasTrailer($hasTrailer)
  {
    $this->hasTrailer = $hasTrailer;
  }
  /**
   * @return bool
   */
  public function getHasTrailer()
  {
    return $this->hasTrailer;
  }
  /**
   * @param string[]
   */
  public function setHazardousGoods($hazardousGoods)
  {
    $this->hazardousGoods = $hazardousGoods;
  }
  /**
   * @return string[]
   */
  public function getHazardousGoods()
  {
    return $this->hazardousGoods;
  }
  /**
   * @param GeostoreCountComparisonProto[]
   */
  public function setNumTrailers($numTrailers)
  {
    $this->numTrailers = $numTrailers;
  }
  /**
   * @return GeostoreCountComparisonProto[]
   */
  public function getNumTrailers()
  {
    return $this->numTrailers;
  }
  /**
   * @param GeostoreDimensionComparisonProto[]
   */
  public function setTrailerLength($trailerLength)
  {
    $this->trailerLength = $trailerLength;
  }
  /**
   * @return GeostoreDimensionComparisonProto[]
   */
  public function getTrailerLength()
  {
    return $this->trailerLength;
  }
  /**
   * @param GeostoreDimensionComparisonProto[]
   */
  public function setVehicleHeight($vehicleHeight)
  {
    $this->vehicleHeight = $vehicleHeight;
  }
  /**
   * @return GeostoreDimensionComparisonProto[]
   */
  public function getVehicleHeight()
  {
    return $this->vehicleHeight;
  }
  /**
   * @param GeostoreDimensionComparisonProto[]
   */
  public function setVehicleLength($vehicleLength)
  {
    $this->vehicleLength = $vehicleLength;
  }
  /**
   * @return GeostoreDimensionComparisonProto[]
   */
  public function getVehicleLength()
  {
    return $this->vehicleLength;
  }
  /**
   * @param GeostoreWeightComparisonProto[]
   */
  public function setVehicleWeight($vehicleWeight)
  {
    $this->vehicleWeight = $vehicleWeight;
  }
  /**
   * @return GeostoreWeightComparisonProto[]
   */
  public function getVehicleWeight()
  {
    return $this->vehicleWeight;
  }
  /**
   * @param GeostoreDimensionComparisonProto[]
   */
  public function setVehicleWidth($vehicleWidth)
  {
    $this->vehicleWidth = $vehicleWidth;
  }
  /**
   * @return GeostoreDimensionComparisonProto[]
   */
  public function getVehicleWidth()
  {
    return $this->vehicleWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreVehicleAttributeFilterProto::class, 'Google_Service_Contentwarehouse_GeostoreVehicleAttributeFilterProto');
