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

class VideoContentSearchAnchorThumbnail extends \Google\Model
{
  /**
   * @var string
   */
  public $imagesearchDocid;
  /**
   * @var bool
   */
  public $isThumbnailMissing;
  protected $servingMetadataType = ImageBaseThumbnailMetadata::class;
  protected $servingMetadataDataType = '';
  protected $thumbnailInfoType = VideoContentSearchAnchorThumbnailInfo::class;
  protected $thumbnailInfoDataType = '';
  /**
   * @var int
   */
  public $timestampMs;

  /**
   * @param string
   */
  public function setImagesearchDocid($imagesearchDocid)
  {
    $this->imagesearchDocid = $imagesearchDocid;
  }
  /**
   * @return string
   */
  public function getImagesearchDocid()
  {
    return $this->imagesearchDocid;
  }
  /**
   * @param bool
   */
  public function setIsThumbnailMissing($isThumbnailMissing)
  {
    $this->isThumbnailMissing = $isThumbnailMissing;
  }
  /**
   * @return bool
   */
  public function getIsThumbnailMissing()
  {
    return $this->isThumbnailMissing;
  }
  /**
   * @param ImageBaseThumbnailMetadata
   */
  public function setServingMetadata(ImageBaseThumbnailMetadata $servingMetadata)
  {
    $this->servingMetadata = $servingMetadata;
  }
  /**
   * @return ImageBaseThumbnailMetadata
   */
  public function getServingMetadata()
  {
    return $this->servingMetadata;
  }
  /**
   * @param VideoContentSearchAnchorThumbnailInfo
   */
  public function setThumbnailInfo(VideoContentSearchAnchorThumbnailInfo $thumbnailInfo)
  {
    $this->thumbnailInfo = $thumbnailInfo;
  }
  /**
   * @return VideoContentSearchAnchorThumbnailInfo
   */
  public function getThumbnailInfo()
  {
    return $this->thumbnailInfo;
  }
  /**
   * @param int
   */
  public function setTimestampMs($timestampMs)
  {
    $this->timestampMs = $timestampMs;
  }
  /**
   * @return int
   */
  public function getTimestampMs()
  {
    return $this->timestampMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorThumbnail::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorThumbnail');
