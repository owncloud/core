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

namespace Google\Service\Contentwarehouse;

class AssistantApiLoggingOnlyData extends \Google\Model
{
  /**
   * @var string
   */
  public $acpVersion;
  /**
   * @var string
   */
  public $appVersion;
  /**
   * @var string
   */
  public $assistantSettingsSource;
  /**
   * @var string
   */
  public $boardName;
  /**
   * @var string
   */
  public $boardRevision;
  protected $castAssistantSettingLinkingResultType = AssistantApiCastAssistantSettingLinkingResult::class;
  protected $castAssistantSettingLinkingResultDataType = '';
  /**
   * @var string
   */
  public $deviceModel;
  /**
   * @var string
   */
  public $embedderBuildInfo;
  /**
   * @var string
   */
  public $initialAppVersion;
  /**
   * @var string
   */
  public $mdnsDisplayName;
  /**
   * @var string
   */
  public $platformBuild;
  /**
   * @var string
   */
  public $virtualReleaseChannel;

  /**
   * @param string
   */
  public function setAcpVersion($acpVersion)
  {
    $this->acpVersion = $acpVersion;
  }
  /**
   * @return string
   */
  public function getAcpVersion()
  {
    return $this->acpVersion;
  }
  /**
   * @param string
   */
  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  /**
   * @return string
   */
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  /**
   * @param string
   */
  public function setAssistantSettingsSource($assistantSettingsSource)
  {
    $this->assistantSettingsSource = $assistantSettingsSource;
  }
  /**
   * @return string
   */
  public function getAssistantSettingsSource()
  {
    return $this->assistantSettingsSource;
  }
  /**
   * @param string
   */
  public function setBoardName($boardName)
  {
    $this->boardName = $boardName;
  }
  /**
   * @return string
   */
  public function getBoardName()
  {
    return $this->boardName;
  }
  /**
   * @param string
   */
  public function setBoardRevision($boardRevision)
  {
    $this->boardRevision = $boardRevision;
  }
  /**
   * @return string
   */
  public function getBoardRevision()
  {
    return $this->boardRevision;
  }
  /**
   * @param AssistantApiCastAssistantSettingLinkingResult
   */
  public function setCastAssistantSettingLinkingResult(AssistantApiCastAssistantSettingLinkingResult $castAssistantSettingLinkingResult)
  {
    $this->castAssistantSettingLinkingResult = $castAssistantSettingLinkingResult;
  }
  /**
   * @return AssistantApiCastAssistantSettingLinkingResult
   */
  public function getCastAssistantSettingLinkingResult()
  {
    return $this->castAssistantSettingLinkingResult;
  }
  /**
   * @param string
   */
  public function setDeviceModel($deviceModel)
  {
    $this->deviceModel = $deviceModel;
  }
  /**
   * @return string
   */
  public function getDeviceModel()
  {
    return $this->deviceModel;
  }
  /**
   * @param string
   */
  public function setEmbedderBuildInfo($embedderBuildInfo)
  {
    $this->embedderBuildInfo = $embedderBuildInfo;
  }
  /**
   * @return string
   */
  public function getEmbedderBuildInfo()
  {
    return $this->embedderBuildInfo;
  }
  /**
   * @param string
   */
  public function setInitialAppVersion($initialAppVersion)
  {
    $this->initialAppVersion = $initialAppVersion;
  }
  /**
   * @return string
   */
  public function getInitialAppVersion()
  {
    return $this->initialAppVersion;
  }
  /**
   * @param string
   */
  public function setMdnsDisplayName($mdnsDisplayName)
  {
    $this->mdnsDisplayName = $mdnsDisplayName;
  }
  /**
   * @return string
   */
  public function getMdnsDisplayName()
  {
    return $this->mdnsDisplayName;
  }
  /**
   * @param string
   */
  public function setPlatformBuild($platformBuild)
  {
    $this->platformBuild = $platformBuild;
  }
  /**
   * @return string
   */
  public function getPlatformBuild()
  {
    return $this->platformBuild;
  }
  /**
   * @param string
   */
  public function setVirtualReleaseChannel($virtualReleaseChannel)
  {
    $this->virtualReleaseChannel = $virtualReleaseChannel;
  }
  /**
   * @return string
   */
  public function getVirtualReleaseChannel()
  {
    return $this->virtualReleaseChannel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiLoggingOnlyData::class, 'Google_Service_Contentwarehouse_AssistantApiLoggingOnlyData');
