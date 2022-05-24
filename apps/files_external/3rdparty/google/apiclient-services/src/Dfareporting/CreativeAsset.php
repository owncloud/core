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

class CreativeAsset extends \Google\Collection
{
  protected $collection_key = 'detectedFeatures';
  /**
   * @var bool
   */
  public $actionScript3;
  /**
   * @var bool
   */
  public $active;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  /**
   * @var string
   */
  public $alignment;
  /**
   * @var string
   */
  public $artworkType;
  protected $assetIdentifierType = CreativeAssetId::class;
  protected $assetIdentifierDataType = '';
  /**
   * @var int
   */
  public $audioBitRate;
  /**
   * @var int
   */
  public $audioSampleRate;
  protected $backupImageExitType = CreativeCustomEvent::class;
  protected $backupImageExitDataType = '';
  /**
   * @var int
   */
  public $bitRate;
  /**
   * @var string
   */
  public $childAssetType;
  protected $collapsedSizeType = Size::class;
  protected $collapsedSizeDataType = '';
  /**
   * @var string[]
   */
  public $companionCreativeIds;
  /**
   * @var int
   */
  public $customStartTimeValue;
  /**
   * @var string[]
   */
  public $detectedFeatures;
  /**
   * @var string
   */
  public $displayType;
  /**
   * @var int
   */
  public $duration;
  /**
   * @var string
   */
  public $durationType;
  protected $expandedDimensionType = Size::class;
  protected $expandedDimensionDataType = '';
  /**
   * @var string
   */
  public $fileSize;
  /**
   * @var int
   */
  public $flashVersion;
  /**
   * @var float
   */
  public $frameRate;
  /**
   * @var bool
   */
  public $hideFlashObjects;
  /**
   * @var bool
   */
  public $hideSelectionBoxes;
  /**
   * @var bool
   */
  public $horizontallyLocked;
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var float
   */
  public $mediaDuration;
  /**
   * @var string
   */
  public $mimeType;
  protected $offsetType = OffsetPosition::class;
  protected $offsetDataType = '';
  /**
   * @var string
   */
  public $orientation;
  /**
   * @var bool
   */
  public $originalBackup;
  /**
   * @var bool
   */
  public $politeLoad;
  protected $positionType = OffsetPosition::class;
  protected $positionDataType = '';
  /**
   * @var string
   */
  public $positionLeftUnit;
  /**
   * @var string
   */
  public $positionTopUnit;
  /**
   * @var string
   */
  public $progressiveServingUrl;
  /**
   * @var bool
   */
  public $pushdown;
  /**
   * @var float
   */
  public $pushdownDuration;
  /**
   * @var string
   */
  public $role;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var bool
   */
  public $sslCompliant;
  /**
   * @var string
   */
  public $startTimeType;
  /**
   * @var string
   */
  public $streamingServingUrl;
  /**
   * @var bool
   */
  public $transparency;
  /**
   * @var bool
   */
  public $verticallyLocked;
  /**
   * @var string
   */
  public $windowMode;
  /**
   * @var int
   */
  public $zIndex;
  /**
   * @var string
   */
  public $zipFilename;
  /**
   * @var string
   */
  public $zipFilesize;

  /**
   * @param bool
   */
  public function setActionScript3($actionScript3)
  {
    $this->actionScript3 = $actionScript3;
  }
  /**
   * @return bool
   */
  public function getActionScript3()
  {
    return $this->actionScript3;
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
  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  /**
   * @return string
   */
  public function getAlignment()
  {
    return $this->alignment;
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
   * @param CreativeAssetId
   */
  public function setAssetIdentifier(CreativeAssetId $assetIdentifier)
  {
    $this->assetIdentifier = $assetIdentifier;
  }
  /**
   * @return CreativeAssetId
   */
  public function getAssetIdentifier()
  {
    return $this->assetIdentifier;
  }
  /**
   * @param int
   */
  public function setAudioBitRate($audioBitRate)
  {
    $this->audioBitRate = $audioBitRate;
  }
  /**
   * @return int
   */
  public function getAudioBitRate()
  {
    return $this->audioBitRate;
  }
  /**
   * @param int
   */
  public function setAudioSampleRate($audioSampleRate)
  {
    $this->audioSampleRate = $audioSampleRate;
  }
  /**
   * @return int
   */
  public function getAudioSampleRate()
  {
    return $this->audioSampleRate;
  }
  /**
   * @param CreativeCustomEvent
   */
  public function setBackupImageExit(CreativeCustomEvent $backupImageExit)
  {
    $this->backupImageExit = $backupImageExit;
  }
  /**
   * @return CreativeCustomEvent
   */
  public function getBackupImageExit()
  {
    return $this->backupImageExit;
  }
  /**
   * @param int
   */
  public function setBitRate($bitRate)
  {
    $this->bitRate = $bitRate;
  }
  /**
   * @return int
   */
  public function getBitRate()
  {
    return $this->bitRate;
  }
  /**
   * @param string
   */
  public function setChildAssetType($childAssetType)
  {
    $this->childAssetType = $childAssetType;
  }
  /**
   * @return string
   */
  public function getChildAssetType()
  {
    return $this->childAssetType;
  }
  /**
   * @param Size
   */
  public function setCollapsedSize(Size $collapsedSize)
  {
    $this->collapsedSize = $collapsedSize;
  }
  /**
   * @return Size
   */
  public function getCollapsedSize()
  {
    return $this->collapsedSize;
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
   * @param int
   */
  public function setCustomStartTimeValue($customStartTimeValue)
  {
    $this->customStartTimeValue = $customStartTimeValue;
  }
  /**
   * @return int
   */
  public function getCustomStartTimeValue()
  {
    return $this->customStartTimeValue;
  }
  /**
   * @param string[]
   */
  public function setDetectedFeatures($detectedFeatures)
  {
    $this->detectedFeatures = $detectedFeatures;
  }
  /**
   * @return string[]
   */
  public function getDetectedFeatures()
  {
    return $this->detectedFeatures;
  }
  /**
   * @param string
   */
  public function setDisplayType($displayType)
  {
    $this->displayType = $displayType;
  }
  /**
   * @return string
   */
  public function getDisplayType()
  {
    return $this->displayType;
  }
  /**
   * @param int
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return int
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setDurationType($durationType)
  {
    $this->durationType = $durationType;
  }
  /**
   * @return string
   */
  public function getDurationType()
  {
    return $this->durationType;
  }
  /**
   * @param Size
   */
  public function setExpandedDimension(Size $expandedDimension)
  {
    $this->expandedDimension = $expandedDimension;
  }
  /**
   * @return Size
   */
  public function getExpandedDimension()
  {
    return $this->expandedDimension;
  }
  /**
   * @param string
   */
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  /**
   * @return string
   */
  public function getFileSize()
  {
    return $this->fileSize;
  }
  /**
   * @param int
   */
  public function setFlashVersion($flashVersion)
  {
    $this->flashVersion = $flashVersion;
  }
  /**
   * @return int
   */
  public function getFlashVersion()
  {
    return $this->flashVersion;
  }
  /**
   * @param float
   */
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  /**
   * @return float
   */
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param bool
   */
  public function setHideFlashObjects($hideFlashObjects)
  {
    $this->hideFlashObjects = $hideFlashObjects;
  }
  /**
   * @return bool
   */
  public function getHideFlashObjects()
  {
    return $this->hideFlashObjects;
  }
  /**
   * @param bool
   */
  public function setHideSelectionBoxes($hideSelectionBoxes)
  {
    $this->hideSelectionBoxes = $hideSelectionBoxes;
  }
  /**
   * @return bool
   */
  public function getHideSelectionBoxes()
  {
    return $this->hideSelectionBoxes;
  }
  /**
   * @param bool
   */
  public function setHorizontallyLocked($horizontallyLocked)
  {
    $this->horizontallyLocked = $horizontallyLocked;
  }
  /**
   * @return bool
   */
  public function getHorizontallyLocked()
  {
    return $this->horizontallyLocked;
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
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param OffsetPosition
   */
  public function setOffset(OffsetPosition $offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return OffsetPosition
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param bool
   */
  public function setOriginalBackup($originalBackup)
  {
    $this->originalBackup = $originalBackup;
  }
  /**
   * @return bool
   */
  public function getOriginalBackup()
  {
    return $this->originalBackup;
  }
  /**
   * @param bool
   */
  public function setPoliteLoad($politeLoad)
  {
    $this->politeLoad = $politeLoad;
  }
  /**
   * @return bool
   */
  public function getPoliteLoad()
  {
    return $this->politeLoad;
  }
  /**
   * @param OffsetPosition
   */
  public function setPosition(OffsetPosition $position)
  {
    $this->position = $position;
  }
  /**
   * @return OffsetPosition
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string
   */
  public function setPositionLeftUnit($positionLeftUnit)
  {
    $this->positionLeftUnit = $positionLeftUnit;
  }
  /**
   * @return string
   */
  public function getPositionLeftUnit()
  {
    return $this->positionLeftUnit;
  }
  /**
   * @param string
   */
  public function setPositionTopUnit($positionTopUnit)
  {
    $this->positionTopUnit = $positionTopUnit;
  }
  /**
   * @return string
   */
  public function getPositionTopUnit()
  {
    return $this->positionTopUnit;
  }
  /**
   * @param string
   */
  public function setProgressiveServingUrl($progressiveServingUrl)
  {
    $this->progressiveServingUrl = $progressiveServingUrl;
  }
  /**
   * @return string
   */
  public function getProgressiveServingUrl()
  {
    return $this->progressiveServingUrl;
  }
  /**
   * @param bool
   */
  public function setPushdown($pushdown)
  {
    $this->pushdown = $pushdown;
  }
  /**
   * @return bool
   */
  public function getPushdown()
  {
    return $this->pushdown;
  }
  /**
   * @param float
   */
  public function setPushdownDuration($pushdownDuration)
  {
    $this->pushdownDuration = $pushdownDuration;
  }
  /**
   * @return float
   */
  public function getPushdownDuration()
  {
    return $this->pushdownDuration;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
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
   * @param string
   */
  public function setStartTimeType($startTimeType)
  {
    $this->startTimeType = $startTimeType;
  }
  /**
   * @return string
   */
  public function getStartTimeType()
  {
    return $this->startTimeType;
  }
  /**
   * @param string
   */
  public function setStreamingServingUrl($streamingServingUrl)
  {
    $this->streamingServingUrl = $streamingServingUrl;
  }
  /**
   * @return string
   */
  public function getStreamingServingUrl()
  {
    return $this->streamingServingUrl;
  }
  /**
   * @param bool
   */
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  /**
   * @return bool
   */
  public function getTransparency()
  {
    return $this->transparency;
  }
  /**
   * @param bool
   */
  public function setVerticallyLocked($verticallyLocked)
  {
    $this->verticallyLocked = $verticallyLocked;
  }
  /**
   * @return bool
   */
  public function getVerticallyLocked()
  {
    return $this->verticallyLocked;
  }
  /**
   * @param string
   */
  public function setWindowMode($windowMode)
  {
    $this->windowMode = $windowMode;
  }
  /**
   * @return string
   */
  public function getWindowMode()
  {
    return $this->windowMode;
  }
  /**
   * @param int
   */
  public function setZIndex($zIndex)
  {
    $this->zIndex = $zIndex;
  }
  /**
   * @return int
   */
  public function getZIndex()
  {
    return $this->zIndex;
  }
  /**
   * @param string
   */
  public function setZipFilename($zipFilename)
  {
    $this->zipFilename = $zipFilename;
  }
  /**
   * @return string
   */
  public function getZipFilename()
  {
    return $this->zipFilename;
  }
  /**
   * @param string
   */
  public function setZipFilesize($zipFilesize)
  {
    $this->zipFilesize = $zipFilesize;
  }
  /**
   * @return string
   */
  public function getZipFilesize()
  {
    return $this->zipFilesize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAsset::class, 'Google_Service_Dfareporting_CreativeAsset');
