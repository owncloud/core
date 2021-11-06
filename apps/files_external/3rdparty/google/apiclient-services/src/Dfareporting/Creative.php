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
  public $accountId;
  public $active;
  public $adParameters;
  public $adTagKeys;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  public $advertiserId;
  public $allowScriptAccess;
  public $archived;
  public $artworkType;
  public $authoringSource;
  public $authoringTool;
  public $autoAdvanceImages;
  public $backgroundColor;
  protected $backupImageClickThroughUrlType = CreativeClickThroughUrl::class;
  protected $backupImageClickThroughUrlDataType = '';
  public $backupImageFeatures;
  public $backupImageReportingLabel;
  protected $backupImageTargetWindowType = TargetWindow::class;
  protected $backupImageTargetWindowDataType = '';
  protected $clickTagsType = ClickTag::class;
  protected $clickTagsDataType = 'array';
  public $commercialId;
  public $companionCreatives;
  public $compatibility;
  public $convertFlashToHtml5;
  protected $counterCustomEventsType = CreativeCustomEvent::class;
  protected $counterCustomEventsDataType = 'array';
  protected $creativeAssetSelectionType = CreativeAssetSelection::class;
  protected $creativeAssetSelectionDataType = '';
  protected $creativeAssetsType = CreativeAsset::class;
  protected $creativeAssetsDataType = 'array';
  protected $creativeFieldAssignmentsType = CreativeFieldAssignment::class;
  protected $creativeFieldAssignmentsDataType = 'array';
  public $customKeyValues;
  public $dynamicAssetSelection;
  protected $exitCustomEventsType = CreativeCustomEvent::class;
  protected $exitCustomEventsDataType = 'array';
  protected $fsCommandType = FsCommand::class;
  protected $fsCommandDataType = '';
  public $htmlCode;
  public $htmlCodeLocked;
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  public $latestTraffickedCreativeId;
  public $mediaDescription;
  public $mediaDuration;
  public $name;
  protected $obaIconType = ObaIcon::class;
  protected $obaIconDataType = '';
  public $overrideCss;
  protected $progressOffsetType = VideoOffset::class;
  protected $progressOffsetDataType = '';
  public $redirectUrl;
  public $renderingId;
  protected $renderingIdDimensionValueType = DimensionValue::class;
  protected $renderingIdDimensionValueDataType = '';
  public $requiredFlashPluginVersion;
  public $requiredFlashVersion;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  protected $skipOffsetType = VideoOffset::class;
  protected $skipOffsetDataType = '';
  public $skippable;
  public $sslCompliant;
  public $sslOverride;
  public $studioAdvertiserId;
  public $studioCreativeId;
  public $studioTraffickedCreativeId;
  public $subaccountId;
  public $thirdPartyBackupImageImpressionsUrl;
  public $thirdPartyRichMediaImpressionsUrl;
  protected $thirdPartyUrlsType = ThirdPartyTrackingUrl::class;
  protected $thirdPartyUrlsDataType = 'array';
  protected $timerCustomEventsType = CreativeCustomEvent::class;
  protected $timerCustomEventsDataType = 'array';
  public $totalFileSize;
  public $type;
  protected $universalAdIdType = UniversalAdId::class;
  protected $universalAdIdDataType = '';
  public $version;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setAdParameters($adParameters)
  {
    $this->adParameters = $adParameters;
  }
  public function getAdParameters()
  {
    return $this->adParameters;
  }
  public function setAdTagKeys($adTagKeys)
  {
    $this->adTagKeys = $adTagKeys;
  }
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
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAllowScriptAccess($allowScriptAccess)
  {
    $this->allowScriptAccess = $allowScriptAccess;
  }
  public function getAllowScriptAccess()
  {
    return $this->allowScriptAccess;
  }
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  public function getArchived()
  {
    return $this->archived;
  }
  public function setArtworkType($artworkType)
  {
    $this->artworkType = $artworkType;
  }
  public function getArtworkType()
  {
    return $this->artworkType;
  }
  public function setAuthoringSource($authoringSource)
  {
    $this->authoringSource = $authoringSource;
  }
  public function getAuthoringSource()
  {
    return $this->authoringSource;
  }
  public function setAuthoringTool($authoringTool)
  {
    $this->authoringTool = $authoringTool;
  }
  public function getAuthoringTool()
  {
    return $this->authoringTool;
  }
  public function setAutoAdvanceImages($autoAdvanceImages)
  {
    $this->autoAdvanceImages = $autoAdvanceImages;
  }
  public function getAutoAdvanceImages()
  {
    return $this->autoAdvanceImages;
  }
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
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
  public function setBackupImageFeatures($backupImageFeatures)
  {
    $this->backupImageFeatures = $backupImageFeatures;
  }
  public function getBackupImageFeatures()
  {
    return $this->backupImageFeatures;
  }
  public function setBackupImageReportingLabel($backupImageReportingLabel)
  {
    $this->backupImageReportingLabel = $backupImageReportingLabel;
  }
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
  public function setCommercialId($commercialId)
  {
    $this->commercialId = $commercialId;
  }
  public function getCommercialId()
  {
    return $this->commercialId;
  }
  public function setCompanionCreatives($companionCreatives)
  {
    $this->companionCreatives = $companionCreatives;
  }
  public function getCompanionCreatives()
  {
    return $this->companionCreatives;
  }
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  public function setConvertFlashToHtml5($convertFlashToHtml5)
  {
    $this->convertFlashToHtml5 = $convertFlashToHtml5;
  }
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
  public function setCustomKeyValues($customKeyValues)
  {
    $this->customKeyValues = $customKeyValues;
  }
  public function getCustomKeyValues()
  {
    return $this->customKeyValues;
  }
  public function setDynamicAssetSelection($dynamicAssetSelection)
  {
    $this->dynamicAssetSelection = $dynamicAssetSelection;
  }
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
  public function setHtmlCode($htmlCode)
  {
    $this->htmlCode = $htmlCode;
  }
  public function getHtmlCode()
  {
    return $this->htmlCode;
  }
  public function setHtmlCodeLocked($htmlCodeLocked)
  {
    $this->htmlCodeLocked = $htmlCodeLocked;
  }
  public function getHtmlCodeLocked()
  {
    return $this->htmlCodeLocked;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
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
  public function setLatestTraffickedCreativeId($latestTraffickedCreativeId)
  {
    $this->latestTraffickedCreativeId = $latestTraffickedCreativeId;
  }
  public function getLatestTraffickedCreativeId()
  {
    return $this->latestTraffickedCreativeId;
  }
  public function setMediaDescription($mediaDescription)
  {
    $this->mediaDescription = $mediaDescription;
  }
  public function getMediaDescription()
  {
    return $this->mediaDescription;
  }
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  public function getMediaDuration()
  {
    return $this->mediaDuration;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setOverrideCss($overrideCss)
  {
    $this->overrideCss = $overrideCss;
  }
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
  public function setRedirectUrl($redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  public function setRenderingId($renderingId)
  {
    $this->renderingId = $renderingId;
  }
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
  public function setRequiredFlashPluginVersion($requiredFlashPluginVersion)
  {
    $this->requiredFlashPluginVersion = $requiredFlashPluginVersion;
  }
  public function getRequiredFlashPluginVersion()
  {
    return $this->requiredFlashPluginVersion;
  }
  public function setRequiredFlashVersion($requiredFlashVersion)
  {
    $this->requiredFlashVersion = $requiredFlashVersion;
  }
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
  public function setSkippable($skippable)
  {
    $this->skippable = $skippable;
  }
  public function getSkippable()
  {
    return $this->skippable;
  }
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  public function setSslOverride($sslOverride)
  {
    $this->sslOverride = $sslOverride;
  }
  public function getSslOverride()
  {
    return $this->sslOverride;
  }
  public function setStudioAdvertiserId($studioAdvertiserId)
  {
    $this->studioAdvertiserId = $studioAdvertiserId;
  }
  public function getStudioAdvertiserId()
  {
    return $this->studioAdvertiserId;
  }
  public function setStudioCreativeId($studioCreativeId)
  {
    $this->studioCreativeId = $studioCreativeId;
  }
  public function getStudioCreativeId()
  {
    return $this->studioCreativeId;
  }
  public function setStudioTraffickedCreativeId($studioTraffickedCreativeId)
  {
    $this->studioTraffickedCreativeId = $studioTraffickedCreativeId;
  }
  public function getStudioTraffickedCreativeId()
  {
    return $this->studioTraffickedCreativeId;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setThirdPartyBackupImageImpressionsUrl($thirdPartyBackupImageImpressionsUrl)
  {
    $this->thirdPartyBackupImageImpressionsUrl = $thirdPartyBackupImageImpressionsUrl;
  }
  public function getThirdPartyBackupImageImpressionsUrl()
  {
    return $this->thirdPartyBackupImageImpressionsUrl;
  }
  public function setThirdPartyRichMediaImpressionsUrl($thirdPartyRichMediaImpressionsUrl)
  {
    $this->thirdPartyRichMediaImpressionsUrl = $thirdPartyRichMediaImpressionsUrl;
  }
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
  public function setTotalFileSize($totalFileSize)
  {
    $this->totalFileSize = $totalFileSize;
  }
  public function getTotalFileSize()
  {
    return $this->totalFileSize;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
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
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creative::class, 'Google_Service_Dfareporting_Creative');
