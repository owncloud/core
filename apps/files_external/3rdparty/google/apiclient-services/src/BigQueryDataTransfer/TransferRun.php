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

class TransferRun extends \Google\Model
{
  /**
   * @var string
   */
  public $dataSourceId;
  /**
   * @var string
   */
  public $destinationDatasetId;
  protected $emailPreferencesType = EmailPreferences::class;
  protected $emailPreferencesDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $errorStatusType = Status::class;
  protected $errorStatusDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notificationPubsubTopic;
  /**
   * @var array[]
   */
  public $params;
  /**
   * @var string
   */
  public $runTime;
  /**
   * @var string
   */
  public $schedule;
  /**
   * @var string
   */
  public $scheduleTime;
  /**
   * @var string
   */
  public $startTime;
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
   * @param Status
   */
  public function setErrorStatus(Status $errorStatus)
  {
    $this->errorStatus = $errorStatus;
  }
  /**
   * @return Status
   */
  public function getErrorStatus()
  {
    return $this->errorStatus;
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
  public function setRunTime($runTime)
  {
    $this->runTime = $runTime;
  }
  /**
   * @return string
   */
  public function getRunTime()
  {
    return $this->runTime;
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
   * @param string
   */
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  /**
   * @return string
   */
  public function getScheduleTime()
  {
    return $this->scheduleTime;
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
class_alias(TransferRun::class, 'Google_Service_BigQueryDataTransfer_TransferRun');
