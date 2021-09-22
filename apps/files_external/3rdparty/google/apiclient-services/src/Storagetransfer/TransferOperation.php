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

class TransferOperation extends \Google\Collection
{
  protected $collection_key = 'errorBreakdowns';
  protected $countersType = TransferCounters::class;
  protected $countersDataType = '';
  public $endTime;
  protected $errorBreakdownsType = ErrorSummary::class;
  protected $errorBreakdownsDataType = 'array';
  public $name;
  protected $notificationConfigType = NotificationConfig::class;
  protected $notificationConfigDataType = '';
  public $projectId;
  public $startTime;
  public $status;
  public $transferJobName;
  protected $transferSpecType = TransferSpec::class;
  protected $transferSpecDataType = '';

  /**
   * @param TransferCounters
   */
  public function setCounters(TransferCounters $counters)
  {
    $this->counters = $counters;
  }
  /**
   * @return TransferCounters
   */
  public function getCounters()
  {
    return $this->counters;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param ErrorSummary[]
   */
  public function setErrorBreakdowns($errorBreakdowns)
  {
    $this->errorBreakdowns = $errorBreakdowns;
  }
  /**
   * @return ErrorSummary[]
   */
  public function getErrorBreakdowns()
  {
    return $this->errorBreakdowns;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTransferJobName($transferJobName)
  {
    $this->transferJobName = $transferJobName;
  }
  public function getTransferJobName()
  {
    return $this->transferJobName;
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
class_alias(TransferOperation::class, 'Google_Service_Storagetransfer_TransferOperation');
