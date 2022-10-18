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

class GeostoreSpeedLimitProto extends \Google\Collection
{
  protected $collection_key = 'condition';
  /**
   * @var string
   */
  public $category;
  protected $conditionType = GeostoreRoadConditionalProto::class;
  protected $conditionDataType = 'array';
  protected $speedWithUnitType = GeostoreSpeedProto::class;
  protected $speedWithUnitDataType = '';
  protected $unlimitedSpeedType = GeostoreUnlimitedSpeedProto::class;
  protected $unlimitedSpeedDataType = '';
  protected $variableSpeedType = GeostoreVariableSpeedProto::class;
  protected $variableSpeedDataType = '';

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param GeostoreRoadConditionalProto[]
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return GeostoreRoadConditionalProto[]
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param GeostoreSpeedProto
   */
  public function setSpeedWithUnit(GeostoreSpeedProto $speedWithUnit)
  {
    $this->speedWithUnit = $speedWithUnit;
  }
  /**
   * @return GeostoreSpeedProto
   */
  public function getSpeedWithUnit()
  {
    return $this->speedWithUnit;
  }
  /**
   * @param GeostoreUnlimitedSpeedProto
   */
  public function setUnlimitedSpeed(GeostoreUnlimitedSpeedProto $unlimitedSpeed)
  {
    $this->unlimitedSpeed = $unlimitedSpeed;
  }
  /**
   * @return GeostoreUnlimitedSpeedProto
   */
  public function getUnlimitedSpeed()
  {
    return $this->unlimitedSpeed;
  }
  /**
   * @param GeostoreVariableSpeedProto
   */
  public function setVariableSpeed(GeostoreVariableSpeedProto $variableSpeed)
  {
    $this->variableSpeed = $variableSpeed;
  }
  /**
   * @return GeostoreVariableSpeedProto
   */
  public function getVariableSpeed()
  {
    return $this->variableSpeed;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreSpeedLimitProto::class, 'Google_Service_Contentwarehouse_GeostoreSpeedLimitProto');
