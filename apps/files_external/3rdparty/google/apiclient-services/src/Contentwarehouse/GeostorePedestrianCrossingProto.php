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

class GeostorePedestrianCrossingProto extends \Google\Collection
{
  protected $collection_key = 'restriction';
  public $angleDegrees;
  /**
   * @var bool
   */
  public $crossAnywhere;
  /**
   * @var string
   */
  public $crossingType;
  /**
   * @var float
   */
  public $offset;
  protected $restrictionType = GeostoreRestrictionProto::class;
  protected $restrictionDataType = 'array';
  /**
   * @var float
   */
  public $width;

  public function setAngleDegrees($angleDegrees)
  {
    $this->angleDegrees = $angleDegrees;
  }
  public function getAngleDegrees()
  {
    return $this->angleDegrees;
  }
  /**
   * @param bool
   */
  public function setCrossAnywhere($crossAnywhere)
  {
    $this->crossAnywhere = $crossAnywhere;
  }
  /**
   * @return bool
   */
  public function getCrossAnywhere()
  {
    return $this->crossAnywhere;
  }
  /**
   * @param string
   */
  public function setCrossingType($crossingType)
  {
    $this->crossingType = $crossingType;
  }
  /**
   * @return string
   */
  public function getCrossingType()
  {
    return $this->crossingType;
  }
  /**
   * @param float
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return float
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param GeostoreRestrictionProto[]
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return GeostoreRestrictionProto[]
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param float
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return float
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePedestrianCrossingProto::class, 'Google_Service_Contentwarehouse_GeostorePedestrianCrossingProto');
