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

class BackupRun extends \Google\Model
{
  /**
   * @var string
   */
  public $backupKind;
  /**
   * @var string
   */
  public $description;
  protected $diskEncryptionConfigurationType = DiskEncryptionConfiguration::class;
  protected $diskEncryptionConfigurationDataType = '';
  protected $diskEncryptionStatusType = DiskEncryptionStatus::class;
  protected $diskEncryptionStatusDataType = '';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $enqueuedTime;
  protected $errorType = OperationError::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $instance;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $windowStartTime;

  /**
   * @param string
   */
  public function setBackupKind($backupKind)
  {
    $this->backupKind = $backupKind;
  }
  /**
   * @return string
   */
  public function getBackupKind()
  {
    return $this->backupKind;
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
   * @param DiskEncryptionConfiguration
   */
  public function setDiskEncryptionConfiguration(DiskEncryptionConfiguration $diskEncryptionConfiguration)
  {
    $this->diskEncryptionConfiguration = $diskEncryptionConfiguration;
  }
  /**
   * @return DiskEncryptionConfiguration
   */
  public function getDiskEncryptionConfiguration()
  {
    return $this->diskEncryptionConfiguration;
  }
  /**
   * @param DiskEncryptionStatus
   */
  public function setDiskEncryptionStatus(DiskEncryptionStatus $diskEncryptionStatus)
  {
    $this->diskEncryptionStatus = $diskEncryptionStatus;
  }
  /**
   * @return DiskEncryptionStatus
   */
  public function getDiskEncryptionStatus()
  {
    return $this->diskEncryptionStatus;
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
   * @param string
   */
  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }
  /**
   * @return string
   */
  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }
  /**
   * @param OperationError
   */
  public function setError(OperationError $error)
  {
    $this->error = $error;
  }
  /**
   * @return OperationError
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return string
   */
  public function getInstance()
  {
    return $this->instance;
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
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
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
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setWindowStartTime($windowStartTime)
  {
    $this->windowStartTime = $windowStartTime;
  }
  /**
   * @return string
   */
  public function getWindowStartTime()
  {
    return $this->windowStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackupRun::class, 'Google_Service_SQLAdmin_BackupRun');
