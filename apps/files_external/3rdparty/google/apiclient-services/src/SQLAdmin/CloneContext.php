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

namespace Google\Service\SQLAdmin;

class CloneContext extends \Google\Model
{
  /**
   * @var string
   */
  public $allocatedIpRange;
  protected $binLogCoordinatesType = BinLogCoordinates::class;
  protected $binLogCoordinatesDataType = '';
  /**
   * @var string
   */
  public $destinationInstanceName;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $pitrTimestampMs;
  /**
   * @var string
   */
  public $pointInTime;

  /**
   * @param string
   */
  public function setAllocatedIpRange($allocatedIpRange)
  {
    $this->allocatedIpRange = $allocatedIpRange;
  }
  /**
   * @return string
   */
  public function getAllocatedIpRange()
  {
    return $this->allocatedIpRange;
  }
  /**
   * @param BinLogCoordinates
   */
  public function setBinLogCoordinates(BinLogCoordinates $binLogCoordinates)
  {
    $this->binLogCoordinates = $binLogCoordinates;
  }
  /**
   * @return BinLogCoordinates
   */
  public function getBinLogCoordinates()
  {
    return $this->binLogCoordinates;
  }
  /**
   * @param string
   */
  public function setDestinationInstanceName($destinationInstanceName)
  {
    $this->destinationInstanceName = $destinationInstanceName;
  }
  /**
   * @return string
   */
  public function getDestinationInstanceName()
  {
    return $this->destinationInstanceName;
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
   * @param string
   */
  public function setPitrTimestampMs($pitrTimestampMs)
  {
    $this->pitrTimestampMs = $pitrTimestampMs;
  }
  /**
   * @return string
   */
  public function getPitrTimestampMs()
  {
    return $this->pitrTimestampMs;
  }
  /**
   * @param string
   */
  public function setPointInTime($pointInTime)
  {
    $this->pointInTime = $pointInTime;
  }
  /**
   * @return string
   */
  public function getPointInTime()
  {
    return $this->pointInTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloneContext::class, 'Google_Service_SQLAdmin_CloneContext');
