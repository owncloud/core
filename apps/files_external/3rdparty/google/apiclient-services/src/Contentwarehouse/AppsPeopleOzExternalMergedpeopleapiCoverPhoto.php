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

class AppsPeopleOzExternalMergedpeopleapiCoverPhoto extends \Google\Model
{
  /**
   * @var int
   */
  public $imageHeight;
  /**
   * @var string
   */
  public $imageId;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var int
   */
  public $imageWidth;
  /**
   * @var bool
   */
  public $isAnimated;
  /**
   * @var bool
   */
  public $isDefault;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param int
   */
  public function setImageHeight($imageHeight)
  {
    $this->imageHeight = $imageHeight;
  }
  /**
   * @return int
   */
  public function getImageHeight()
  {
    return $this->imageHeight;
  }
  /**
   * @param string
   */
  public function setImageId($imageId)
  {
    $this->imageId = $imageId;
  }
  /**
   * @return string
   */
  public function getImageId()
  {
    return $this->imageId;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param int
   */
  public function setImageWidth($imageWidth)
  {
    $this->imageWidth = $imageWidth;
  }
  /**
   * @return int
   */
  public function getImageWidth()
  {
    return $this->imageWidth;
  }
  /**
   * @param bool
   */
  public function setIsAnimated($isAnimated)
  {
    $this->isAnimated = $isAnimated;
  }
  /**
   * @return bool
   */
  public function getIsAnimated()
  {
    return $this->isAnimated;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiCoverPhoto::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiCoverPhoto');
