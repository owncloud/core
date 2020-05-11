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

class Google_Service_DriveActivity_Action extends Google_Model
{
  protected $actorType = 'Google_Service_DriveActivity_Actor';
  protected $actorDataType = '';
  protected $detailType = 'Google_Service_DriveActivity_ActionDetail';
  protected $detailDataType = '';
  protected $targetType = 'Google_Service_DriveActivity_Target';
  protected $targetDataType = '';
  protected $timeRangeType = 'Google_Service_DriveActivity_TimeRange';
  protected $timeRangeDataType = '';
  public $timestamp;

  /**
   * @param Google_Service_DriveActivity_Actor
   */
  public function setActor(Google_Service_DriveActivity_Actor $actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return Google_Service_DriveActivity_Actor
   */
  public function getActor()
  {
    return $this->actor;
  }
  /**
   * @param Google_Service_DriveActivity_ActionDetail
   */
  public function setDetail(Google_Service_DriveActivity_ActionDetail $detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return Google_Service_DriveActivity_ActionDetail
   */
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param Google_Service_DriveActivity_Target
   */
  public function setTarget(Google_Service_DriveActivity_Target $target)
  {
    $this->target = $target;
  }
  /**
   * @return Google_Service_DriveActivity_Target
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param Google_Service_DriveActivity_TimeRange
   */
  public function setTimeRange(Google_Service_DriveActivity_TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return Google_Service_DriveActivity_TimeRange
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
