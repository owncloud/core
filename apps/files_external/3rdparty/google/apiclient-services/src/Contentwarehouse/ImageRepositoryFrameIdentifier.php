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

class ImageRepositoryFrameIdentifier extends \Google\Model
{
  protected $previewFrameZeroVariantType = ImageRepositoryFrameIdentifierPreviewFrameZeroVariant::class;
  protected $previewFrameZeroVariantDataType = '';
  protected $thumbnailVariantType = ImageRepositoryFrameIdentifierThumbnailVariant::class;
  protected $thumbnailVariantDataType = '';
  /**
   * @var int
   */
  public $timestampMs;

  /**
   * @param ImageRepositoryFrameIdentifierPreviewFrameZeroVariant
   */
  public function setPreviewFrameZeroVariant(ImageRepositoryFrameIdentifierPreviewFrameZeroVariant $previewFrameZeroVariant)
  {
    $this->previewFrameZeroVariant = $previewFrameZeroVariant;
  }
  /**
   * @return ImageRepositoryFrameIdentifierPreviewFrameZeroVariant
   */
  public function getPreviewFrameZeroVariant()
  {
    return $this->previewFrameZeroVariant;
  }
  /**
   * @param ImageRepositoryFrameIdentifierThumbnailVariant
   */
  public function setThumbnailVariant(ImageRepositoryFrameIdentifierThumbnailVariant $thumbnailVariant)
  {
    $this->thumbnailVariant = $thumbnailVariant;
  }
  /**
   * @return ImageRepositoryFrameIdentifierThumbnailVariant
   */
  public function getThumbnailVariant()
  {
    return $this->thumbnailVariant;
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
class_alias(ImageRepositoryFrameIdentifier::class, 'Google_Service_Contentwarehouse_ImageRepositoryFrameIdentifier');
