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
  public $advertiserId;
  public $appendedTag;
  protected $assetsType = AssetAssociation::class;
  protected $assetsDataType = 'array';
  public $cmPlacementId;
  protected $cmTrackingAdType = CmTrackingAd::class;
  protected $cmTrackingAdDataType = '';
  public $companionCreativeIds;
  protected $counterEventsType = CounterEvent::class;
  protected $counterEventsDataType = 'array';
  public $createTime;
  public $creativeAttributes;
  public $creativeId;
  public $creativeType;
  protected $dimensionsType = Dimensions::class;
  protected $dimensionsDataType = '';
  public $displayName;
  public $dynamic;
  public $entityStatus;
  protected $exitEventsType = ExitEvent::class;
  protected $exitEventsDataType = 'array';
  public $expandOnHover;
  public $expandingDirection;
  public $hostingSource;
  public $html5Video;
  public $iasCampaignMonitoring;
  public $integrationCode;
  public $jsTrackerUrl;
  public $lineItemIds;
  public $mediaDuration;
  public $mp3Audio;
  public $name;
  public $notes;
  protected $obaIconType = ObaIcon::class;
  protected $obaIconDataType = '';
  public $oggAudio;
  protected $progressOffsetType = AudioVideoOffset::class;
  protected $progressOffsetDataType = '';
  public $requireHtml5;
  public $requireMraid;
  public $requirePingForAttribution;
  protected $reviewStatusType = ReviewStatusInfo::class;
  protected $reviewStatusDataType = '';
  protected $skipOffsetType = AudioVideoOffset::class;
  protected $skipOffsetDataType = '';
  public $skippable;
  public $thirdPartyTag;
  protected $thirdPartyUrlsType = ThirdPartyUrl::class;
  protected $thirdPartyUrlsDataType = 'array';
  protected $timerEventsType = TimerEvent::class;
  protected $timerEventsDataType = 'array';
  public $trackerUrls;
  protected $transcodesType = Transcode::class;
  protected $transcodesDataType = 'array';
  protected $universalAdIdType = UniversalAdId::class;
  protected $universalAdIdDataType = '';
  public $updateTime;
  public $vastTagUrl;
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
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAppendedTag($appendedTag)
  {
    $this->appendedTag = $appendedTag;
  }
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
  public function setCmPlacementId($cmPlacementId)
  {
    $this->cmPlacementId = $cmPlacementId;
  }
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
  public function setCompanionCreativeIds($companionCreativeIds)
  {
    $this->companionCreativeIds = $companionCreativeIds;
  }
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreativeAttributes($creativeAttributes)
  {
    $this->creativeAttributes = $creativeAttributes;
  }
  public function getCreativeAttributes()
  {
    return $this->creativeAttributes;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  public function setCreativeType($creativeType)
  {
    $this->creativeType = $creativeType;
  }
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDynamic($dynamic)
  {
    $this->dynamic = $dynamic;
  }
  public function getDynamic()
  {
    return $this->dynamic;
  }
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
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
  public function setExpandOnHover($expandOnHover)
  {
    $this->expandOnHover = $expandOnHover;
  }
  public function getExpandOnHover()
  {
    return $this->expandOnHover;
  }
  public function setExpandingDirection($expandingDirection)
  {
    $this->expandingDirection = $expandingDirection;
  }
  public function getExpandingDirection()
  {
    return $this->expandingDirection;
  }
  public function setHostingSource($hostingSource)
  {
    $this->hostingSource = $hostingSource;
  }
  public function getHostingSource()
  {
    return $this->hostingSource;
  }
  public function setHtml5Video($html5Video)
  {
    $this->html5Video = $html5Video;
  }
  public function getHtml5Video()
  {
    return $this->html5Video;
  }
  public function setIasCampaignMonitoring($iasCampaignMonitoring)
  {
    $this->iasCampaignMonitoring = $iasCampaignMonitoring;
  }
  public function getIasCampaignMonitoring()
  {
    return $this->iasCampaignMonitoring;
  }
  public function setIntegrationCode($integrationCode)
  {
    $this->integrationCode = $integrationCode;
  }
  public function getIntegrationCode()
  {
    return $this->integrationCode;
  }
  public function setJsTrackerUrl($jsTrackerUrl)
  {
    $this->jsTrackerUrl = $jsTrackerUrl;
  }
  public function getJsTrackerUrl()
  {
    return $this->jsTrackerUrl;
  }
  public function setLineItemIds($lineItemIds)
  {
    $this->lineItemIds = $lineItemIds;
  }
  public function getLineItemIds()
  {
    return $this->lineItemIds;
  }
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  public function getMediaDuration()
  {
    return $this->mediaDuration;
  }
  public function setMp3Audio($mp3Audio)
  {
    $this->mp3Audio = $mp3Audio;
  }
  public function getMp3Audio()
  {
    return $this->mp3Audio;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
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
  public function setOggAudio($oggAudio)
  {
    $this->oggAudio = $oggAudio;
  }
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
  public function setRequireHtml5($requireHtml5)
  {
    $this->requireHtml5 = $requireHtml5;
  }
  public function getRequireHtml5()
  {
    return $this->requireHtml5;
  }
  public function setRequireMraid($requireMraid)
  {
    $this->requireMraid = $requireMraid;
  }
  public function getRequireMraid()
  {
    return $this->requireMraid;
  }
  public function setRequirePingForAttribution($requirePingForAttribution)
  {
    $this->requirePingForAttribution = $requirePingForAttribution;
  }
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
  public function setSkippable($skippable)
  {
    $this->skippable = $skippable;
  }
  public function getSkippable()
  {
    return $this->skippable;
  }
  public function setThirdPartyTag($thirdPartyTag)
  {
    $this->thirdPartyTag = $thirdPartyTag;
  }
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
  public function setTrackerUrls($trackerUrls)
  {
    $this->trackerUrls = $trackerUrls;
  }
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
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVastTagUrl($vastTagUrl)
  {
    $this->vastTagUrl = $vastTagUrl;
  }
  public function getVastTagUrl()
  {
    return $this->vastTagUrl;
  }
  public function setVpaid($vpaid)
  {
    $this->vpaid = $vpaid;
  }
  public function getVpaid()
  {
    return $this->vpaid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creative::class, 'Google_Service_DisplayVideo_Creative');
