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

class VideoVideoStreamInfoVideoStream extends \Google\Collection
{
  protected $collection_key = 'userDataUnregistered';
  public $averageFps;
  /**
   * @var string
   */
  public $bitrate;
  protected $bitstreamColorInfoType = VideoFileColorInfo::class;
  protected $bitstreamColorInfoDataType = '';
  protected $cleanApertureType = VideoVideoStreamInfoVideoStreamCleanAperture::class;
  protected $cleanApertureDataType = '';
  /**
   * @var string
   */
  public $clockDiscontinuityUs;
  protected $closedCaptionsType = VideoClosedCaptions::class;
  protected $closedCaptionsDataType = '';
  protected $closedGopSizeType = VideoVideoStreamInfoVideoStreamStatistics::class;
  protected $closedGopSizeDataType = '';
  /**
   * @var string
   */
  public $codecFourcc;
  /**
   * @var string
   */
  public $codecId;
  /**
   * @var string
   */
  public $codecString;
  protected $colorInfoType = VideoFileColorInfo::class;
  protected $colorInfoDataType = '';
  protected $contentLightLevelType = VideoFileContentLightLevel::class;
  protected $contentLightLevelDataType = '';
  /**
   * @var string
   */
  public $decodeOffset;
  /**
   * @var int
   */
  public $displayHeight;
  /**
   * @var int
   */
  public $displayWidth;
  protected $doviConfigurationType = VideoDoViDecoderConfiguration::class;
  protected $doviConfigurationDataType = '';
  /**
   * @var string
   */
  public $endTimestamp;
  /**
   * @var string
   */
  public $flip;
  public $fps;
  /**
   * @var string
   */
  public $frameSize;
  protected $gopSizeType = VideoVideoStreamInfoVideoStreamStatistics::class;
  protected $gopSizeDataType = '';
  /**
   * @var bool
   */
  public $hasBFrames;
  protected $hdr10PlusStatsType = VideoFileHDR10PlusStats::class;
  protected $hdr10PlusStatsDataType = '';
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $interlace;
  /**
   * @var bool
   */
  public $isInsaneSize;
  protected $ituTT35Type = VideoUserDataRegisteredItuTT35::class;
  protected $ituTT35DataType = 'array';
  public $length;
  /**
   * @var int
   */
  public $level;
  protected $masteringDisplayMetadataType = VideoFileMasteringDisplayMetadata::class;
  protected $masteringDisplayMetadataDataType = '';
  public $maxFps;
  protected $metadataType = VideoClipInfo::class;
  protected $metadataDataType = 'array';
  public $minFps;
  /**
   * @var string
   */
  public $numberOfFrames;
  /**
   * @var int
   */
  public $numberOfInvisibleFrames;
  /**
   * @var string
   */
  public $pixFmt;
  public $pixelAspectRatio;
  /**
   * @var string
   */
  public $profile;
  protected $rationalFpsType = VideoRational32::class;
  protected $rationalFpsDataType = '';
  /**
   * @var string
   */
  public $rotation;
  protected $seiMessageType = VideoSEIMessage::class;
  protected $seiMessageDataType = 'array';
  protected $sphericalType = VideoFileSphericalMetadata::class;
  protected $sphericalDataType = '';
  /**
   * @var string
   */
  public $startTimestamp;
  /**
   * @var string
   */
  public $streamCodecTag;
  /**
   * @var string
   */
  public $streamIndex;
  protected $userDataUnregisteredType = VideoUserDataUnregistered::class;
  protected $userDataUnregisteredDataType = 'array';
  /**
   * @var int
   */
  public $width;

  public function setAverageFps($averageFps)
  {
    $this->averageFps = $averageFps;
  }
  public function getAverageFps()
  {
    return $this->averageFps;
  }
  /**
   * @param string
   */
  public function setBitrate($bitrate)
  {
    $this->bitrate = $bitrate;
  }
  /**
   * @return string
   */
  public function getBitrate()
  {
    return $this->bitrate;
  }
  /**
   * @param VideoFileColorInfo
   */
  public function setBitstreamColorInfo(VideoFileColorInfo $bitstreamColorInfo)
  {
    $this->bitstreamColorInfo = $bitstreamColorInfo;
  }
  /**
   * @return VideoFileColorInfo
   */
  public function getBitstreamColorInfo()
  {
    return $this->bitstreamColorInfo;
  }
  /**
   * @param VideoVideoStreamInfoVideoStreamCleanAperture
   */
  public function setCleanAperture(VideoVideoStreamInfoVideoStreamCleanAperture $cleanAperture)
  {
    $this->cleanAperture = $cleanAperture;
  }
  /**
   * @return VideoVideoStreamInfoVideoStreamCleanAperture
   */
  public function getCleanAperture()
  {
    return $this->cleanAperture;
  }
  /**
   * @param string
   */
  public function setClockDiscontinuityUs($clockDiscontinuityUs)
  {
    $this->clockDiscontinuityUs = $clockDiscontinuityUs;
  }
  /**
   * @return string
   */
  public function getClockDiscontinuityUs()
  {
    return $this->clockDiscontinuityUs;
  }
  /**
   * @param VideoClosedCaptions
   */
  public function setClosedCaptions(VideoClosedCaptions $closedCaptions)
  {
    $this->closedCaptions = $closedCaptions;
  }
  /**
   * @return VideoClosedCaptions
   */
  public function getClosedCaptions()
  {
    return $this->closedCaptions;
  }
  /**
   * @param VideoVideoStreamInfoVideoStreamStatistics
   */
  public function setClosedGopSize(VideoVideoStreamInfoVideoStreamStatistics $closedGopSize)
  {
    $this->closedGopSize = $closedGopSize;
  }
  /**
   * @return VideoVideoStreamInfoVideoStreamStatistics
   */
  public function getClosedGopSize()
  {
    return $this->closedGopSize;
  }
  /**
   * @param string
   */
  public function setCodecFourcc($codecFourcc)
  {
    $this->codecFourcc = $codecFourcc;
  }
  /**
   * @return string
   */
  public function getCodecFourcc()
  {
    return $this->codecFourcc;
  }
  /**
   * @param string
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return string
   */
  public function getCodecId()
  {
    return $this->codecId;
  }
  /**
   * @param string
   */
  public function setCodecString($codecString)
  {
    $this->codecString = $codecString;
  }
  /**
   * @return string
   */
  public function getCodecString()
  {
    return $this->codecString;
  }
  /**
   * @param VideoFileColorInfo
   */
  public function setColorInfo(VideoFileColorInfo $colorInfo)
  {
    $this->colorInfo = $colorInfo;
  }
  /**
   * @return VideoFileColorInfo
   */
  public function getColorInfo()
  {
    return $this->colorInfo;
  }
  /**
   * @param VideoFileContentLightLevel
   */
  public function setContentLightLevel(VideoFileContentLightLevel $contentLightLevel)
  {
    $this->contentLightLevel = $contentLightLevel;
  }
  /**
   * @return VideoFileContentLightLevel
   */
  public function getContentLightLevel()
  {
    return $this->contentLightLevel;
  }
  /**
   * @param string
   */
  public function setDecodeOffset($decodeOffset)
  {
    $this->decodeOffset = $decodeOffset;
  }
  /**
   * @return string
   */
  public function getDecodeOffset()
  {
    return $this->decodeOffset;
  }
  /**
   * @param int
   */
  public function setDisplayHeight($displayHeight)
  {
    $this->displayHeight = $displayHeight;
  }
  /**
   * @return int
   */
  public function getDisplayHeight()
  {
    return $this->displayHeight;
  }
  /**
   * @param int
   */
  public function setDisplayWidth($displayWidth)
  {
    $this->displayWidth = $displayWidth;
  }
  /**
   * @return int
   */
  public function getDisplayWidth()
  {
    return $this->displayWidth;
  }
  /**
   * @param VideoDoViDecoderConfiguration
   */
  public function setDoviConfiguration(VideoDoViDecoderConfiguration $doviConfiguration)
  {
    $this->doviConfiguration = $doviConfiguration;
  }
  /**
   * @return VideoDoViDecoderConfiguration
   */
  public function getDoviConfiguration()
  {
    return $this->doviConfiguration;
  }
  /**
   * @param string
   */
  public function setEndTimestamp($endTimestamp)
  {
    $this->endTimestamp = $endTimestamp;
  }
  /**
   * @return string
   */
  public function getEndTimestamp()
  {
    return $this->endTimestamp;
  }
  /**
   * @param string
   */
  public function setFlip($flip)
  {
    $this->flip = $flip;
  }
  /**
   * @return string
   */
  public function getFlip()
  {
    return $this->flip;
  }
  public function setFps($fps)
  {
    $this->fps = $fps;
  }
  public function getFps()
  {
    return $this->fps;
  }
  /**
   * @param string
   */
  public function setFrameSize($frameSize)
  {
    $this->frameSize = $frameSize;
  }
  /**
   * @return string
   */
  public function getFrameSize()
  {
    return $this->frameSize;
  }
  /**
   * @param VideoVideoStreamInfoVideoStreamStatistics
   */
  public function setGopSize(VideoVideoStreamInfoVideoStreamStatistics $gopSize)
  {
    $this->gopSize = $gopSize;
  }
  /**
   * @return VideoVideoStreamInfoVideoStreamStatistics
   */
  public function getGopSize()
  {
    return $this->gopSize;
  }
  /**
   * @param bool
   */
  public function setHasBFrames($hasBFrames)
  {
    $this->hasBFrames = $hasBFrames;
  }
  /**
   * @return bool
   */
  public function getHasBFrames()
  {
    return $this->hasBFrames;
  }
  /**
   * @param VideoFileHDR10PlusStats
   */
  public function setHdr10PlusStats(VideoFileHDR10PlusStats $hdr10PlusStats)
  {
    $this->hdr10PlusStats = $hdr10PlusStats;
  }
  /**
   * @return VideoFileHDR10PlusStats
   */
  public function getHdr10PlusStats()
  {
    return $this->hdr10PlusStats;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setInterlace($interlace)
  {
    $this->interlace = $interlace;
  }
  /**
   * @return string
   */
  public function getInterlace()
  {
    return $this->interlace;
  }
  /**
   * @param bool
   */
  public function setIsInsaneSize($isInsaneSize)
  {
    $this->isInsaneSize = $isInsaneSize;
  }
  /**
   * @return bool
   */
  public function getIsInsaneSize()
  {
    return $this->isInsaneSize;
  }
  /**
   * @param VideoUserDataRegisteredItuTT35[]
   */
  public function setItuTT35($ituTT35)
  {
    $this->ituTT35 = $ituTT35;
  }
  /**
   * @return VideoUserDataRegisteredItuTT35[]
   */
  public function getItuTT35()
  {
    return $this->ituTT35;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  /**
   * @param int
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return int
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param VideoFileMasteringDisplayMetadata
   */
  public function setMasteringDisplayMetadata(VideoFileMasteringDisplayMetadata $masteringDisplayMetadata)
  {
    $this->masteringDisplayMetadata = $masteringDisplayMetadata;
  }
  /**
   * @return VideoFileMasteringDisplayMetadata
   */
  public function getMasteringDisplayMetadata()
  {
    return $this->masteringDisplayMetadata;
  }
  public function setMaxFps($maxFps)
  {
    $this->maxFps = $maxFps;
  }
  public function getMaxFps()
  {
    return $this->maxFps;
  }
  /**
   * @param VideoClipInfo[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return VideoClipInfo[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setMinFps($minFps)
  {
    $this->minFps = $minFps;
  }
  public function getMinFps()
  {
    return $this->minFps;
  }
  /**
   * @param string
   */
  public function setNumberOfFrames($numberOfFrames)
  {
    $this->numberOfFrames = $numberOfFrames;
  }
  /**
   * @return string
   */
  public function getNumberOfFrames()
  {
    return $this->numberOfFrames;
  }
  /**
   * @param int
   */
  public function setNumberOfInvisibleFrames($numberOfInvisibleFrames)
  {
    $this->numberOfInvisibleFrames = $numberOfInvisibleFrames;
  }
  /**
   * @return int
   */
  public function getNumberOfInvisibleFrames()
  {
    return $this->numberOfInvisibleFrames;
  }
  /**
   * @param string
   */
  public function setPixFmt($pixFmt)
  {
    $this->pixFmt = $pixFmt;
  }
  /**
   * @return string
   */
  public function getPixFmt()
  {
    return $this->pixFmt;
  }
  public function setPixelAspectRatio($pixelAspectRatio)
  {
    $this->pixelAspectRatio = $pixelAspectRatio;
  }
  public function getPixelAspectRatio()
  {
    return $this->pixelAspectRatio;
  }
  /**
   * @param string
   */
  public function setProfile($profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return string
   */
  public function getProfile()
  {
    return $this->profile;
  }
  /**
   * @param VideoRational32
   */
  public function setRationalFps(VideoRational32 $rationalFps)
  {
    $this->rationalFps = $rationalFps;
  }
  /**
   * @return VideoRational32
   */
  public function getRationalFps()
  {
    return $this->rationalFps;
  }
  /**
   * @param string
   */
  public function setRotation($rotation)
  {
    $this->rotation = $rotation;
  }
  /**
   * @return string
   */
  public function getRotation()
  {
    return $this->rotation;
  }
  /**
   * @param VideoSEIMessage[]
   */
  public function setSeiMessage($seiMessage)
  {
    $this->seiMessage = $seiMessage;
  }
  /**
   * @return VideoSEIMessage[]
   */
  public function getSeiMessage()
  {
    return $this->seiMessage;
  }
  /**
   * @param VideoFileSphericalMetadata
   */
  public function setSpherical(VideoFileSphericalMetadata $spherical)
  {
    $this->spherical = $spherical;
  }
  /**
   * @return VideoFileSphericalMetadata
   */
  public function getSpherical()
  {
    return $this->spherical;
  }
  /**
   * @param string
   */
  public function setStartTimestamp($startTimestamp)
  {
    $this->startTimestamp = $startTimestamp;
  }
  /**
   * @return string
   */
  public function getStartTimestamp()
  {
    return $this->startTimestamp;
  }
  /**
   * @param string
   */
  public function setStreamCodecTag($streamCodecTag)
  {
    $this->streamCodecTag = $streamCodecTag;
  }
  /**
   * @return string
   */
  public function getStreamCodecTag()
  {
    return $this->streamCodecTag;
  }
  /**
   * @param string
   */
  public function setStreamIndex($streamIndex)
  {
    $this->streamIndex = $streamIndex;
  }
  /**
   * @return string
   */
  public function getStreamIndex()
  {
    return $this->streamIndex;
  }
  /**
   * @param VideoUserDataUnregistered[]
   */
  public function setUserDataUnregistered($userDataUnregistered)
  {
    $this->userDataUnregistered = $userDataUnregistered;
  }
  /**
   * @return VideoUserDataUnregistered[]
   */
  public function getUserDataUnregistered()
  {
    return $this->userDataUnregistered;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoStreamInfoVideoStream::class, 'Google_Service_Contentwarehouse_VideoVideoStreamInfoVideoStream');
