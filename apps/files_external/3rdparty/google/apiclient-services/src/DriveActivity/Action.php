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

namespace Google\Service\DriveActivity;

class Action extends \Google\Model
{
  protected $actorType = Actor::class;
  protected $actorDataType = '';
  protected $detailType = ActionDetail::class;
  protected $detailDataType = '';
  protected $targetType = Target::class;
  protected $targetDataType = '';
  protected $timeRangeType = TimeRange::class;
  protected $timeRangeDataType = '';
  public $timestamp;

  /**
   * @param Actor
   */
  public function setActor(Actor $actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return Actor
   */
  public function getActor()
  {
    return $this->actor;
  }
  /**
   * @param ActionDetail
   */
  public function setDetail(ActionDetail $detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return ActionDetail
   */
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param Target
   */
  public function setTarget(Target $target)
  {
    $this->target = $target;
  }
  /**
   * @return Target
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param TimeRange
   */
  public function setTimeRange(TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return TimeRange
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Action::class, 'Google_Service_DriveActivity_Action');
