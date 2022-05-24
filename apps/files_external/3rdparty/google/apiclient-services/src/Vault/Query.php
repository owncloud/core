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
  /**
   * @var string
   */
  public $corpus;
  /**
   * @var string
   */
  public $dataScope;
  protected $driveOptionsType = DriveOptions::class;
  protected $driveOptionsDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $hangoutsChatInfoType = HangoutsChatInfo::class;
  protected $hangoutsChatInfoDataType = '';
  protected $hangoutsChatOptionsType = HangoutsChatOptions::class;
  protected $hangoutsChatOptionsDataType = '';
  protected $mailOptionsType = MailOptions::class;
  protected $mailOptionsDataType = '';
  /**
   * @var string
   */
  public $method;
  protected $orgUnitInfoType = OrgUnitInfo::class;
  protected $orgUnitInfoDataType = '';
  /**
   * @var string
   */
  public $searchMethod;
  protected $sharedDriveInfoType = SharedDriveInfo::class;
  protected $sharedDriveInfoDataType = '';
  protected $sitesUrlInfoType = SitesUrlInfo::class;
  protected $sitesUrlInfoDataType = '';
  /**
   * @var string
   */
  public $startTime;
  protected $teamDriveInfoType = TeamDriveInfo::class;
  protected $teamDriveInfoDataType = '';
  /**
   * @var string
   */
  public $terms;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setCorpus($corpus)
  {
    $this->corpus = $corpus;
  }
  /**
   * @return string
   */
  public function getCorpus()
  {
    return $this->corpus;
  }
  /**
   * @param string
   */
  public function setDataScope($dataScope)
  {
    $this->dataScope = $dataScope;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSearchMethod($searchMethod)
  {
    $this->searchMethod = $searchMethod;
  }
  /**
   * @return string
   */
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
  /**
   * @param SitesUrlInfo
   */
  public function setSitesUrlInfo(SitesUrlInfo $sitesUrlInfo)
  {
    $this->sitesUrlInfo = $sitesUrlInfo;
  }
  /**
   * @return SitesUrlInfo
   */
  public function getSitesUrlInfo()
  {
    return $this->sitesUrlInfo;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setTerms($terms)
  {
    $this->terms = $terms;
  }
  /**
   * @return string
   */
  public function getTerms()
  {
    return $this->terms;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
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
