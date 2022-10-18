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

class VideoVideoStreamInfo extends \Google\Collection
{
  protected $collection_key = 'videoStream';
  public $audioBitrate;
  /**
   * @var int
   */
  public $audioChannels;
  /**
   * @var string
   */
  public $audioCodecId;
  /**
   * @var string
   */
  public $audioEndTimestamp;
  /**
   * @var string
   */
  public $audioFrameSize;
  public $audioLength;
  /**
   * @var string
   */
  public $audioNumberOfFrames;
  /**
   * @var string
   */
  public $audioSampleRate;
  /**
   * @var int
   */
  public $audioSampleSize;
  /**
   * @var string
   */
  public $audioStartTimestamp;
  protected $audioStreamType = VideoVideoStreamInfoAudioStream::class;
  protected $audioStreamDataType = 'array';
  /**
   * @var string
   */
  public $audioStreamCodecTag;
  /**
   * @var int
   */
  public $avDistance;
  public $avLength;
  public $averageVideoFps;
  /**
   * @var string
   */
  public $buildLabel;
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $containerType;
  /**
   * @var bool
   */
  public $containsChapters;
  protected $dataStreamType = VideoVideoStreamInfoDataStream::class;
  protected $dataStreamDataType = 'array';
  /**
   * @var int
   */
  public $displayHeight;
  /**
   * @var int
   */
  public $displayWidth;
  /**
   * @var string
   */
  public $fileHeaderFingerprint;
  /**
   * @var string
   */
  public $fileMagic;
  /**
   * @var string
   */
  public $fileModifiedTime;
  /**
   * @var string
   */
  public $fileName;
  /**
   * @var string
   */
  public $fileSize;
  /**
   * @var int
   */
  public $fileType;
  protected $imageStreamType = VideoVideoStreamInfoVideoStream::class;
  protected $imageStreamDataType = 'array';
  /**
   * @var bool
   */
  public $isAsf;
  /**
   * @var bool
   */
  public $isImageFile;
  /**
   * @var bool
   */
  public $isVideoInsaneSize;
  /**
   * @var int
   */
  public $level;
  protected $metadataType = VideoVideoStreamInfoMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var int
   */
  public $numAudioStreams;
  /**
   * @var int
   */
  public $numDataStreams;
  /**
   * @var int
   */
  public $numImageStreams;
  /**
   * @var int
   */
  public $numTimedtextStreams;
  /**
   * @var int
   */
  public $numVideoStreams;
  /**
   * @var bool
   */
  public $parsedByFfmpeg;
  /**
   * @var bool
   */
  public $partialFile;
  /**
   * @var string
   */
  public $pixFmt;
  /**
   * @var string
   */
  public $profile;
  protected $timedtextStreamType = VideoVideoStreamInfoTimedTextStream::class;
  protected $timedtextStreamDataType = 'array';
  public $videoBitrate;
  protected $videoClipInfoType = VideoVideoClipInfo::class;
  protected $videoClipInfoDataType = '';
  /**
   * @var string
   */
  public $videoCodecId;
  /**
   * @var string
   */
  public $videoEndTimestamp;
  public $videoFps;
  /**
   * @var string
   */
  public $videoFrameSize;
  /**
   * @var bool
   */
  public $videoHasBFrames;
  /**
   * @var bool
   */
  public $videoHasFragments;
  /**
   * @var bool
   */
  public $videoHasLeadingMoovAtom;
  /**
   * @var bool
   */
  public $videoHasNonMonotonicDts;
  /**
   * @var bool
   */
  public $videoHasNonMonotonicPts;
  /**
   * @var bool
   */
  public $videoHasNonZeroStartEditList;
  /**
   * @var bool
   */
  public $videoHasPossibleOpenGop;
  /**
   * @var bool
   */
  public $videoHasVariableAspectRatio;
  /**
   * @var int
   */
  public $videoHeight;
  /**
   * @var string
   */
  public $videoInterlace;
  public $videoLength;
  /**
   * @var string
   */
  public $videoNumberOfFrames;
  /**
   * @var int
   */
  public $videoNumberOfInvisibleFrames;
  public $videoPixelAspectRatio;
  /**
   * @var string
   */
  public $videoRotation;
  /**
   * @var string
   */
  public $videoStartTimestamp;
  protected $videoStreamType = VideoVideoStreamInfoVideoStream::class;
  protected $videoStreamDataType = 'array';
  /**
   * @var int
   */
  public $videoStreamCodecTag;
  /**
   * @var int
   */
  public $videoWidth;
  /**
   * @var int
   */
  public $videostreaminfoVersion;
  public $yPsnr;

  public function setAudioBitrate($audioBitrate)
  {
    $this->audioBitrate = $audioBitrate;
  }
  public function getAudioBitrate()
  {
    return $this->audioBitrate;
  }
  /**
   * @param int
   */
  public function setAudioChannels($audioChannels)
  {
    $this->audioChannels = $audioChannels;
  }
  /**
   * @return int
   */
  public function getAudioChannels()
  {
    return $this->audioChannels;
  }
  /**
   * @param string
   */
  public function setAudioCodecId($audioCodecId)
  {
    $this->audioCodecId = $audioCodecId;
  }
  /**
   * @return string
   */
  public function getAudioCodecId()
  {
    return $this->audioCodecId;
  }
  /**
   * @param string
   */
  public function setAudioEndTimestamp($audioEndTimestamp)
  {
    $this->audioEndTimestamp = $audioEndTimestamp;
  }
  /**
   * @return string
   */
  public function getAudioEndTimestamp()
  {
    return $this->audioEndTimestamp;
  }
  /**
   * @param string
   */
  public function setAudioFrameSize($audioFrameSize)
  {
    $this->audioFrameSize = $audioFrameSize;
  }
  /**
   * @return string
   */
  public function getAudioFrameSize()
  {
    return $this->audioFrameSize;
  }
  public function setAudioLength($audioLength)
  {
    $this->audioLength = $audioLength;
  }
  public function getAudioLength()
  {
    return $this->audioLength;
  }
  /**
   * @param string
   */
  public function setAudioNumberOfFrames($audioNumberOfFrames)
  {
    $this->audioNumberOfFrames = $audioNumberOfFrames;
  }
  /**
   * @return string
   */
  public function getAudioNumberOfFrames()
  {
    return $this->audioNumberOfFrames;
  }
  /**
   * @param string
   */
  public function setAudioSampleRate($audioSampleRate)
  {
    $this->audioSampleRate = $audioSampleRate;
  }
  /**
   * @return string
   */
  public function getAudioSampleRate()
  {
    return $this->audioSampleRate;
  }
  /**
   * @param int
   */
  public function setAudioSampleSize($audioSampleSize)
  {
    $this->audioSampleSize = $audioSampleSize;
  }
  /**
   * @return int
   */
  public function getAudioSampleSize()
  {
    return $this->audioSampleSize;
  }
  /**
   * @param string
   */
  public function setAudioStartTimestamp($audioStartTimestamp)
  {
    $this->audioStartTimestamp = $audioStartTimestamp;
  }
  /**
   * @return string
   */
  public function getAudioStartTimestamp()
  {
    return $this->audioStartTimestamp;
  }
  /**
   * @param VideoVideoStreamInfoAudioStream[]
   */
  public function setAudioStream($audioStream)
  {
    $this->audioStream = $audioStream;
  }
  /**
   * @return VideoVideoStreamInfoAudioStream[]
   */
  public function getAudioStream()
  {
    return $this->audioStream;
  }
  /**
   * @param string
   */
  public function setAudioStreamCodecTag($audioStreamCodecTag)
  {
    $this->audioStreamCodecTag = $audioStreamCodecTag;
  }
  /**
   * @return string
   */
  public function getAudioStreamCodecTag()
  {
    return $this->audioStreamCodecTag;
  }
  /**
   * @param int
   */
  public function setAvDistance($avDistance)
  {
    $this->avDistance = $avDistance;
  }
  /**
   * @return int
   */
  public function getAvDistance()
  {
    return $this->avDistance;
  }
  public function setAvLength($avLength)
  {
    $this->avLength = $avLength;
  }
  public function getAvLength()
  {
    return $this->avLength;
  }
  public function setAverageVideoFps($averageVideoFps)
  {
    $this->averageVideoFps = $averageVideoFps;
  }
  public function getAverageVideoFps()
  {
    return $this->averageVideoFps;
  }
  /**
   * @param string
   */
  public function setBuildLabel($buildLabel)
  {
    $this->buildLabel = $buildLabel;
  }
  /**
   * @return string
   */
  public function getBuildLabel()
  {
    return $this->buildLabel;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string
   */
  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return string
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param bool
   */
  public function setContainsChapters($containsChapters)
  {
    $this->containsChapters = $containsChapters;
  }
  /**
   * @return bool
   */
  public function getContainsChapters()
  {
    return $this->containsChapters;
  }
  /**
   * @param VideoVideoStreamInfoDataStream[]
   */
  public function setDataStream($dataStream)
  {
    $this->dataStream = $dataStream;
  }
  /**
   * @return VideoVideoStreamInfoDataStream[]
   */
  public function getDataStream()
  {
    return $this->dataStream;
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
   * @param string
   */
  public function setFileHeaderFingerprint($fileHeaderFingerprint)
  {
    $this->fileHeaderFingerprint = $fileHeaderFingerprint;
  }
  /**
   * @return string
   */
  public function getFileHeaderFingerprint()
  {
    return $this->fileHeaderFingerprint;
  }
  /**
   * @param string
   */
  public function setFileMagic($fileMagic)
  {
    $this->fileMagic = $fileMagic;
  }
  /**
   * @return string
   */
  public function getFileMagic()
  {
    return $this->fileMagic;
  }
  /**
   * @param string
   */
  public function setFileModifiedTime($fileModifiedTime)
  {
    $this->fileModifiedTime = $fileModifiedTime;
  }
  /**
   * @return string
   */
  public function getFileModifiedTime()
  {
    return $this->fileModifiedTime;
  }
  /**
   * @param string
   */
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  /**
   * @return string
   */
  public function getFileName()
  {
    return $this->fileName;
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
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  /**
   * @return int
   */
  public function getFileType()
  {
    return $this->fileType;
  }
  /**
   * @param VideoVideoStreamInfoVideoStream[]
   */
  public function setImageStream($imageStream)
  {
    $this->imageStream = $imageStream;
  }
  /**
   * @return VideoVideoStreamInfoVideoStream[]
   */
  public function getImageStream()
  {
    return $this->imageStream;
  }
  /**
   * @param bool
   */
  public function setIsAsf($isAsf)
  {
    $this->isAsf = $isAsf;
  }
  /**
   * @return bool
   */
  public function getIsAsf()
  {
    return $this->isAsf;
  }
  /**
   * @param bool
   */
  public function setIsImageFile($isImageFile)
  {
    $this->isImageFile = $isImageFile;
  }
  /**
   * @return bool
   */
  public function getIsImageFile()
  {
    return $this->isImageFile;
  }
  /**
   * @param bool
   */
  public function setIsVideoInsaneSize($isVideoInsaneSize)
  {
    $this->isVideoInsaneSize = $isVideoInsaneSize;
  }
  /**
   * @return bool
   */
  public function getIsVideoInsaneSize()
  {
    return $this->isVideoInsaneSize;
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
   * @param VideoVideoStreamInfoMetadata
   */
  public function setMetadata(VideoVideoStreamInfoMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return VideoVideoStreamInfoMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param int
   */
  public function setNumAudioStreams($numAudioStreams)
  {
    $this->numAudioStreams = $numAudioStreams;
  }
  /**
   * @return int
   */
  public function getNumAudioStreams()
  {
    return $this->numAudioStreams;
  }
  /**
   * @param int
   */
  public function setNumDataStreams($numDataStreams)
  {
    $this->numDataStreams = $numDataStreams;
  }
  /**
   * @return int
   */
  public function getNumDataStreams()
  {
    return $this->numDataStreams;
  }
  /**
   * @param int
   */
  public function setNumImageStreams($numImageStreams)
  {
    $this->numImageStreams = $numImageStreams;
  }
  /**
   * @return int
   */
  public function getNumImageStreams()
  {
    return $this->numImageStreams;
  }
  /**
   * @param int
   */
  public function setNumTimedtextStreams($numTimedtextStreams)
  {
    $this->numTimedtextStreams = $numTimedtextStreams;
  }
  /**
   * @return int
   */
  public function getNumTimedtextStreams()
  {
    return $this->numTimedtextStreams;
  }
  /**
   * @param int
   */
  public function setNumVideoStreams($numVideoStreams)
  {
    $this->numVideoStreams = $numVideoStreams;
  }
  /**
   * @return int
   */
  public function getNumVideoStreams()
  {
    return $this->numVideoStreams;
  }
  /**
   * @param bool
   */
  public function setParsedByFfmpeg($parsedByFfmpeg)
  {
    $this->parsedByFfmpeg = $parsedByFfmpeg;
  }
  /**
   * @return bool
   */
  public function getParsedByFfmpeg()
  {
    return $this->parsedByFfmpeg;
  }
  /**
   * @param bool
   */
  public function setPartialFile($partialFile)
  {
    $this->partialFile = $partialFile;
  }
  /**
   * @return bool
   */
  public function getPartialFile()
  {
    return $this->partialFile;
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
   * @param VideoVideoStreamInfoTimedTextStream[]
   */
  public function setTimedtextStream($timedtextStream)
  {
    $this->timedtextStream = $timedtextStream;
  }
  /**
   * @return VideoVideoStreamInfoTimedTextStream[]
   */
  public function getTimedtextStream()
  {
    return $this->timedtextStream;
  }
  public function setVideoBitrate($videoBitrate)
  {
    $this->videoBitrate = $videoBitrate;
  }
  public function getVideoBitrate()
  {
    return $this->videoBitrate;
  }
  /**
   * @param VideoVideoClipInfo
   */
  public function setVideoClipInfo(VideoVideoClipInfo $videoClipInfo)
  {
    $this->videoClipInfo = $videoClipInfo;
  }
  /**
   * @return VideoVideoClipInfo
   */
  public function getVideoClipInfo()
  {
    return $this->videoClipInfo;
  }
  /**
   * @param string
   */
  public function setVideoCodecId($videoCodecId)
  {
    $this->videoCodecId = $videoCodecId;
  }
  /**
   * @return string
   */
  public function getVideoCodecId()
  {
    return $this->videoCodecId;
  }
  /**
   * @param string
   */
  public function setVideoEndTimestamp($videoEndTimestamp)
  {
    $this->videoEndTimestamp = $videoEndTimestamp;
  }
  /**
   * @return string
   */
  public function getVideoEndTimestamp()
  {
    return $this->videoEndTimestamp;
  }
  public function setVideoFps($videoFps)
  {
    $this->videoFps = $videoFps;
  }
  public function getVideoFps()
  {
    return $this->videoFps;
  }
  /**
   * @param string
   */
  public function setVideoFrameSize($videoFrameSize)
  {
    $this->videoFrameSize = $videoFrameSize;
  }
  /**
   * @return string
   */
  public function getVideoFrameSize()
  {
    return $this->videoFrameSize;
  }
  /**
   * @param bool
   */
  public function setVideoHasBFrames($videoHasBFrames)
  {
    $this->videoHasBFrames = $videoHasBFrames;
  }
  /**
   * @return bool
   */
  public function getVideoHasBFrames()
  {
    return $this->videoHasBFrames;
  }
  /**
   * @param bool
   */
  public function setVideoHasFragments($videoHasFragments)
  {
    $this->videoHasFragments = $videoHasFragments;
  }
  /**
   * @return bool
   */
  public function getVideoHasFragments()
  {
    return $this->videoHasFragments;
  }
  /**
   * @param bool
   */
  public function setVideoHasLeadingMoovAtom($videoHasLeadingMoovAtom)
  {
    $this->videoHasLeadingMoovAtom = $videoHasLeadingMoovAtom;
  }
  /**
   * @return bool
   */
  public function getVideoHasLeadingMoovAtom()
  {
    return $this->videoHasLeadingMoovAtom;
  }
  /**
   * @param bool
   */
  public function setVideoHasNonMonotonicDts($videoHasNonMonotonicDts)
  {
    $this->videoHasNonMonotonicDts = $videoHasNonMonotonicDts;
  }
  /**
   * @return bool
   */
  public function getVideoHasNonMonotonicDts()
  {
    return $this->videoHasNonMonotonicDts;
  }
  /**
   * @param bool
   */
  public function setVideoHasNonMonotonicPts($videoHasNonMonotonicPts)
  {
    $this->videoHasNonMonotonicPts = $videoHasNonMonotonicPts;
  }
  /**
   * @return bool
   */
  public function getVideoHasNonMonotonicPts()
  {
    return $this->videoHasNonMonotonicPts;
  }
  /**
   * @param bool
   */
  public function setVideoHasNonZeroStartEditList($videoHasNonZeroStartEditList)
  {
    $this->videoHasNonZeroStartEditList = $videoHasNonZeroStartEditList;
  }
  /**
   * @return bool
   */
  public function getVideoHasNonZeroStartEditList()
  {
    return $this->videoHasNonZeroStartEditList;
  }
  /**
   * @param bool
   */
  public function setVideoHasPossibleOpenGop($videoHasPossibleOpenGop)
  {
    $this->videoHasPossibleOpenGop = $videoHasPossibleOpenGop;
  }
  /**
   * @return bool
   */
  public function getVideoHasPossibleOpenGop()
  {
    return $this->videoHasPossibleOpenGop;
  }
  /**
   * @param bool
   */
  public function setVideoHasVariableAspectRatio($videoHasVariableAspectRatio)
  {
    $this->videoHasVariableAspectRatio = $videoHasVariableAspectRatio;
  }
  /**
   * @return bool
   */
  public function getVideoHasVariableAspectRatio()
  {
    return $this->videoHasVariableAspectRatio;
  }
  /**
   * @param int
   */
  public function setVideoHeight($videoHeight)
  {
    $this->videoHeight = $videoHeight;
  }
  /**
   * @return int
   */
  public function getVideoHeight()
  {
    return $this->videoHeight;
  }
  /**
   * @param string
   */
  public function setVideoInterlace($videoInterlace)
  {
    $this->videoInterlace = $videoInterlace;
  }
  /**
   * @return string
   */
  public function getVideoInterlace()
  {
    return $this->videoInterlace;
  }
  public function setVideoLength($videoLength)
  {
    $this->videoLength = $videoLength;
  }
  public function getVideoLength()
  {
    return $this->videoLength;
  }
  /**
   * @param string
   */
  public function setVideoNumberOfFrames($videoNumberOfFrames)
  {
    $this->videoNumberOfFrames = $videoNumberOfFrames;
  }
  /**
   * @return string
   */
  public function getVideoNumberOfFrames()
  {
    return $this->videoNumberOfFrames;
  }
  /**
   * @param int
   */
  public function setVideoNumberOfInvisibleFrames($videoNumberOfInvisibleFrames)
  {
    $this->videoNumberOfInvisibleFrames = $videoNumberOfInvisibleFrames;
  }
  /**
   * @return int
   */
  public function getVideoNumberOfInvisibleFrames()
  {
    return $this->videoNumberOfInvisibleFrames;
  }
  public function setVideoPixelAspectRatio($videoPixelAspectRatio)
  {
    $this->videoPixelAspectRatio = $videoPixelAspectRatio;
  }
  public function getVideoPixelAspectRatio()
  {
    return $this->videoPixelAspectRatio;
  }
  /**
   * @param string
   */
  public function setVideoRotation($videoRotation)
  {
    $this->videoRotation = $videoRotation;
  }
  /**
   * @return string
   */
  public function getVideoRotation()
  {
    return $this->videoRotation;
  }
  /**
   * @param string
   */
  public function setVideoStartTimestamp($videoStartTimestamp)
  {
    $this->videoStartTimestamp = $videoStartTimestamp;
  }
  /**
   * @return string
   */
  public function getVideoStartTimestamp()
  {
    return $this->videoStartTimestamp;
  }
  /**
   * @param VideoVideoStreamInfoVideoStream[]
   */
  public function setVideoStream($videoStream)
  {
    $this->videoStream = $videoStream;
  }
  /**
   * @return VideoVideoStreamInfoVideoStream[]
   */
  public function getVideoStream()
  {
    return $this->videoStream;
  }
  /**
   * @param int
   */
  public function setVideoStreamCodecTag($videoStreamCodecTag)
  {
    $this->videoStreamCodecTag = $videoStreamCodecTag;
  }
  /**
   * @return int
   */
  public function getVideoStreamCodecTag()
  {
    return $this->videoStreamCodecTag;
  }
  /**
   * @param int
   */
  public function setVideoWidth($videoWidth)
  {
    $this->videoWidth = $videoWidth;
  }
  /**
   * @return int
   */
  public function getVideoWidth()
  {
    return $this->videoWidth;
  }
  /**
   * @param int
   */
  public function setVideostreaminfoVersion($videostreaminfoVersion)
  {
    $this->videostreaminfoVersion = $videostreaminfoVersion;
  }
  /**
   * @return int
   */
  public function getVideostreaminfoVersion()
  {
    return $this->videostreaminfoVersion;
  }
  public function setYPsnr($yPsnr)
  {
    $this->yPsnr = $yPsnr;
  }
  public function getYPsnr()
  {
    return $this->yPsnr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoStreamInfo::class, 'Google_Service_Contentwarehouse_VideoVideoStreamInfo');
