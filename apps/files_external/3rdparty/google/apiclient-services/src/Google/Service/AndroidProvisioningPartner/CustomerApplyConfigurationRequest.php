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

class Google_Service_AndroidProvisioningPartner_CustomerApplyConfigurationRequest extends Google_Model
{
  public $configuration;
  protected $deviceType = 'Google_Service_AndroidProvisioningPartner_DeviceReference';
  protected $deviceDataType = '';

  public function setConfiguration($configuration)
  {
    $this->configuration = $configuration;
  }
  public function getConfiguration()
  {
    return $this->configuration;
  }
  /**
   * @param Google_Service_AndroidProvisioningPartner_DeviceReference
   */
  public function setDevice(Google_Service_AndroidProvisioningPartner_DeviceReference $device)
  {
    $this->device = $device;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_DeviceReference
   */
  public function getDevice()
  {
    return $this->device;
  }
}
