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

class GeostoreRoadSignComponentProto extends \Google\Model
{
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var int
   */
  public $featureType;
  /**
   * @var int
   */
  public $majorPosition;
  /**
   * @var int
   */
  public $minorPosition;
  /**
   * @var string
   */
  public $routeDirection;
  protected $textType = GeostoreNameProto::class;
  protected $textDataType = '';
  /**
   * @var string
   */
  public $type;

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
   * @param int
   */
  public function setMajorPosition($majorPosition)
  {
    $this->majorPosition = $majorPosition;
  }
  /**
   * @return int
   */
  public function getMajorPosition()
  {
    return $this->majorPosition;
  }
  /**
   * @param int
   */
  public function setMinorPosition($minorPosition)
  {
    $this->minorPosition = $minorPosition;
  }
  /**
   * @return int
   */
  public function getMinorPosition()
  {
    return $this->minorPosition;
  }
  /**
   * @param string
   */
  public function setRouteDirection($routeDirection)
  {
    $this->routeDirection = $routeDirection;
  }
  /**
   * @return string
   */
  public function getRouteDirection()
  {
    return $this->routeDirection;
  }
  /**
   * @param GeostoreNameProto
   */
  public function setText(GeostoreNameProto $text)
  {
    $this->text = $text;
  }
  /**
   * @return GeostoreNameProto
   */
  public function getText()
  {
    return $this->text;
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
class_alias(GeostoreRoadSignComponentProto::class, 'Google_Service_Contentwarehouse_GeostoreRoadSignComponentProto');
