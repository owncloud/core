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

class GeostoreLandmarkReferenceProto extends \Google\Collection
{
  protected $collection_key = 'travelMode';
  /**
   * @var int
   */
  public $featureType;
  protected $landmarkType = GeostoreFeatureIdProto::class;
  protected $landmarkDataType = '';
  /**
   * @var string[]
   */
  public $travelMode;

  /**
   * @param int
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return int
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setLandmark(GeostoreFeatureIdProto $landmark)
  {
    $this->landmark = $landmark;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getLandmark()
  {
    return $this->landmark;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreLandmarkReferenceProto::class, 'Google_Service_Contentwarehouse_GeostoreLandmarkReferenceProto');
