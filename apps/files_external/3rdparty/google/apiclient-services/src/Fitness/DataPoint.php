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

namespace Google\Service\Fitness;

class DataPoint extends \Google\Collection
{
  protected $collection_key = 'value';
  /**
   * @var string
   */
  public $computationTimeMillis;
  /**
   * @var string
   */
  public $dataTypeName;
  /**
   * @var string
   */
  public $endTimeNanos;
  /**
   * @var string
   */
  public $modifiedTimeMillis;
  /**
   * @var string
   */
  public $originDataSourceId;
  /**
   * @var string
   */
  public $rawTimestampNanos;
  /**
   * @var string
   */
  public $startTimeNanos;
  protected $valueType = Value::class;
  protected $valueDataType = 'array';

  /**
   * @param string
   */
  public function setComputationTimeMillis($computationTimeMillis)
  {
    $this->computationTimeMillis = $computationTimeMillis;
  }
  /**
   * @return string
   */
  public function getComputationTimeMillis()
  {
    return $this->computationTimeMillis;
  }
  /**
   * @param string
   */
  public function setDataTypeName($dataTypeName)
  {
    $this->dataTypeName = $dataTypeName;
  }
  /**
   * @return string
   */
  public function getDataTypeName()
  {
    return $this->dataTypeName;
  }
  /**
   * @param string
   */
  public function setEndTimeNanos($endTimeNanos)
  {
    $this->endTimeNanos = $endTimeNanos;
  }
  /**
   * @return string
   */
  public function getEndTimeNanos()
  {
    return $this->endTimeNanos;
  }
  /**
   * @param string
   */
  public function setModifiedTimeMillis($modifiedTimeMillis)
  {
    $this->modifiedTimeMillis = $modifiedTimeMillis;
  }
  /**
   * @return string
   */
  public function getModifiedTimeMillis()
  {
    return $this->modifiedTimeMillis;
  }
  /**
   * @param string
   */
  public function setOriginDataSourceId($originDataSourceId)
  {
    $this->originDataSourceId = $originDataSourceId;
  }
  /**
   * @return string
   */
  public function getOriginDataSourceId()
  {
    return $this->originDataSourceId;
  }
  /**
   * @param string
   */
  public function setRawTimestampNanos($rawTimestampNanos)
  {
    $this->rawTimestampNanos = $rawTimestampNanos;
  }
  /**
   * @return string
   */
  public function getRawTimestampNanos()
  {
    return $this->rawTimestampNanos;
  }
  /**
   * @param string
   */
  public function setStartTimeNanos($startTimeNanos)
  {
    $this->startTimeNanos = $startTimeNanos;
  }
  /**
   * @return string
   */
  public function getStartTimeNanos()
  {
    return $this->startTimeNanos;
  }
  /**
   * @param Value[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return Value[]
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataPoint::class, 'Google_Service_Fitness_DataPoint');
