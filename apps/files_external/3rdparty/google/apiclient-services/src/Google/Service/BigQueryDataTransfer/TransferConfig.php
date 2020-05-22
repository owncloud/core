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

class Google_Service_BigQueryDataTransfer_TransferConfig extends Google_Model
{
  public $dataRefreshWindowDays;
  public $dataSourceId;
  public $datasetRegion;
  public $destinationDatasetId;
  public $disabled;
  public $displayName;
  protected $emailPreferencesType = 'Google_Service_BigQueryDataTransfer_EmailPreferences';
  protected $emailPreferencesDataType = '';
  public $name;
  public $nextRunTime;
  public $notificationPubsubTopic;
  public $params;
  public $schedule;
  protected $scheduleOptionsType = 'Google_Service_BigQueryDataTransfer_ScheduleOptions';
  protected $scheduleOptionsDataType = '';
  public $state;
  public $updateTime;
  public $userId;

  public function setDataRefreshWindowDays($dataRefreshWindowDays)
  {
    $this->dataRefreshWindowDays = $dataRefreshWindowDays;
  }
  public function getDataRefreshWindowDays()
  {
    return $this->dataRefreshWindowDays;
  }
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  public function setDatasetRegion($datasetRegion)
  {
    $this->datasetRegion = $datasetRegion;
  }
  public function getDatasetRegion()
  {
    return $this->datasetRegion;
  }
  public function setDestinationDatasetId($destinationDatasetId)
  {
    $this->destinationDatasetId = $destinationDatasetId;
  }
  public function getDestinationDatasetId()
  {
    return $this->destinationDatasetId;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_BigQueryDataTransfer_EmailPreferences
   */
  public function setEmailPreferences(Google_Service_BigQueryDataTransfer_EmailPreferences $emailPreferences)
  {
    $this->emailPreferences = $emailPreferences;
  }
  /**
   * @return Google_Service_BigQueryDataTransfer_EmailPreferences
   */
  public function getEmailPreferences()
  {
    return $this->emailPreferences;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNextRunTime($nextRunTime)
  {
    $this->nextRunTime = $nextRunTime;
  }
  public function getNextRunTime()
  {
    return $this->nextRunTime;
  }
  public function setNotificationPubsubTopic($notificationPubsubTopic)
  {
    $this->notificationPubsubTopic = $notificationPubsubTopic;
  }
  public function getNotificationPubsubTopic()
  {
    return $this->notificationPubsubTopic;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param Google_Service_BigQueryDataTransfer_ScheduleOptions
   */
  public function setScheduleOptions(Google_Service_BigQueryDataTransfer_ScheduleOptions $scheduleOptions)
  {
    $this->scheduleOptions = $scheduleOptions;
  }
  /**
   * @return Google_Service_BigQueryDataTransfer_ScheduleOptions
   */
  public function getScheduleOptions()
  {
    return $this->scheduleOptions;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
