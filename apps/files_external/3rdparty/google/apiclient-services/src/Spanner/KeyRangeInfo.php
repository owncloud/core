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

namespace Google\Service\Spanner;

class KeyRangeInfo extends \Google\Collection
{
  protected $collection_key = 'contextValues';
  protected $contextValuesType = ContextValue::class;
  protected $contextValuesDataType = 'array';
  /**
   * @var int
   */
  public $endKeyIndex;
  protected $infoType = LocalizedString::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $keysCount;
  protected $metricType = LocalizedString::class;
  protected $metricDataType = '';
  /**
   * @var int
   */
  public $startKeyIndex;
  /**
   * @var string
   */
  public $timeOffset;
  protected $unitType = LocalizedString::class;
  protected $unitDataType = '';
  /**
   * @var float
   */
  public $value;

  /**
   * @param ContextValue[]
   */
  public function setContextValues($contextValues)
  {
    $this->contextValues = $contextValues;
  }
  /**
   * @return ContextValue[]
   */
  public function getContextValues()
  {
    return $this->contextValues;
  }
  /**
   * @param int
   */
  public function setEndKeyIndex($endKeyIndex)
  {
    $this->endKeyIndex = $endKeyIndex;
  }
  /**
   * @return int
   */
  public function getEndKeyIndex()
  {
    return $this->endKeyIndex;
  }
  /**
   * @param LocalizedString
   */
  public function setInfo(LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string
   */
  public function setKeysCount($keysCount)
  {
    $this->keysCount = $keysCount;
  }
  /**
   * @return string
   */
  public function getKeysCount()
  {
    return $this->keysCount;
  }
  /**
   * @param LocalizedString
   */
  public function setMetric(LocalizedString $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return LocalizedString
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param int
   */
  public function setStartKeyIndex($startKeyIndex)
  {
    $this->startKeyIndex = $startKeyIndex;
  }
  /**
   * @return int
   */
  public function getStartKeyIndex()
  {
    return $this->startKeyIndex;
  }
  /**
   * @param string
   */
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  /**
   * @return string
   */
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
  /**
   * @param LocalizedString
   */
  public function setUnit(LocalizedString $unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return LocalizedString
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param float
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return float
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyRangeInfo::class, 'Google_Service_Spanner_KeyRangeInfo');
