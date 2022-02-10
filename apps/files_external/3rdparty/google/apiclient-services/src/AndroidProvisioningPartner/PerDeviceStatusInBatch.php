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

class PerDeviceStatusInBatch extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var string
   */
  public $errorIdentifier;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $status;

  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param string
   */
  public function setErrorIdentifier($errorIdentifier)
  {
    $this->errorIdentifier = $errorIdentifier;
  }
  /**
   * @return string
   */
  public function getErrorIdentifier()
  {
    return $this->errorIdentifier;
  }
  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerDeviceStatusInBatch::class, 'Google_Service_AndroidProvisioningPartner_PerDeviceStatusInBatch');
