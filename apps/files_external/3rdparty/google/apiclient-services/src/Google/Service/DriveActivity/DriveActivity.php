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

class Google_Service_DriveActivity_DriveActivity extends Google_Collection
{
  protected $collection_key = 'targets';
  protected $actionsType = 'Google_Service_DriveActivity_Action';
  protected $actionsDataType = 'array';
  protected $actorsType = 'Google_Service_DriveActivity_Actor';
  protected $actorsDataType = 'array';
  protected $primaryActionDetailType = 'Google_Service_DriveActivity_ActionDetail';
  protected $primaryActionDetailDataType = '';
  protected $targetsType = 'Google_Service_DriveActivity_Target';
  protected $targetsDataType = 'array';
  protected $timeRangeType = 'Google_Service_DriveActivity_TimeRange';
  protected $timeRangeDataType = '';
  public $timestamp;

  /**
   * @param Google_Service_DriveActivity_Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return Google_Service_DriveActivity_Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param Google_Service_DriveActivity_Actor[]
   */
  public function setActors($actors)
  {
    $this->actors = $actors;
  }
  /**
   * @return Google_Service_DriveActivity_Actor[]
   */
  public function getActors()
  {
    return $this->actors;
  }
  /**
   * @param Google_Service_DriveActivity_ActionDetail
   */
  public function setPrimaryActionDetail(Google_Service_DriveActivity_ActionDetail $primaryActionDetail)
  {
    $this->primaryActionDetail = $primaryActionDetail;
  }
  /**
   * @return Google_Service_DriveActivity_ActionDetail
   */
  public function getPrimaryActionDetail()
  {
    return $this->primaryActionDetail;
  }
  /**
   * @param Google_Service_DriveActivity_Target[]
   */
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  /**
   * @return Google_Service_DriveActivity_Target[]
   */
  public function getTargets()
  {
    return $this->targets;
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
