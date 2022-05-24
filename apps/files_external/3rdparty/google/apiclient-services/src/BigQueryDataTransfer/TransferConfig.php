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
  /**
   * @var int
   */
  public $dataRefreshWindowDays;
  /**
   * @var string
   */
  public $dataSourceId;
  /**
   * @var string
   */
  public $datasetRegion;
  /**
   * @var string
   */
  public $destinationDatasetId;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $displayName;
  protected $emailPreferencesType = EmailPreferences::class;
  protected $emailPreferencesDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nextRunTime;
  /**
   * @var string
   */
  public $notificationPubsubTopic;
  protected $ownerInfoType = UserInfo::class;
  protected $ownerInfoDataType = '';
  /**
   * @var array[]
   */
  public $params;
  /**
   * @var string
   */
  public $schedule;
  protected $scheduleOptionsType = ScheduleOptions::class;
  protected $scheduleOptionsDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param int
   */
  public function setDataRefreshWindowDays($dataRefreshWindowDays)
  {
    $this->dataRefreshWindowDays = $dataRefreshWindowDays;
  }
  /**
   * @return int
   */
  public function getDataRefreshWindowDays()
  {
    return $this->dataRefreshWindowDays;
  }
  /**
   * @param string
   */
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  /**
   * @return string
   */
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  /**
   * @param string
   */
  public function setDatasetRegion($datasetRegion)
  {
    $this->datasetRegion = $datasetRegion;
  }
  /**
   * @return string
   */
  public function getDatasetRegion()
  {
    return $this->datasetRegion;
  }
  /**
   * @param string
   */
  public function setDestinationDatasetId($destinationDatasetId)
  {
    $this->destinationDatasetId = $destinationDatasetId;
  }
  /**
   * @return string
   */
  public function getDestinationDatasetId()
  {
    return $this->destinationDatasetId;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setNextRunTime($nextRunTime)
  {
    $this->nextRunTime = $nextRunTime;
  }
  /**
   * @return string
   */
  public function getNextRunTime()
  {
    return $this->nextRunTime;
  }
  /**
   * @param string
   */
  public function setNotificationPubsubTopic($notificationPubsubTopic)
  {
    $this->notificationPubsubTopic = $notificationPubsubTopic;
  }
  /**
   * @return string
   */
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
  /**
   * @param array[]
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return array[]
   */
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param string
   */
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferConfig::class, 'Google_Service_BigQueryDataTransfer_TransferConfig');
