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

class GeostoreWeightComparisonProto extends \Google\Model
{
  /**
   * @var string
   */
  public $comparison;
  /**
   * @var string
   */
  public $comparisonOperator;
  protected $weightWithUnitType = GeostoreWeightProto::class;
  protected $weightWithUnitDataType = '';

  /**
   * @param string
   */
  public function setComparison($comparison)
  {
    $this->comparison = $comparison;
  }
  /**
   * @return string
   */
  public function getComparison()
  {
    return $this->comparison;
  }
  /**
   * @param string
   */
  public function setComparisonOperator($comparisonOperator)
  {
    $this->comparisonOperator = $comparisonOperator;
  }
  /**
   * @return string
   */
  public function getComparisonOperator()
  {
    return $this->comparisonOperator;
  }
  /**
   * @param GeostoreWeightProto
   */
  public function setWeightWithUnit(GeostoreWeightProto $weightWithUnit)
  {
    $this->weightWithUnit = $weightWithUnit;
  }
  /**
   * @return GeostoreWeightProto
   */
  public function getWeightWithUnit()
  {
    return $this->weightWithUnit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreWeightComparisonProto::class, 'Google_Service_Contentwarehouse_GeostoreWeightComparisonProto');
