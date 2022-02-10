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

namespace Google\Service\AndroidProvisioningPartner;

class DevicesLongRunningOperationMetadata extends \Google\Model
{
  /**
   * @var int
   */
  public $devicesCount;
  /**
   * @var string
   */
  public $processingStatus;
  /**
   * @var int
   */
  public $progress;

  /**
   * @param int
   */
  public function setDevicesCount($devicesCount)
  {
    $this->devicesCount = $devicesCount;
  }
  /**
   * @return int
   */
  public function getDevicesCount()
  {
    return $this->devicesCount;
  }
  /**
   * @param string
   */
  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }
  /**
   * @return string
   */
  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }
  /**
   * @param int
   */
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return int
   */
  public function getProgress()
  {
    return $this->progress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DevicesLongRunningOperationMetadata::class, 'Google_Service_AndroidProvisioningPartner_DevicesLongRunningOperationMetadata');
