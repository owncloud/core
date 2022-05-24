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

namespace Google\Service\DisplayVideo;

class Creative extends \Google\Collection
{
  protected $collection_key = 'transcodes';
  protected $additionalDimensionsType = Dimensions::class;
  protected $additionalDimensionsDataType = 'array';
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $appendedTag;
  protected $assetsType = AssetAssociation::class;
  protected $assetsDataType = 'array';
  /**
   * @var string
   */
  public $cmPlacementId;
  protected $cmTrackingAdType = CmTrackingAd::class;
  protected $cmTrackingAdDataType = '';
  /**
   * @var string[]
   */
  public $companionCreativeIds;
  protected $counterEventsType = CounterEvent::class;
  protected $counterEventsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string[]
   */
  public $creativeAttributes;
  /**
   * @var string
   */
  public $creativeId;
  /**
   * @var string
   */
  public $creativeType;
  protected $dimensionsType = Dimensions::class;
  protected $dimensionsDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $dynamic;
  /**
   * @var string
   */
  public $entityStatus;
  protected $exitEventsType = ExitEvent::class;
  protected $exitEventsDataType = 'array';
  /**
   * @var bool
   */
  public $expandOnHover;
  /**
   * @var string
   */
  public $expandingDirection;
  /**
   * @var string
   */
  public $hostingSource;
  /**
   * @var bool
   */
  public $html5Video;
  /**
   * @var bool
   */
  public $iasCampaignMonitoring;
  /**
   * @var string
   */
  public $integrationCode;
  /**
   * @var string
   */
  public $jsTrackerUrl;
  /**
   * @var string[]
   */
  public $lineItemIds;
  /**
   * @var string
   */
  public $mediaDuration;
  /**
   * @var bool
   */
  public $mp3Audio;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  protected $obaIconType = ObaIcon::class;
  protected $obaIconDataType = '';
  /**
   * @var bool
   */
  public $oggAudio;
  protected $progressOffsetType = AudioVideoOffset::class;
  protected $progressOffsetDataType = '';
  /**
   * @var bool
   */
  public $requireHtml5;
  /**
   * @var bool
   */
  public $requireMraid;
  /**
   * @var bool
   */
  public $requirePingForAttribution;
  protected $reviewStatusType = ReviewStatusInfo::class;
  protected $reviewStatusDataType = '';
  protected $skipOffsetType = AudioVideoOffset::class;
  protected $skipOffsetDataType = '';
  /**
   * @var bool
   */
  public $skippable;
  /**
   * @var string
   */
  public $thirdPartyTag;
  protected $thirdPartyUrlsType = ThirdPartyUrl::class;
  protected $thirdPartyUrlsDataType = 'array';
  protected $timerEventsType = TimerEvent::class;
  protected $timerEventsDataType = 'array';
  /**
   * @var string[]
   */
  public $trackerUrls;
  protected $transcodesType = Transcode::class;
  protected $transcodesDataType = 'array';
  protected $universalAdIdType = UniversalAdId::class;
  protected $universalAdIdDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $vastTagUrl;
  /**
   * @var bool
   */
  public $vpaid;

  /**
   * @param Dimensions[]
   */
  public function setAdditionalDimensions($additionalDimensions)
  {
    $this->additionalDimensions = $additionalDimensions;
  }
  /**
   * @return Dimensions[]
   */
  public function getAdditionalDimensions()
  {
    return $this->additionalDimensions;
  }
  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setAppendedTag($appendedTag)
  {
    $this->appendedTag = $appendedTag;
  }
  /**
   * @return string
   */
  public function getAppendedTag()
  {
    return $this->appendedTag;
  }
  /**
   * @param AssetAssociation[]
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return AssetAssociation[]
   */
  public function getAssets()
  {
    return $this->assets;
  }
  /**
   * @param string
   */
  public function setCmPlacementId($cmPlacementId)
  {
    $this->cmPlacementId = $cmPlacementId;
  }
  /**
   * @return string
   */
  public function getCmPlacementId()
  {
    return $this->cmPlacementId;
  }
  /**
   * @param CmTrackingAd
   */
  public function setCmTrackingAd(CmTrackingAd $cmTrackingAd)
  {
    $this->cmTrackingAd = $cmTrackingAd;
  }
  /**
   * @return CmTrackingAd
   */
  public function getCmTrackingAd()
  {
    return $this->cmTrackingAd;
  }
  /**
   * @param string[]
   */
  public function setCompanionCreativeIds($companionCreativeIds)
  {
    $this->companionCreativeIds = $companionCreativeIds;
  }
  /**
   * @return string[]
   */
  public function getCompanionCreativeIds()
  {
    return $this->companionCreativeIds;
  }
  /**
   * @param CounterEvent[]
   */
  public function setCounterEvents($counterEvents)
  {
    $this->counterEvents = $counterEvents;
  }
  /**
   * @return CounterEvent[]
   */
  public function getCounterEvents()
  {
    return $this->counterEvents;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string[]
   */
  public function setCreativeAttributes($creativeAttributes)
  {
    $this->creativeAttributes = $creativeAttributes;
  }
  /**
   * @return string[]
   */
  public function getCreativeAttributes()
  {
    return $this->creativeAttributes;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param string
   */
  public function setCreativeType($creativeType)
  {
    $this->creativeType = $creativeType;
  }
  /**
   * @return string
   */
  public function getCreativeType()
  {
    return $this->creativeType;
  }
  /**
   * @param Dimensions
   */
  public function setDimensions(Dimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Dimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setDynamic($dynamic)
  {
    $this->dynamic = $dynamic;
  }
  /**
   * @return bool
   */
  public function getDynamic()
  {
    return $this->dynamic;
  }
  /**
   * @param string
   */
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
  /**
   * @return string
   */
  public function getEntityStatus()
  {
    return $this->entityStatus;
  }
  /**
   * @param ExitEvent[]
   */
  public function setExitEvents($exitEvents)
  {
    $this->exitEvents = $exitEvents;
  }
  /**
   * @return ExitEvent[]
   */
  public function getExitEvents()
  {
    return $this->exitEvents;
  }
  /**
   * @param bool
   */
  public function setExpandOnHover($expandOnHover)
  {
    $this->expandOnHover = $expandOnHover;
  }
  /**
   * @return bool
   */
  public function getExpandOnHover()
  {
    return $this->expandOnHover;
  }
  /**
   * @param string
   */
  public function setExpandingDirection($expandingDirection)
  {
    $this->expandingDirection = $expandingDirection;
  }
  /**
   * @return string
   */
  public function getExpandingDirection()
  {
    return $this->expandingDirection;
  }
  /**
   * @param string
   */
  public function setHostingSource($hostingSource)
  {
    $this->hostingSource = $hostingSource;
  }
  /**
   * @return string
   */
  public function getHostingSource()
  {
    return $this->hostingSource;
  }
  /**
   * @param bool
   */
  public function setHtml5Video($html5Video)
  {
    $this->html5Video = $html5Video;
  }
  /**
   * @return bool
   */
  public function getHtml5Video()
  {
    return $this->html5Video;
  }
  /**
   * @param bool
   */
  public function setIasCampaignMonitoring($iasCampaignMonitoring)
  {
    $this->iasCampaignMonitoring = $iasCampaignMonitoring;
  }
  /**
   * @return bool
   */
  public function getIasCampaignMonitoring()
  {
    return $this->iasCampaignMonitoring;
  }
  /**
   * @param string
   */
  public function setIntegrationCode($integrationCode)
  {
    $this->integrationCode = $integrationCode;
  }
  /**
   * @return string
   */
  public function getIntegrationCode()
  {
    return $this->integrationCode;
  }
  /**
   * @param string
   */
  public function setJsTrackerUrl($jsTrackerUrl)
  {
    $this->jsTrackerUrl = $jsTrackerUrl;
  }
  /**
   * @return string
   */
  public function getJsTrackerUrl()
  {
    return $this->jsTrackerUrl;
  }
  /**
   * @param string[]
   */
  public function setLineItemIds($lineItemIds)
  {
    $this->lineItemIds = $lineItemIds;
  }
  /**
   * @return string[]
   */
  public function getLineItemIds()
  {
    return $this->lineItemIds;
  }
  /**
   * @param string
   */
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  /**
   * @return string
   */
  public function getMediaDuration()
  {
    return $this->mediaDuration;
  }
  /**
   * @param bool
   */
  public function setMp3Audio($mp3Audio)
  {
    $this->mp3Audio = $mp3Audio;
  }
  /**
   * @return bool
   */
  public function getMp3Audio()
  {
    return $this->mp3Audio;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param ObaIcon
   */
  public function setObaIcon(ObaIcon $obaIcon)
  {
    $this->obaIcon = $obaIcon;
  }
  /**
   * @return ObaIcon
   */
  public function getObaIcon()
  {
    return $this->obaIcon;
  }
  /**
   * @param bool
   */
  public function setOggAudio($oggAudio)
  {
    $this->oggAudio = $oggAudio;
  }
  /**
   * @return bool
   */
  public function getOggAudio()
  {
    return $this->oggAudio;
  }
  /**
   * @param AudioVideoOffset
   */
  public function setProgressOffset(AudioVideoOffset $progressOffset)
  {
    $this->progressOffset = $progressOffset;
  }
  /**
   * @return AudioVideoOffset
   */
  public function getProgressOffset()
  {
    return $this->progressOffset;
  }
  /**
   * @param bool
   */
  public function setRequireHtml5($requireHtml5)
  {
    $this->requireHtml5 = $requireHtml5;
  }
  /**
   * @return bool
   */
  public function getRequireHtml5()
  {
    return $this->requireHtml5;
  }
  /**
   * @param bool
   */
  public function setRequireMraid($requireMraid)
  {
    $this->requireMraid = $requireMraid;
  }
  /**
   * @return bool
   */
  public function getRequireMraid()
  {
    return $this->requireMraid;
  }
  /**
   * @param bool
   */
  public function setRequirePingForAttribution($requirePingForAttribution)
  {
    $this->requirePingForAttribution = $requirePingForAttribution;
  }
  /**
   * @return bool
   */
  public function getRequirePingForAttribution()
  {
    return $this->requirePingForAttribution;
  }
  /**
   * @param ReviewStatusInfo
   */
  public function setReviewStatus(ReviewStatusInfo $reviewStatus)
  {
    $this->reviewStatus = $reviewStatus;
  }
  /**
   * @return ReviewStatusInfo
   */
  public function getReviewStatus()
  {
    return $this->reviewStatus;
  }
  /**
   * @param AudioVideoOffset
   */
  public function setSkipOffset(AudioVideoOffset $skipOffset)
  {
    $this->skipOffset = $skipOffset;
  }
  /**
   * @return AudioVideoOffset
   */
  public function getSkipOffset()
  {
    return $this->skipOffset;
  }
  /**
   * @param bool
   */
  public function setSkippable($skippable)
  {
    $this->skippable = $skippable;
  }
  /**
   * @return bool
   */
  public function getSkippable()
  {
    return $this->skippable;
  }
  /**
   * @param string
   */
  public function setThirdPartyTag($thirdPartyTag)
  {
    $this->thirdPartyTag = $thirdPartyTag;
  }
  /**
   * @return string
   */
  public function getThirdPartyTag()
  {
    return $this->thirdPartyTag;
  }
  /**
   * @param ThirdPartyUrl[]
   */
  public function setThirdPartyUrls($thirdPartyUrls)
  {
    $this->thirdPartyUrls = $thirdPartyUrls;
  }
  /**
   * @return ThirdPartyUrl[]
   */
  public function getThirdPartyUrls()
  {
    return $this->thirdPartyUrls;
  }
  /**
   * @param TimerEvent[]
   */
  public function setTimerEvents($timerEvents)
  {
    $this->timerEvents = $timerEvents;
  }
  /**
   * @return TimerEvent[]
   */
  public function getTimerEvents()
  {
    return $this->timerEvents;
  }
  /**
   * @param string[]
   */
  public function setTrackerUrls($trackerUrls)
  {
    $this->trackerUrls = $trackerUrls;
  }
  /**
   * @return string[]
   */
  public function getTrackerUrls()
  {
    return $this->trackerUrls;
  }
  /**
   * @param Transcode[]
   */
  public function setTranscodes($transcodes)
  {
    $this->transcodes = $transcodes;
  }
  /**
   * @return Transcode[]
   */
  public function getTranscodes()
  {
    return $this->transcodes;
  }
  /**
   * @param UniversalAdId
   */
  public function setUniversalAdId(UniversalAdId $universalAdId)
  {
    $this->universalAdId = $universalAdId;
  }
  /**
   * @return UniversalAdId
   */
  public function getUniversalAdId()
  {
    return $this->universalAdId;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setVastTagUrl($vastTagUrl)
  {
    $this->vastTagUrl = $vastTagUrl;
  }
  /**
   * @return string
   */
  public function getVastTagUrl()
  {
    return $this->vastTagUrl;
  }
  /**
   * @param bool
   */
  public function setVpaid($vpaid)
  {
    $this->vpaid = $vpaid;
  }
  /**
   * @return bool
   */
  public function getVpaid()
  {
    return $this->vpaid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creative::class, 'Google_Service_DisplayVideo_Creative');
