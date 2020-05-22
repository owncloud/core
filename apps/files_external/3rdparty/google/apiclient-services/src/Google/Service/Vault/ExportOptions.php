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

class Google_Service_Vault_ExportOptions extends Google_Model
{
  protected $driveOptionsType = 'Google_Service_Vault_DriveExportOptions';
  protected $driveOptionsDataType = '';
  protected $groupsOptionsType = 'Google_Service_Vault_GroupsExportOptions';
  protected $groupsOptionsDataType = '';
  protected $hangoutsChatOptionsType = 'Google_Service_Vault_HangoutsChatExportOptions';
  protected $hangoutsChatOptionsDataType = '';
  protected $mailOptionsType = 'Google_Service_Vault_MailExportOptions';
  protected $mailOptionsDataType = '';
  public $region;

  /**
   * @param Google_Service_Vault_DriveExportOptions
   */
  public function setDriveOptions(Google_Service_Vault_DriveExportOptions $driveOptions)
  {
    $this->driveOptions = $driveOptions;
  }
  /**
   * @return Google_Service_Vault_DriveExportOptions
   */
  public function getDriveOptions()
  {
    return $this->driveOptions;
  }
  /**
   * @param Google_Service_Vault_GroupsExportOptions
   */
  public function setGroupsOptions(Google_Service_Vault_GroupsExportOptions $groupsOptions)
  {
    $this->groupsOptions = $groupsOptions;
  }
  /**
   * @return Google_Service_Vault_GroupsExportOptions
   */
  public function getGroupsOptions()
  {
    return $this->groupsOptions;
  }
  /**
   * @param Google_Service_Vault_HangoutsChatExportOptions
   */
  public function setHangoutsChatOptions(Google_Service_Vault_HangoutsChatExportOptions $hangoutsChatOptions)
  {
    $this->hangoutsChatOptions = $hangoutsChatOptions;
  }
  /**
   * @return Google_Service_Vault_HangoutsChatExportOptions
   */
  public function getHangoutsChatOptions()
  {
    return $this->hangoutsChatOptions;
  }
  /**
   * @param Google_Service_Vault_MailExportOptions
   */
  public function setMailOptions(Google_Service_Vault_MailExportOptions $mailOptions)
  {
    $this->mailOptions = $mailOptions;
  }
  /**
   * @return Google_Service_Vault_MailExportOptions
   */
  public function getMailOptions()
  {
    return $this->mailOptions;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
}
