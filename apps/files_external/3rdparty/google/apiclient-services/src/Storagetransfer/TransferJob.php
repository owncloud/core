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

namespace Google\Service\Storagetransfer;

class TransferJob extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $deletionTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $lastModificationTime;
  /**
   * @var string
   */
  public $latestOperationName;
  protected $loggingConfigType = LoggingConfig::class;
  protected $loggingConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $notificationConfigType = NotificationConfig::class;
  protected $notificationConfigDataType = '';
  /**
   * @var string
   */
  public $projectId;
  protected $scheduleType = Schedule::class;
  protected $scheduleDataType = '';
  /**
   * @var string
   */
  public $status;
  protected $transferSpecType = TransferSpec::class;
  protected $transferSpecDataType = '';

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setDeletionTime($deletionTime)
  {
    $this->deletionTime = $deletionTime;
  }
  /**
   * @return string
   */
  public function getDeletionTime()
  {
    return $this->deletionTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setLastModificationTime($lastModificationTime)
  {
    $this->lastModificationTime = $lastModificationTime;
  }
  /**
   * @return string
   */
  public function getLastModificationTime()
  {
    return $this->lastModificationTime;
  }
  /**
   * @param string
   */
  public function setLatestOperationName($latestOperationName)
  {
    $this->latestOperationName = $latestOperationName;
  }
  /**
   * @return string
   */
  public function getLatestOperationName()
  {
    return $this->latestOperationName;
  }
  /**
   * @param LoggingConfig
   */
  public function setLoggingConfig(LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  /**
   * @return LoggingConfig
   */
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
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
   * @param NotificationConfig
   */
  public function setNotificationConfig(NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return NotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Schedule
   */
  public function setSchedule(Schedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Schedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param TransferSpec
   */
  public function setTransferSpec(TransferSpec $transferSpec)
  {
    $this->transferSpec = $transferSpec;
  }
  /**
   * @return TransferSpec
   */
  public function getTransferSpec()
  {
    return $this->transferSpec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferJob::class, 'Google_Service_Storagetransfer_TransferJob');
