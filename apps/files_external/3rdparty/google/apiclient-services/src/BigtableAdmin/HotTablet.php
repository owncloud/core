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

namespace Google\Service\BigtableAdmin;

class HotTablet extends \Google\Model
{
  /**
   * @var string
   */
  public $endKey;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $nodeCpuUsagePercent;
  /**
   * @var string
   */
  public $startKey;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $tableName;

  /**
   * @param string
   */
  public function setEndKey($endKey)
  {
    $this->endKey = $endKey;
  }
  /**
   * @return string
   */
  public function getEndKey()
  {
    return $this->endKey;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
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
   * @param float
   */
  public function setNodeCpuUsagePercent($nodeCpuUsagePercent)
  {
    $this->nodeCpuUsagePercent = $nodeCpuUsagePercent;
  }
  /**
   * @return float
   */
  public function getNodeCpuUsagePercent()
  {
    return $this->nodeCpuUsagePercent;
  }
  /**
   * @param string
   */
  public function setStartKey($startKey)
  {
    $this->startKey = $startKey;
  }
  /**
   * @return string
   */
  public function getStartKey()
  {
    return $this->startKey;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setTableName($tableName)
  {
    $this->tableName = $tableName;
  }
  /**
   * @return string
   */
  public function getTableName()
  {
    return $this->tableName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HotTablet::class, 'Google_Service_BigtableAdmin_HotTablet');
