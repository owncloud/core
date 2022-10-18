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

class VideoContentSearchAnchorThumbnailInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $colorEntropy;
  protected $imageDataType = ImageData::class;
  protected $imageDataDataType = '';
  /**
   * @var bool
   */
  public $isUnsafe;
  protected $starburstV4EmbeddingType = DrishtiDenseFeatureData::class;
  protected $starburstV4EmbeddingDataType = '';
  /**
   * @var string
   */
  public $thumbnailBytes;

  /**
   * @param float
   */
  public function setColorEntropy($colorEntropy)
  {
    $this->colorEntropy = $colorEntropy;
  }
  /**
   * @return float
   */
  public function getColorEntropy()
  {
    return $this->colorEntropy;
  }
  /**
   * @param ImageData
   */
  public function setImageData(ImageData $imageData)
  {
    $this->imageData = $imageData;
  }
  /**
   * @return ImageData
   */
  public function getImageData()
  {
    return $this->imageData;
  }
  /**
   * @param bool
   */
  public function setIsUnsafe($isUnsafe)
  {
    $this->isUnsafe = $isUnsafe;
  }
  /**
   * @return bool
   */
  public function getIsUnsafe()
  {
    return $this->isUnsafe;
  }
  /**
   * @param DrishtiDenseFeatureData
   */
  public function setStarburstV4Embedding(DrishtiDenseFeatureData $starburstV4Embedding)
  {
    $this->starburstV4Embedding = $starburstV4Embedding;
  }
  /**
   * @return DrishtiDenseFeatureData
   */
  public function getStarburstV4Embedding()
  {
    return $this->starburstV4Embedding;
  }
  /**
   * @param string
   */
  public function setThumbnailBytes($thumbnailBytes)
  {
    $this->thumbnailBytes = $thumbnailBytes;
  }
  /**
   * @return string
   */
  public function getThumbnailBytes()
  {
    return $this->thumbnailBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorThumbnailInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorThumbnailInfo');
