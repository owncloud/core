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

class Google_Service_CertificateAuthorityService_ReusableConfigWrapper extends Google_Model
{
  public $reusableConfig;
  protected $reusableConfigValuesType = 'Google_Service_CertificateAuthorityService_ReusableConfigValues';
  protected $reusableConfigValuesDataType = '';

  public function setReusableConfig($reusableConfig)
  {
    $this->reusableConfig = $reusableConfig;
  }
  public function getReusableConfig()
  {
    return $this->reusableConfig;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ReusableConfigValues
   */
  public function setReusableConfigValues(Google_Service_CertificateAuthorityService_ReusableConfigValues $reusableConfigValues)
  {
    $this->reusableConfigValues = $reusableConfigValues;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ReusableConfigValues
   */
  public function getReusableConfigValues()
  {
    return $this->reusableConfigValues;
  }
}
