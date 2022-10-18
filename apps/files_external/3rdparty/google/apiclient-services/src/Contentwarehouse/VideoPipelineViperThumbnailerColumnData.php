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

class VideoPipelineViperThumbnailerColumnData extends \Google\Collection
{
  protected $collection_key = 'frameBlobRefs';
  protected $frameBlobRefsType = BlobstoreBlobRef::class;
  protected $frameBlobRefsDataType = 'array';
  protected $frameFileListType = VideoThumbnailsFrameFileList::class;
  protected $frameFileListDataType = '';
  /**
   * @var string
   */
  public $frameTypeGenerated;
  /**
   * @var bool
   */
  public $generatedFromDrishtiThumbnailer;
  /**
   * @var bool
   */
  public $highResPreviewThumbnailGenerated;
  /**
   * @var bool
   */
  public $hq720Generated;
  /**
   * @var bool
   */
  public $hqdefaultGenerated;
  /**
   * @var bool
   */
  public $hvcBackupGenerated;
  /**
   * @var bool
   */
  public $improvedVerticalGenerated;
  /**
   * @var bool
   */
  public $maxresdefaultGenerated;
  /**
   * @var int
   */
  public $maxresdefaultHeight;
  /**
   * @var int
   */
  public $maxresdefaultWidth;
  /**
   * @var bool
   */
  public $movingThumbnailGenerated;
  /**
   * @var bool
   */
  public $privateThumbnailsGenerated;
  /**
   * @var bool
   */
  public $publicThumbnailsGenerated;
  /**
   * @var string
   */
  public $rerunStatus;
  /**
   * @var bool
   */
  public $sddefaultGenerated;
  /**
   * @var bool
   */
  public $storyboardGenerated;
  /**
   * @var int
   */
  public $storyboardNumLevels;
  /**
   * @var int
   */
  public $storyboardPolicy;
  /**
   * @var int
   */
  public $storyboardVersion;
  /**
   * @var int
   */
  public $storyboardVideoDurationMs;
  /**
   * @var int
   */
  public $storyboardVideoHeight;
  /**
   * @var int
   */
  public $storyboardVideoWidth;
  /**
   * @var bool
   */
  public $webpGenerated;

  /**
   * @param BlobstoreBlobRef[]
   */
  public function setFrameBlobRefs($frameBlobRefs)
  {
    $this->frameBlobRefs = $frameBlobRefs;
  }
  /**
   * @return BlobstoreBlobRef[]
   */
  public function getFrameBlobRefs()
  {
    return $this->frameBlobRefs;
  }
  /**
   * @param VideoThumbnailsFrameFileList
   */
  public function setFrameFileList(VideoThumbnailsFrameFileList $frameFileList)
  {
    $this->frameFileList = $frameFileList;
  }
  /**
   * @return VideoThumbnailsFrameFileList
   */
  public function getFrameFileList()
  {
    return $this->frameFileList;
  }
  /**
   * @param string
   */
  public function setFrameTypeGenerated($frameTypeGenerated)
  {
    $this->frameTypeGenerated = $frameTypeGenerated;
  }
  /**
   * @return string
   */
  public function getFrameTypeGenerated()
  {
    return $this->frameTypeGenerated;
  }
  /**
   * @param bool
   */
  public function setGeneratedFromDrishtiThumbnailer($generatedFromDrishtiThumbnailer)
  {
    $this->generatedFromDrishtiThumbnailer = $generatedFromDrishtiThumbnailer;
  }
  /**
   * @return bool
   */
  public function getGeneratedFromDrishtiThumbnailer()
  {
    return $this->generatedFromDrishtiThumbnailer;
  }
  /**
   * @param bool
   */
  public function setHighResPreviewThumbnailGenerated($highResPreviewThumbnailGenerated)
  {
    $this->highResPreviewThumbnailGenerated = $highResPreviewThumbnailGenerated;
  }
  /**
   * @return bool
   */
  public function getHighResPreviewThumbnailGenerated()
  {
    return $this->highResPreviewThumbnailGenerated;
  }
  /**
   * @param bool
   */
  public function setHq720Generated($hq720Generated)
  {
    $this->hq720Generated = $hq720Generated;
  }
  /**
   * @return bool
   */
  public function getHq720Generated()
  {
    return $this->hq720Generated;
  }
  /**
   * @param bool
   */
  public function setHqdefaultGenerated($hqdefaultGenerated)
  {
    $this->hqdefaultGenerated = $hqdefaultGenerated;
  }
  /**
   * @return bool
   */
  public function getHqdefaultGenerated()
  {
    return $this->hqdefaultGenerated;
  }
  /**
   * @param bool
   */
  public function setHvcBackupGenerated($hvcBackupGenerated)
  {
    $this->hvcBackupGenerated = $hvcBackupGenerated;
  }
  /**
   * @return bool
   */
  public function getHvcBackupGenerated()
  {
    return $this->hvcBackupGenerated;
  }
  /**
   * @param bool
   */
  public function setImprovedVerticalGenerated($improvedVerticalGenerated)
  {
    $this->improvedVerticalGenerated = $improvedVerticalGenerated;
  }
  /**
   * @return bool
   */
  public function getImprovedVerticalGenerated()
  {
    return $this->improvedVerticalGenerated;
  }
  /**
   * @param bool
   */
  public function setMaxresdefaultGenerated($maxresdefaultGenerated)
  {
    $this->maxresdefaultGenerated = $maxresdefaultGenerated;
  }
  /**
   * @return bool
   */
  public function getMaxresdefaultGenerated()
  {
    return $this->maxresdefaultGenerated;
  }
  /**
   * @param int
   */
  public function setMaxresdefaultHeight($maxresdefaultHeight)
  {
    $this->maxresdefaultHeight = $maxresdefaultHeight;
  }
  /**
   * @return int
   */
  public function getMaxresdefaultHeight()
  {
    return $this->maxresdefaultHeight;
  }
  /**
   * @param int
   */
  public function setMaxresdefaultWidth($maxresdefaultWidth)
  {
    $this->maxresdefaultWidth = $maxresdefaultWidth;
  }
  /**
   * @return int
   */
  public function getMaxresdefaultWidth()
  {
    return $this->maxresdefaultWidth;
  }
  /**
   * @param bool
   */
  public function setMovingThumbnailGenerated($movingThumbnailGenerated)
  {
    $this->movingThumbnailGenerated = $movingThumbnailGenerated;
  }
  /**
   * @return bool
   */
  public function getMovingThumbnailGenerated()
  {
    return $this->movingThumbnailGenerated;
  }
  /**
   * @param bool
   */
  public function setPrivateThumbnailsGenerated($privateThumbnailsGenerated)
  {
    $this->privateThumbnailsGenerated = $privateThumbnailsGenerated;
  }
  /**
   * @return bool
   */
  public function getPrivateThumbnailsGenerated()
  {
    return $this->privateThumbnailsGenerated;
  }
  /**
   * @param bool
   */
  public function setPublicThumbnailsGenerated($publicThumbnailsGenerated)
  {
    $this->publicThumbnailsGenerated = $publicThumbnailsGenerated;
  }
  /**
   * @return bool
   */
  public function getPublicThumbnailsGenerated()
  {
    return $this->publicThumbnailsGenerated;
  }
  /**
   * @param string
   */
  public function setRerunStatus($rerunStatus)
  {
    $this->rerunStatus = $rerunStatus;
  }
  /**
   * @return string
   */
  public function getRerunStatus()
  {
    return $this->rerunStatus;
  }
  /**
   * @param bool
   */
  public function setSddefaultGenerated($sddefaultGenerated)
  {
    $this->sddefaultGenerated = $sddefaultGenerated;
  }
  /**
   * @return bool
   */
  public function getSddefaultGenerated()
  {
    return $this->sddefaultGenerated;
  }
  /**
   * @param bool
   */
  public function setStoryboardGenerated($storyboardGenerated)
  {
    $this->storyboardGenerated = $storyboardGenerated;
  }
  /**
   * @return bool
   */
  public function getStoryboardGenerated()
  {
    return $this->storyboardGenerated;
  }
  /**
   * @param int
   */
  public function setStoryboardNumLevels($storyboardNumLevels)
  {
    $this->storyboardNumLevels = $storyboardNumLevels;
  }
  /**
   * @return int
   */
  public function getStoryboardNumLevels()
  {
    return $this->storyboardNumLevels;
  }
  /**
   * @param int
   */
  public function setStoryboardPolicy($storyboardPolicy)
  {
    $this->storyboardPolicy = $storyboardPolicy;
  }
  /**
   * @return int
   */
  public function getStoryboardPolicy()
  {
    return $this->storyboardPolicy;
  }
  /**
   * @param int
   */
  public function setStoryboardVersion($storyboardVersion)
  {
    $this->storyboardVersion = $storyboardVersion;
  }
  /**
   * @return int
   */
  public function getStoryboardVersion()
  {
    return $this->storyboardVersion;
  }
  /**
   * @param int
   */
  public function setStoryboardVideoDurationMs($storyboardVideoDurationMs)
  {
    $this->storyboardVideoDurationMs = $storyboardVideoDurationMs;
  }
  /**
   * @return int
   */
  public function getStoryboardVideoDurationMs()
  {
    return $this->storyboardVideoDurationMs;
  }
  /**
   * @param int
   */
  public function setStoryboardVideoHeight($storyboardVideoHeight)
  {
    $this->storyboardVideoHeight = $storyboardVideoHeight;
  }
  /**
   * @return int
   */
  public function getStoryboardVideoHeight()
  {
    return $this->storyboardVideoHeight;
  }
  /**
   * @param int
   */
  public function setStoryboardVideoWidth($storyboardVideoWidth)
  {
    $this->storyboardVideoWidth = $storyboardVideoWidth;
  }
  /**
   * @return int
   */
  public function getStoryboardVideoWidth()
  {
    return $this->storyboardVideoWidth;
  }
  /**
   * @param bool
   */
  public function setWebpGenerated($webpGenerated)
  {
    $this->webpGenerated = $webpGenerated;
  }
  /**
   * @return bool
   */
  public function getWebpGenerated()
  {
    return $this->webpGenerated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoPipelineViperThumbnailerColumnData::class, 'Google_Service_Contentwarehouse_VideoPipelineViperThumbnailerColumnData');
