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

namespace Google\Service\Vault;

class ExportOptions extends \Google\Model
{
  protected $driveOptionsType = DriveExportOptions::class;
  protected $driveOptionsDataType = '';
  protected $groupsOptionsType = GroupsExportOptions::class;
  protected $groupsOptionsDataType = '';
  protected $hangoutsChatOptionsType = HangoutsChatExportOptions::class;
  protected $hangoutsChatOptionsDataType = '';
  protected $mailOptionsType = MailExportOptions::class;
  protected $mailOptionsDataType = '';
  /**
   * @var string
   */
  public $region;
  protected $voiceOptionsType = VoiceExportOptions::class;
  protected $voiceOptionsDataType = '';

  /**
   * @param DriveExportOptions
   */
  public function setDriveOptions(DriveExportOptions $driveOptions)
  {
    $this->driveOptions = $driveOptions;
  }
  /**
   * @return DriveExportOptions
   */
  public function getDriveOptions()
  {
    return $this->driveOptions;
  }
  /**
   * @param GroupsExportOptions
   */
  public function setGroupsOptions(GroupsExportOptions $groupsOptions)
  {
    $this->groupsOptions = $groupsOptions;
  }
  /**
   * @return GroupsExportOptions
   */
  public function getGroupsOptions()
  {
    return $this->groupsOptions;
  }
  /**
   * @param HangoutsChatExportOptions
   */
  public function setHangoutsChatOptions(HangoutsChatExportOptions $hangoutsChatOptions)
  {
    $this->hangoutsChatOptions = $hangoutsChatOptions;
  }
  /**
   * @return HangoutsChatExportOptions
   */
  public function getHangoutsChatOptions()
  {
    return $this->hangoutsChatOptions;
  }
  /**
   * @param MailExportOptions
   */
  public function setMailOptions(MailExportOptions $mailOptions)
  {
    $this->mailOptions = $mailOptions;
  }
  /**
   * @return MailExportOptions
   */
  public function getMailOptions()
  {
    return $this->mailOptions;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param VoiceExportOptions
   */
  public function setVoiceOptions(VoiceExportOptions $voiceOptions)
  {
    $this->voiceOptions = $voiceOptions;
  }
  /**
   * @return VoiceExportOptions
   */
  public function getVoiceOptions()
  {
    return $this->voiceOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExportOptions::class, 'Google_Service_Vault_ExportOptions');
