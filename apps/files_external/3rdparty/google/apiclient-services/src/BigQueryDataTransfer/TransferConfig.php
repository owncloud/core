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

namespace Google\Service\BigQueryDataTransfer;

class TransferConfig extends \Google\Model
{
  public $dataRefreshWindowDays;
  public $dataSourceId;
  public $datasetRegion;
  public $destinationDatasetId;
  public $disabled;
  public $displayName;
  protected $emailPreferencesType = EmailPreferences::class;
  protected $emailPreferencesDataType = '';
  public $name;
  public $nextRunTime;
  public $notificationPubsubTopic;
  protected $ownerInfoType = UserInfo::class;
  protected $ownerInfoDataType = '';
  public $params;
  public $schedule;
  protected $scheduleOptionsType = ScheduleOptions::class;
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
   * @param EmailPreferences
   */
  public function setEmailPreferences(EmailPreferences $emailPreferences)
  {
    $this->emailPreferences = $emailPreferences;
  }
  /**
   * @return EmailPreferences
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
  /**
   * @param UserInfo
   */
  public function setOwnerInfo(UserInfo $ownerInfo)
  {
    $this->ownerInfo = $ownerInfo;
  }
  /**
   * @return UserInfo
   */
  public function getOwnerInfo()
  {
    return $this->ownerInfo;
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
   * @param ScheduleOptions
   */
  public function setScheduleOptions(ScheduleOptions $scheduleOptions)
  {
    $this->scheduleOptions = $scheduleOptions;
  }
  /**
   * @return ScheduleOptions
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferConfig::class, 'Google_Service_BigQueryDataTransfer_TransferConfig');
