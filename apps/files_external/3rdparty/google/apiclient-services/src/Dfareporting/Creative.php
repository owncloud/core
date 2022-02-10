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

namespace Google\Service\Dfareporting;

class Creative extends \Google\Collection
{
  protected $collection_key = 'timerCustomEvents';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $adParameters;
  /**
   * @var string[]
   */
  public $adTagKeys;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var bool
   */
  public $allowScriptAccess;
  /**
   * @var bool
   */
  public $archived;
  /**
   * @var string
   */
  public $artworkType;
  /**
   * @var string
   */
  public $authoringSource;
  /**
   * @var string
   */
  public $authoringTool;
  /**
   * @var bool
   */
  public $autoAdvanceImages;
  /**
   * @var string
   */
  public $backgroundColor;
  protected $backupImageClickThroughUrlType = CreativeClickThroughUrl::class;
  protected $backupImageClickThroughUrlDataType = '';
  /**
   * @var string[]
   */
  public $backupImageFeatures;
  /**
   * @var string
   */
  public $backupImageReportingLabel;
  protected $backupImageTargetWindowType = TargetWindow::class;
  protected $backupImageTargetWindowDataType = '';
  protected $clickTagsType = ClickTag::class;
  protected $clickTagsDataType = 'array';
  /**
   * @var string
   */
  public $commercialId;
  /**
   * @var string[]
   */
  public $companionCreatives;
  /**
   * @var string[]
   */
  public $compatibility;
  /**
   * @var bool
   */
  public $convertFlashToHtml5;
  protected $counterCustomEventsType = CreativeCustomEvent::class;
  protected $counterCustomEventsDataType = 'array';
  protected $creativeAssetSelectionType = CreativeAssetSelection::class;
  protected $creativeAssetSelectionDataType = '';
  protected $creativeAssetsType = CreativeAsset::class;
  protected $creativeAssetsDataType = 'array';
  protected $creativeFieldAssignmentsType = CreativeFieldAssignment::class;
  protected $creativeFieldAssignmentsDataType = 'array';
  /**
   * @var string[]
   */
  public $customKeyValues;
  /**
   * @var bool
   */
  public $dynamicAssetSelection;
  protected $exitCustomEventsType = CreativeCustomEvent::class;
  protected $exitCustomEventsDataType = 'array';
  protected $fsCommandType = FsCommand::class;
  protected $fsCommandDataType = '';
  /**
   * @var string
   */
  public $htmlCode;
  /**
   * @var bool
   */
  public $htmlCodeLocked;
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $latestTraffickedCreativeId;
  /**
   * @var string
   */
  public $mediaDescription;
  /**
   * @var float
   */
  public $mediaDuration;
  /**
   * @var string
   */
  public $name;
  protected $obaIconType = ObaIcon::class;
  protected $obaIconDataType = '';
  /**
   * @var string
   */
  public $overrideCss;
  protected $progressOffsetType = VideoOffset::class;
  protected $progressOffsetDataType = '';
  /**
   * @var string
   */
  public $redirectUrl;
  /**
   * @var string
   */
  public $renderingId;
  protected $renderingIdDimensionValueType = DimensionValue::class;
  protected $renderingIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $requiredFlashPluginVersion;
  /**
   * @var int
   */
  public $requiredFlashVersion;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  protected $skipOffsetType = VideoOffset::class;
  protected $skipOffsetDataType = '';
  /**
   * @var bool
   */
  public $skippable;
  /**
   * @var bool
   */
  public $sslCompliant;
  /**
   * @var bool
   */
  public $sslOverride;
  /**
   * @var string
   */
  public $studioAdvertiserId;
  /**
   * @var string
   */
  public $studioCreativeId;
  /**
   * @var string
   */
  public $studioTraffickedCreativeId;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $thirdPartyBackupImageImpressionsUrl;
  /**
   * @var string
   */
  public $thirdPartyRichMediaImpressionsUrl;
  protected $thirdPartyUrlsType = ThirdPartyTrackingUrl::class;
  protected $thirdPartyUrlsDataType = 'array';
  protected $timerCustomEventsType = CreativeCustomEvent::class;
  protected $timerCustomEventsDataType = 'array';
  /**
   * @var string
   */
  public $totalFileSize;
  /**
   * @var string
   */
  public $type;
  protected $universalAdIdType = UniversalAdId::class;
  protected $universalAdIdDataType = '';
  /**
   * @var int
   */
  public $version;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param string
   */
  public function setAdParameters($adParameters)
  {
    $this->adParameters = $adParameters;
  }
  /**
   * @return string
   */
  public function getAdParameters()
  {
    return $this->adParameters;
  }
  /**
   * @param string[]
   */
  public function setAdTagKeys($adTagKeys)
  {
    $this->adTagKeys = $adTagKeys;
  }
  /**
   * @return string[]
   */
  public function getAdTagKeys()
  {
    return $this->adTagKeys;
  }
  /**
   * @param Size[]
   */
  public function setAdditionalSizes($additionalSizes)
  {
    $this->additionalSizes = $additionalSizes;
  }
  /**
   * @return Size[]
   */
  public function getAdditionalSizes()
  {
    return $this->additionalSizes;
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
   * @param bool
   */
  public function setAllowScriptAccess($allowScriptAccess)
  {
    $this->allowScriptAccess = $allowScriptAccess;
  }
  /**
   * @return bool
   */
  public function getAllowScriptAccess()
  {
    return $this->allowScriptAccess;
  }
  /**
   * @param bool
   */
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param string
   */
  public function setArtworkType($artworkType)
  {
    $this->artworkType = $artworkType;
  }
  /**
   * @return string
   */
  public function getArtworkType()
  {
    return $this->artworkType;
  }
  /**
   * @param string
   */
  public function setAuthoringSource($authoringSource)
  {
    $this->authoringSource = $authoringSource;
  }
  /**
   * @return string
   */
  public function getAuthoringSource()
  {
    return $this->authoringSource;
  }
  /**
   * @param string
   */
  public function setAuthoringTool($authoringTool)
  {
    $this->authoringTool = $authoringTool;
  }
  /**
   * @return string
   */
  public function getAuthoringTool()
  {
    return $this->authoringTool;
  }
  /**
   * @param bool
   */
  public function setAutoAdvanceImages($autoAdvanceImages)
  {
    $this->autoAdvanceImages = $autoAdvanceImages;
  }
  /**
   * @return bool
   */
  public function getAutoAdvanceImages()
  {
    return $this->autoAdvanceImages;
  }
  /**
   * @param string
   */
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return string
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param CreativeClickThroughUrl
   */
  public function setBackupImageClickThroughUrl(CreativeClickThroughUrl $backupImageClickThroughUrl)
  {
    $this->backupImageClickThroughUrl = $backupImageClickThroughUrl;
  }
  /**
   * @return CreativeClickThroughUrl
   */
  public function getBackupImageClickThroughUrl()
  {
    return $this->backupImageClickThroughUrl;
  }
  /**
   * @param string[]
   */
  public function setBackupImageFeatures($backupImageFeatures)
  {
    $this->backupImageFeatures = $backupImageFeatures;
  }
  /**
   * @return string[]
   */
  public function getBackupImageFeatures()
  {
    return $this->backupImageFeatures;
  }
  /**
   * @param string
   */
  public function setBackupImageReportingLabel($backupImageReportingLabel)
  {
    $this->backupImageReportingLabel = $backupImageReportingLabel;
  }
  /**
   * @return string
   */
  public function getBackupImageReportingLabel()
  {
    return $this->backupImageReportingLabel;
  }
  /**
   * @param TargetWindow
   */
  public function setBackupImageTargetWindow(TargetWindow $backupImageTargetWindow)
  {
    $this->backupImageTargetWindow = $backupImageTargetWindow;
  }
  /**
   * @return TargetWindow
   */
  public function getBackupImageTargetWindow()
  {
    return $this->backupImageTargetWindow;
  }
  /**
   * @param ClickTag[]
   */
  public function setClickTags($clickTags)
  {
    $this->clickTags = $clickTags;
  }
  /**
   * @return ClickTag[]
   */
  public function getClickTags()
  {
    return $this->clickTags;
  }
  /**
   * @param string
   */
  public function setCommercialId($commercialId)
  {
    $this->commercialId = $commercialId;
  }
  /**
   * @return string
   */
  public function getCommercialId()
  {
    return $this->commercialId;
  }
  /**
   * @param string[]
   */
  public function setCompanionCreatives($companionCreatives)
  {
    $this->companionCreatives = $companionCreatives;
  }
  /**
   * @return string[]
   */
  public function getCompanionCreatives()
  {
    return $this->companionCreatives;
  }
  /**
   * @param string[]
   */
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  /**
   * @return string[]
   */
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  /**
   * @param bool
   */
  public function setConvertFlashToHtml5($convertFlashToHtml5)
  {
    $this->convertFlashToHtml5 = $convertFlashToHtml5;
  }
  /**
   * @return bool
   */
  public function getConvertFlashToHtml5()
  {
    return $this->convertFlashToHtml5;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setCounterCustomEvents($counterCustomEvents)
  {
    $this->counterCustomEvents = $counterCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getCounterCustomEvents()
  {
    return $this->counterCustomEvents;
  }
  /**
   * @param CreativeAssetSelection
   */
  public function setCreativeAssetSelection(CreativeAssetSelection $creativeAssetSelection)
  {
    $this->creativeAssetSelection = $creativeAssetSelection;
  }
  /**
   * @return CreativeAssetSelection
   */
  public function getCreativeAssetSelection()
  {
    return $this->creativeAssetSelection;
  }
  /**
   * @param CreativeAsset[]
   */
  public function setCreativeAssets($creativeAssets)
  {
    $this->creativeAssets = $creativeAssets;
  }
  /**
   * @return CreativeAsset[]
   */
  public function getCreativeAssets()
  {
    return $this->creativeAssets;
  }
  /**
   * @param CreativeFieldAssignment[]
   */
  public function setCreativeFieldAssignments($creativeFieldAssignments)
  {
    $this->creativeFieldAssignments = $creativeFieldAssignments;
  }
  /**
   * @return CreativeFieldAssignment[]
   */
  public function getCreativeFieldAssignments()
  {
    return $this->creativeFieldAssignments;
  }
  /**
   * @param string[]
   */
  public function setCustomKeyValues($customKeyValues)
  {
    $this->customKeyValues = $customKeyValues;
  }
  /**
   * @return string[]
   */
  public function getCustomKeyValues()
  {
    return $this->customKeyValues;
  }
  /**
   * @param bool
   */
  public function setDynamicAssetSelection($dynamicAssetSelection)
  {
    $this->dynamicAssetSelection = $dynamicAssetSelection;
  }
  /**
   * @return bool
   */
  public function getDynamicAssetSelection()
  {
    return $this->dynamicAssetSelection;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setExitCustomEvents($exitCustomEvents)
  {
    $this->exitCustomEvents = $exitCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getExitCustomEvents()
  {
    return $this->exitCustomEvents;
  }
  /**
   * @param FsCommand
   */
  public function setFsCommand(FsCommand $fsCommand)
  {
    $this->fsCommand = $fsCommand;
  }
  /**
   * @return FsCommand
   */
  public function getFsCommand()
  {
    return $this->fsCommand;
  }
  /**
   * @param string
   */
  public function setHtmlCode($htmlCode)
  {
    $this->htmlCode = $htmlCode;
  }
  /**
   * @return string
   */
  public function getHtmlCode()
  {
    return $this->htmlCode;
  }
  /**
   * @param bool
   */
  public function setHtmlCodeLocked($htmlCodeLocked)
  {
    $this->htmlCodeLocked = $htmlCodeLocked;
  }
  /**
   * @return bool
   */
  public function getHtmlCodeLocked()
  {
    return $this->htmlCodeLocked;
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
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
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
   * @param LastModifiedInfo
   */
  public function setLastModifiedInfo(LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
  }
  /**
   * @param string
   */
  public function setLatestTraffickedCreativeId($latestTraffickedCreativeId)
  {
    $this->latestTraffickedCreativeId = $latestTraffickedCreativeId;
  }
  /**
   * @return string
   */
  public function getLatestTraffickedCreativeId()
  {
    return $this->latestTraffickedCreativeId;
  }
  /**
   * @param string
   */
  public function setMediaDescription($mediaDescription)
  {
    $this->mediaDescription = $mediaDescription;
  }
  /**
   * @return string
   */
  public function getMediaDescription()
  {
    return $this->mediaDescription;
  }
  /**
   * @param float
   */
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  /**
   * @return float
   */
  public function getMediaDuration()
  {
    return $this->mediaDuration;
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
   * @param string
   */
  public function setOverrideCss($overrideCss)
  {
    $this->overrideCss = $overrideCss;
  }
  /**
   * @return string
   */
  public function getOverrideCss()
  {
    return $this->overrideCss;
  }
  /**
   * @param VideoOffset
   */
  public function setProgressOffset(VideoOffset $progressOffset)
  {
    $this->progressOffset = $progressOffset;
  }
  /**
   * @return VideoOffset
   */
  public function getProgressOffset()
  {
    return $this->progressOffset;
  }
  /**
   * @param string
   */
  public function setRedirectUrl($redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  /**
   * @return string
   */
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  /**
   * @param string
   */
  public function setRenderingId($renderingId)
  {
    $this->renderingId = $renderingId;
  }
  /**
   * @return string
   */
  public function getRenderingId()
  {
    return $this->renderingId;
  }
  /**
   * @param DimensionValue
   */
  public function setRenderingIdDimensionValue(DimensionValue $renderingIdDimensionValue)
  {
    $this->renderingIdDimensionValue = $renderingIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getRenderingIdDimensionValue()
  {
    return $this->renderingIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setRequiredFlashPluginVersion($requiredFlashPluginVersion)
  {
    $this->requiredFlashPluginVersion = $requiredFlashPluginVersion;
  }
  /**
   * @return string
   */
  public function getRequiredFlashPluginVersion()
  {
    return $this->requiredFlashPluginVersion;
  }
  /**
   * @param int
   */
  public function setRequiredFlashVersion($requiredFlashVersion)
  {
    $this->requiredFlashVersion = $requiredFlashVersion;
  }
  /**
   * @return int
   */
  public function getRequiredFlashVersion()
  {
    return $this->requiredFlashVersion;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param VideoOffset
   */
  public function setSkipOffset(VideoOffset $skipOffset)
  {
    $this->skipOffset = $skipOffset;
  }
  /**
   * @return VideoOffset
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
   * @param bool
   */
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  /**
   * @return bool
   */
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  /**
   * @param bool
   */
  public function setSslOverride($sslOverride)
  {
    $this->sslOverride = $sslOverride;
  }
  /**
   * @return bool
   */
  public function getSslOverride()
  {
    return $this->sslOverride;
  }
  /**
   * @param string
   */
  public function setStudioAdvertiserId($studioAdvertiserId)
  {
    $this->studioAdvertiserId = $studioAdvertiserId;
  }
  /**
   * @return string
   */
  public function getStudioAdvertiserId()
  {
    return $this->studioAdvertiserId;
  }
  /**
   * @param string
   */
  public function setStudioCreativeId($studioCreativeId)
  {
    $this->studioCreativeId = $studioCreativeId;
  }
  /**
   * @return string
   */
  public function getStudioCreativeId()
  {
    return $this->studioCreativeId;
  }
  /**
   * @param string
   */
  public function setStudioTraffickedCreativeId($studioTraffickedCreativeId)
  {
    $this->studioTraffickedCreativeId = $studioTraffickedCreativeId;
  }
  /**
   * @return string
   */
  public function getStudioTraffickedCreativeId()
  {
    return $this->studioTraffickedCreativeId;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param string
   */
  public function setThirdPartyBackupImageImpressionsUrl($thirdPartyBackupImageImpressionsUrl)
  {
    $this->thirdPartyBackupImageImpressionsUrl = $thirdPartyBackupImageImpressionsUrl;
  }
  /**
   * @return string
   */
  public function getThirdPartyBackupImageImpressionsUrl()
  {
    return $this->thirdPartyBackupImageImpressionsUrl;
  }
  /**
   * @param string
   */
  public function setThirdPartyRichMediaImpressionsUrl($thirdPartyRichMediaImpressionsUrl)
  {
    $this->thirdPartyRichMediaImpressionsUrl = $thirdPartyRichMediaImpressionsUrl;
  }
  /**
   * @return string
   */
  public function getThirdPartyRichMediaImpressionsUrl()
  {
    return $this->thirdPartyRichMediaImpressionsUrl;
  }
  /**
   * @param ThirdPartyTrackingUrl[]
   */
  public function setThirdPartyUrls($thirdPartyUrls)
  {
    $this->thirdPartyUrls = $thirdPartyUrls;
  }
  /**
   * @return ThirdPartyTrackingUrl[]
   */
  public function getThirdPartyUrls()
  {
    return $this->thirdPartyUrls;
  }
  /**
   * @param CreativeCustomEvent[]
   */
  public function setTimerCustomEvents($timerCustomEvents)
  {
    $this->timerCustomEvents = $timerCustomEvents;
  }
  /**
   * @return CreativeCustomEvent[]
   */
  public function getTimerCustomEvents()
  {
    return $this->timerCustomEvents;
  }
  /**
   * @param string
   */
  public function setTotalFileSize($totalFileSize)
  {
    $this->totalFileSize = $totalFileSize;
  }
  /**
   * @return string
   */
  public function getTotalFileSize()
  {
    return $this->totalFileSize;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creative::class, 'Google_Service_Dfareporting_Creative');
