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

namespace Google\Service\YouTube;

class Channel extends \Google\Model
{
  protected $auditDetailsType = ChannelAuditDetails::class;
  protected $auditDetailsDataType = '';
  protected $brandingSettingsType = ChannelBrandingSettings::class;
  protected $brandingSettingsDataType = '';
  protected $contentDetailsType = ChannelContentDetails::class;
  protected $contentDetailsDataType = '';
  protected $contentOwnerDetailsType = ChannelContentOwnerDetails::class;
  protected $contentOwnerDetailsDataType = '';
  protected $conversionPingsType = ChannelConversionPings::class;
  protected $conversionPingsDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $localizationsType = ChannelLocalization::class;
  protected $localizationsDataType = 'map';
  protected $snippetType = ChannelSnippet::class;
  protected $snippetDataType = '';
  protected $statisticsType = ChannelStatistics::class;
  protected $statisticsDataType = '';
  protected $statusType = ChannelStatus::class;
  protected $statusDataType = '';
  protected $topicDetailsType = ChannelTopicDetails::class;
  protected $topicDetailsDataType = '';

  /**
   * @param ChannelAuditDetails
   */
  public function setAuditDetails(ChannelAuditDetails $auditDetails)
  {
    $this->auditDetails = $auditDetails;
  }
  /**
   * @return ChannelAuditDetails
   */
  public function getAuditDetails()
  {
    return $this->auditDetails;
  }
  /**
   * @param ChannelBrandingSettings
   */
  public function setBrandingSettings(ChannelBrandingSettings $brandingSettings)
  {
    $this->brandingSettings = $brandingSettings;
  }
  /**
   * @return ChannelBrandingSettings
   */
  public function getBrandingSettings()
  {
    return $this->brandingSettings;
  }
  /**
   * @param ChannelContentDetails
   */
  public function setContentDetails(ChannelContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return ChannelContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  /**
   * @param ChannelContentOwnerDetails
   */
  public function setContentOwnerDetails(ChannelContentOwnerDetails $contentOwnerDetails)
  {
    $this->contentOwnerDetails = $contentOwnerDetails;
  }
  /**
   * @return ChannelContentOwnerDetails
   */
  public function getContentOwnerDetails()
  {
    return $this->contentOwnerDetails;
  }
  /**
   * @param ChannelConversionPings
   */
  public function setConversionPings(ChannelConversionPings $conversionPings)
  {
    $this->conversionPings = $conversionPings;
  }
  /**
   * @return ChannelConversionPings
   */
  public function getConversionPings()
  {
    return $this->conversionPings;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param ChannelLocalization[]
   */
  public function setLocalizations($localizations)
  {
    $this->localizations = $localizations;
  }
  /**
   * @return ChannelLocalization[]
   */
  public function getLocalizations()
  {
    return $this->localizations;
  }
  /**
   * @param ChannelSnippet
   */
  public function setSnippet(ChannelSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return ChannelSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param ChannelStatistics
   */
  public function setStatistics(ChannelStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return ChannelStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
  }
  /**
   * @param ChannelStatus
   */
  public function setStatus(ChannelStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return ChannelStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param ChannelTopicDetails
   */
  public function setTopicDetails(ChannelTopicDetails $topicDetails)
  {
    $this->topicDetails = $topicDetails;
  }
  /**
   * @return ChannelTopicDetails
   */
  public function getTopicDetails()
  {
    return $this->topicDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Channel::class, 'Google_Service_YouTube_Channel');
