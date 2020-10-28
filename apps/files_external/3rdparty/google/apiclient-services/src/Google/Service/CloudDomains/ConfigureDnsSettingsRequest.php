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

class Google_Service_CloudDomains_ConfigureDnsSettingsRequest extends Google_Model
{
  protected $dnsSettingsType = 'Google_Service_CloudDomains_DnsSettings';
  protected $dnsSettingsDataType = '';
  public $updateMask;
  public $validateOnly;

  /**
   * @param Google_Service_CloudDomains_DnsSettings
   */
  public function setDnsSettings(Google_Service_CloudDomains_DnsSettings $dnsSettings)
  {
    $this->dnsSettings = $dnsSettings;
  }
  /**
   * @return Google_Service_CloudDomains_DnsSettings
   */
  public function getDnsSettings()
  {
    return $this->dnsSettings;
  }
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
