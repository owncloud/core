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

class Query extends \Google\Model
{
  protected $accountInfoType = AccountInfo::class;
  protected $accountInfoDataType = '';
  public $corpus;
  public $dataScope;
  protected $driveOptionsType = DriveOptions::class;
  protected $driveOptionsDataType = '';
  public $endTime;
  protected $hangoutsChatInfoType = HangoutsChatInfo::class;
  protected $hangoutsChatInfoDataType = '';
  protected $hangoutsChatOptionsType = HangoutsChatOptions::class;
  protected $hangoutsChatOptionsDataType = '';
  protected $mailOptionsType = MailOptions::class;
  protected $mailOptionsDataType = '';
  public $method;
  protected $orgUnitInfoType = OrgUnitInfo::class;
  protected $orgUnitInfoDataType = '';
  public $searchMethod;
  protected $sharedDriveInfoType = SharedDriveInfo::class;
  protected $sharedDriveInfoDataType = '';
  public $startTime;
  protected $teamDriveInfoType = TeamDriveInfo::class;
  protected $teamDriveInfoDataType = '';
  public $terms;
  public $timeZone;
  protected $voiceOptionsType = VoiceOptions::class;
  protected $voiceOptionsDataType = '';

  /**
   * @param AccountInfo
   */
  public function setAccountInfo(AccountInfo $accountInfo)
  {
    $this->accountInfo = $accountInfo;
  }
  /**
   * @return AccountInfo
   */
  public function getAccountInfo()
  {
    return $this->accountInfo;
  }
  public function setCorpus($corpus)
  {
    $this->corpus = $corpus;
  }
  public function getCorpus()
  {
    return $this->corpus;
  }
  public function setDataScope($dataScope)
  {
    $this->dataScope = $dataScope;
  }
  public function getDataScope()
  {
    return $this->dataScope;
  }
  /**
   * @param DriveOptions
   */
  public function setDriveOptions(DriveOptions $driveOptions)
  {
    $this->driveOptions = $driveOptions;
  }
  /**
   * @return DriveOptions
   */
  public function getDriveOptions()
  {
    return $this->driveOptions;
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
   * @param HangoutsChatInfo
   */
  public function setHangoutsChatInfo(HangoutsChatInfo $hangoutsChatInfo)
  {
    $this->hangoutsChatInfo = $hangoutsChatInfo;
  }
  /**
   * @return HangoutsChatInfo
   */
  public function getHangoutsChatInfo()
  {
    return $this->hangoutsChatInfo;
  }
  /**
   * @param HangoutsChatOptions
   */
  public function setHangoutsChatOptions(HangoutsChatOptions $hangoutsChatOptions)
  {
    $this->hangoutsChatOptions = $hangoutsChatOptions;
  }
  /**
   * @return HangoutsChatOptions
   */
  public function getHangoutsChatOptions()
  {
    return $this->hangoutsChatOptions;
  }
  /**
   * @param MailOptions
   */
  public function setMailOptions(MailOptions $mailOptions)
  {
    $this->mailOptions = $mailOptions;
  }
  /**
   * @return MailOptions
   */
  public function getMailOptions()
  {
    return $this->mailOptions;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param OrgUnitInfo
   */
  public function setOrgUnitInfo(OrgUnitInfo $orgUnitInfo)
  {
    $this->orgUnitInfo = $orgUnitInfo;
  }
  /**
   * @return OrgUnitInfo
   */
  public function getOrgUnitInfo()
  {
    return $this->orgUnitInfo;
  }
  public function setSearchMethod($searchMethod)
  {
    $this->searchMethod = $searchMethod;
  }
  public function getSearchMethod()
  {
    return $this->searchMethod;
  }
  /**
   * @param SharedDriveInfo
   */
  public function setSharedDriveInfo(SharedDriveInfo $sharedDriveInfo)
  {
    $this->sharedDriveInfo = $sharedDriveInfo;
  }
  /**
   * @return SharedDriveInfo
   */
  public function getSharedDriveInfo()
  {
    return $this->sharedDriveInfo;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param TeamDriveInfo
   */
  public function setTeamDriveInfo(TeamDriveInfo $teamDriveInfo)
  {
    $this->teamDriveInfo = $teamDriveInfo;
  }
  /**
   * @return TeamDriveInfo
   */
  public function getTeamDriveInfo()
  {
    return $this->teamDriveInfo;
  }
  public function setTerms($terms)
  {
    $this->terms = $terms;
  }
  public function getTerms()
  {
    return $this->terms;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param VoiceOptions
   */
  public function setVoiceOptions(VoiceOptions $voiceOptions)
  {
    $this->voiceOptions = $voiceOptions;
  }
  /**
   * @return VoiceOptions
   */
  public function getVoiceOptions()
  {
    return $this->voiceOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Query::class, 'Google_Service_Vault_Query');
