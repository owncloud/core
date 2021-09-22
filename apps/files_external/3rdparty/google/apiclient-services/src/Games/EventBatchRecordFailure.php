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

namespace Google\Service\Games;

class EventBatchRecordFailure extends \Google\Model
{
  public $failureCause;
  public $kind;
  protected $rangeType = EventPeriodRange::class;
  protected $rangeDataType = '';

  public function setFailureCause($failureCause)
  {
    $this->failureCause = $failureCause;
  }
  public function getFailureCause()
  {
    return $this->failureCause;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param EventPeriodRange
   */
  public function setRange(EventPeriodRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return EventPeriodRange
   */
  public function getRange()
  {
    return $this->range;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventBatchRecordFailure::class, 'Google_Service_Games_EventBatchRecordFailure');
