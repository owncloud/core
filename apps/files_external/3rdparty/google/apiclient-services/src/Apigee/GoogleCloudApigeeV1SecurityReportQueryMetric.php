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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SecurityReportQueryMetric extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregationFunction;
  /**
   * @var string
   */
  public $alias;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $operator;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setAggregationFunction($aggregationFunction)
  {
    $this->aggregationFunction = $aggregationFunction;
  }
  /**
   * @return string
   */
  public function getAggregationFunction()
  {
    return $this->aggregationFunction;
  }
  /**
   * @param string
   */
  public function setAlias($alias)
  {
    $this->alias = $alias;
  }
  /**
   * @return string
   */
  public function getAlias()
  {
    return $this->alias;
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
   * @param string
   */
  public function setOperator($operator)
  {
    $this->operator = $operator;
  }
  /**
   * @return string
   */
  public function getOperator()
  {
    return $this->operator;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SecurityReportQueryMetric::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SecurityReportQueryMetric');
