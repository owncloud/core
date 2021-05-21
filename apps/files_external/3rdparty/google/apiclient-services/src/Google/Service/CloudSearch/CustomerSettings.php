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

class Google_Service_CloudSearch_CustomerSettings extends Google_Model
{
  protected $auditLoggingSettingsType = 'Google_Service_CloudSearch_AuditLoggingSettings';
  protected $auditLoggingSettingsDataType = '';
  protected $vpcSettingsType = 'Google_Service_CloudSearch_VPCSettings';
  protected $vpcSettingsDataType = '';

  /**
   * @param Google_Service_CloudSearch_AuditLoggingSettings
   */
  public function setAuditLoggingSettings(Google_Service_CloudSearch_AuditLoggingSettings $auditLoggingSettings)
  {
    $this->auditLoggingSettings = $auditLoggingSettings;
  }
  /**
   * @return Google_Service_CloudSearch_AuditLoggingSettings
   */
  public function getAuditLoggingSettings()
  {
    return $this->auditLoggingSettings;
  }
  /**
   * @param Google_Service_CloudSearch_VPCSettings
   */
  public function setVpcSettings(Google_Service_CloudSearch_VPCSettings $vpcSettings)
  {
    $this->vpcSettings = $vpcSettings;
  }
  /**
   * @return Google_Service_CloudSearch_VPCSettings
   */
  public function getVpcSettings()
  {
    return $this->vpcSettings;
  }
}
