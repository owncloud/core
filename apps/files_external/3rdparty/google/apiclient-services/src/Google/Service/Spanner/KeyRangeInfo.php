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

class Google_Service_Spanner_KeyRangeInfo extends Google_Collection
{
  protected $collection_key = 'contextValues';
  protected $contextValuesType = 'Google_Service_Spanner_ContextValue';
  protected $contextValuesDataType = 'array';
  public $endKeyIndex;
  protected $infoType = 'Google_Service_Spanner_LocalizedString';
  protected $infoDataType = '';
  public $keysCount;
  protected $metricType = 'Google_Service_Spanner_LocalizedString';
  protected $metricDataType = '';
  public $startKeyIndex;
  protected $unitType = 'Google_Service_Spanner_LocalizedString';
  protected $unitDataType = '';
  public $value;

  /**
   * @param Google_Service_Spanner_ContextValue[]
   */
  public function setContextValues($contextValues)
  {
    $this->contextValues = $contextValues;
  }
  /**
   * @return Google_Service_Spanner_ContextValue[]
   */
  public function getContextValues()
  {
    return $this->contextValues;
  }
  public function setEndKeyIndex($endKeyIndex)
  {
    $this->endKeyIndex = $endKeyIndex;
  }
  public function getEndKeyIndex()
  {
    return $this->endKeyIndex;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setInfo(Google_Service_Spanner_LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  public function setKeysCount($keysCount)
  {
    $this->keysCount = $keysCount;
  }
  public function getKeysCount()
  {
    return $this->keysCount;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setMetric(Google_Service_Spanner_LocalizedString $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getMetric()
  {
    return $this->metric;
  }
  public function setStartKeyIndex($startKeyIndex)
  {
    $this->startKeyIndex = $startKeyIndex;
  }
  public function getStartKeyIndex()
  {
    return $this->startKeyIndex;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setUnit(Google_Service_Spanner_LocalizedString $unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getUnit()
  {
    return $this->unit;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
