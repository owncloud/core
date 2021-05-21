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

class Google_Service_AIPlatformNotebooks_UpdateShieldedInstanceConfigRequest extends Google_Model
{
  protected $shieldedInstanceConfigType = 'Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig';
  protected $shieldedInstanceConfigDataType = '';

  /**
   * @param Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
}
