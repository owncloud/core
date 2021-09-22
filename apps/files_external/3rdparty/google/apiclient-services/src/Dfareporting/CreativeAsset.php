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
  public $actionScript3;
  public $active;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  public $alignment;
  public $artworkType;
  protected $assetIdentifierType = CreativeAssetId::class;
  protected $assetIdentifierDataType = '';
  public $audioBitRate;
  public $audioSampleRate;
  protected $backupImageExitType = CreativeCustomEvent::class;
  protected $backupImageExitDataType = '';
  public $bitRate;
  public $childAssetType;
  protected $collapsedSizeType = Size::class;
  protected $collapsedSizeDataType = '';
  public $companionCreativeIds;
  public $customStartTimeValue;
  public $detectedFeatures;
  public $displayType;
  public $duration;
  public $durationType;
  protected $expandedDimensionType = Size::class;
  protected $expandedDimensionDataType = '';
  public $fileSize;
  public $flashVersion;
  public $frameRate;
  public $hideFlashObjects;
  public $hideSelectionBoxes;
  public $horizontallyLocked;
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $mediaDuration;
  public $mimeType;
  protected $offsetType = OffsetPosition::class;
  protected $offsetDataType = '';
  public $orientation;
  public $originalBackup;
  public $politeLoad;
  protected $positionType = OffsetPosition::class;
  protected $positionDataType = '';
  public $positionLeftUnit;
  public $positionTopUnit;
  public $progressiveServingUrl;
  public $pushdown;
  public $pushdownDuration;
  public $role;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  public $sslCompliant;
  public $startTimeType;
  public $streamingServingUrl;
  public $transparency;
  public $verticallyLocked;
  public $windowMode;
  public $zIndex;
  public $zipFilename;
  public $zipFilesize;

  public function setActionScript3($actionScript3)
  {
    $this->actionScript3 = $actionScript3;
  }
  public function getActionScript3()
  {
    return $this->actionScript3;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
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
  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  public function getAlignment()
  {
    return $this->alignment;
  }
  public function setArtworkType($artworkType)
  {
    $this->artworkType = $artworkType;
  }
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
  public function setAudioBitRate($audioBitRate)
  {
    $this->audioBitRate = $audioBitRate;
  }
  public function getAudioBitRate()
  {
    return $this->audioBitRate;
  }
  public function setAudioSampleRate($audioSampleRate)
  {
    $this->audioSampleRate = $audioSampleRate;
  }
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
  public function setBitRate($bitRate)
  {
    $this->bitRate = $bitRate;
  }
  public function getBitRate()
  {
    return $this->bitRate;
  }
  public function setChildAssetType($childAssetType)
  {
    $this->childAssetType = $childAssetType;
  }
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
  public function setCompanionCreativeIds($companionCreativeIds)
  {
    $this->companionCreativeIds = $companionCreativeIds;
  }
  public function getCompanionCreativeIds()
  {
    return $this->companionCreativeIds;
  }
  public function setCustomStartTimeValue($customStartTimeValue)
  {
    $this->customStartTimeValue = $customStartTimeValue;
  }
  public function getCustomStartTimeValue()
  {
    return $this->customStartTimeValue;
  }
  public function setDetectedFeatures($detectedFeatures)
  {
    $this->detectedFeatures = $detectedFeatures;
  }
  public function getDetectedFeatures()
  {
    return $this->detectedFeatures;
  }
  public function setDisplayType($displayType)
  {
    $this->displayType = $displayType;
  }
  public function getDisplayType()
  {
    return $this->displayType;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setDurationType($durationType)
  {
    $this->durationType = $durationType;
  }
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
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  public function getFileSize()
  {
    return $this->fileSize;
  }
  public function setFlashVersion($flashVersion)
  {
    $this->flashVersion = $flashVersion;
  }
  public function getFlashVersion()
  {
    return $this->flashVersion;
  }
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  public function setHideFlashObjects($hideFlashObjects)
  {
    $this->hideFlashObjects = $hideFlashObjects;
  }
  public function getHideFlashObjects()
  {
    return $this->hideFlashObjects;
  }
  public function setHideSelectionBoxes($hideSelectionBoxes)
  {
    $this->hideSelectionBoxes = $hideSelectionBoxes;
  }
  public function getHideSelectionBoxes()
  {
    return $this->hideSelectionBoxes;
  }
  public function setHorizontallyLocked($horizontallyLocked)
  {
    $this->horizontallyLocked = $horizontallyLocked;
  }
  public function getHorizontallyLocked()
  {
    return $this->horizontallyLocked;
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
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  public function getMediaDuration()
  {
    return $this->mediaDuration;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
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
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  public function getOrientation()
  {
    return $this->orientation;
  }
  public function setOriginalBackup($originalBackup)
  {
    $this->originalBackup = $originalBackup;
  }
  public function getOriginalBackup()
  {
    return $this->originalBackup;
  }
  public function setPoliteLoad($politeLoad)
  {
    $this->politeLoad = $politeLoad;
  }
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
  public function setPositionLeftUnit($positionLeftUnit)
  {
    $this->positionLeftUnit = $positionLeftUnit;
  }
  public function getPositionLeftUnit()
  {
    return $this->positionLeftUnit;
  }
  public function setPositionTopUnit($positionTopUnit)
  {
    $this->positionTopUnit = $positionTopUnit;
  }
  public function getPositionTopUnit()
  {
    return $this->positionTopUnit;
  }
  public function setProgressiveServingUrl($progressiveServingUrl)
  {
    $this->progressiveServingUrl = $progressiveServingUrl;
  }
  public function getProgressiveServingUrl()
  {
    return $this->progressiveServingUrl;
  }
  public function setPushdown($pushdown)
  {
    $this->pushdown = $pushdown;
  }
  public function getPushdown()
  {
    return $this->pushdown;
  }
  public function setPushdownDuration($pushdownDuration)
  {
    $this->pushdownDuration = $pushdownDuration;
  }
  public function getPushdownDuration()
  {
    return $this->pushdownDuration;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
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
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  public function setStartTimeType($startTimeType)
  {
    $this->startTimeType = $startTimeType;
  }
  public function getStartTimeType()
  {
    return $this->startTimeType;
  }
  public function setStreamingServingUrl($streamingServingUrl)
  {
    $this->streamingServingUrl = $streamingServingUrl;
  }
  public function getStreamingServingUrl()
  {
    return $this->streamingServingUrl;
  }
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  public function getTransparency()
  {
    return $this->transparency;
  }
  public function setVerticallyLocked($verticallyLocked)
  {
    $this->verticallyLocked = $verticallyLocked;
  }
  public function getVerticallyLocked()
  {
    return $this->verticallyLocked;
  }
  public function setWindowMode($windowMode)
  {
    $this->windowMode = $windowMode;
  }
  public function getWindowMode()
  {
    return $this->windowMode;
  }
  public function setZIndex($zIndex)
  {
    $this->zIndex = $zIndex;
  }
  public function getZIndex()
  {
    return $this->zIndex;
  }
  public function setZipFilename($zipFilename)
  {
    $this->zipFilename = $zipFilename;
  }
  public function getZipFilename()
  {
    return $this->zipFilename;
  }
  public function setZipFilesize($zipFilesize)
  {
    $this->zipFilesize = $zipFilesize;
  }
  public function getZipFilesize()
  {
    return $this->zipFilesize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAsset::class, 'Google_Service_Dfareporting_CreativeAsset');
