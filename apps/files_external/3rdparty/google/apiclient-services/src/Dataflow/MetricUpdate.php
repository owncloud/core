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

namespace Google\Service\Dataflow;

class MetricUpdate extends \Google\Model
{
  /**
   * @var bool
   */
  public $cumulative;
  /**
   * @var array
   */
  public $distribution;
  /**
   * @var array
   */
  public $gauge;
  /**
   * @var array
   */
  public $internal;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var array
   */
  public $meanCount;
  /**
   * @var array
   */
  public $meanSum;
  protected $nameType = MetricStructuredName::class;
  protected $nameDataType = '';
  /**
   * @var array
   */
  public $scalar;
  /**
   * @var array
   */
  public $set;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param bool
   */
  public function setCumulative($cumulative)
  {
    $this->cumulative = $cumulative;
  }
  /**
   * @return bool
   */
  public function getCumulative()
  {
    return $this->cumulative;
  }
  /**
   * @param array
   */
  public function setDistribution($distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return array
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  /**
   * @param array
   */
  public function setGauge($gauge)
  {
    $this->gauge = $gauge;
  }
  /**
   * @return array
   */
  public function getGauge()
  {
    return $this->gauge;
  }
  /**
   * @param array
   */
  public function setInternal($internal)
  {
    $this->internal = $internal;
  }
  /**
   * @return array
   */
  public function getInternal()
  {
    return $this->internal;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param array
   */
  public function setMeanCount($meanCount)
  {
    $this->meanCount = $meanCount;
  }
  /**
   * @return array
   */
  public function getMeanCount()
  {
    return $this->meanCount;
  }
  /**
   * @param array
   */
  public function setMeanSum($meanSum)
  {
    $this->meanSum = $meanSum;
  }
  /**
   * @return array
   */
  public function getMeanSum()
  {
    return $this->meanSum;
  }
  /**
   * @param MetricStructuredName
   */
  public function setName(MetricStructuredName $name)
  {
    $this->name = $name;
  }
  /**
   * @return MetricStructuredName
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param array
   */
  public function setScalar($scalar)
  {
    $this->scalar = $scalar;
  }
  /**
   * @return array
   */
  public function getScalar()
  {
    return $this->scalar;
  }
  /**
   * @param array
   */
  public function setSet($set)
  {
    $this->set = $set;
  }
  /**
   * @return array
   */
  public function getSet()
  {
    return $this->set;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricUpdate::class, 'Google_Service_Dataflow_MetricUpdate');
