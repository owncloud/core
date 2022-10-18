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

class ImageBaseThumbnailMetadata extends \Google\Model
{
  /**
   * @var int
   */
  public $byteSize;
  protected $cropsType = ContentAwareCropsIndexing::class;
  protected $cropsDataType = '';
  protected $deepCropType = DeepCropIndexing::class;
  protected $deepCropDataType = '';
  protected $deepCropPixelsType = DeepCropPixels::class;
  protected $deepCropPixelsDataType = '';
  /**
   * @var string
   */
  public $docid;
  /**
   * @var string
   */
  public $encryptedDocid;
  /**
   * @var string
   */
  public $fprint;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var int
   */
  public $originalHeight;
  /**
   * @var int
   */
  public $originalWidth;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setByteSize($byteSize)
  {
    $this->byteSize = $byteSize;
  }
  /**
   * @return int
   */
  public function getByteSize()
  {
    return $this->byteSize;
  }
  /**
   * @param ContentAwareCropsIndexing
   */
  public function setCrops(ContentAwareCropsIndexing $crops)
  {
    $this->crops = $crops;
  }
  /**
   * @return ContentAwareCropsIndexing
   */
  public function getCrops()
  {
    return $this->crops;
  }
  /**
   * @param DeepCropIndexing
   */
  public function setDeepCrop(DeepCropIndexing $deepCrop)
  {
    $this->deepCrop = $deepCrop;
  }
  /**
   * @return DeepCropIndexing
   */
  public function getDeepCrop()
  {
    return $this->deepCrop;
  }
  /**
   * @param DeepCropPixels
   */
  public function setDeepCropPixels(DeepCropPixels $deepCropPixels)
  {
    $this->deepCropPixels = $deepCropPixels;
  }
  /**
   * @return DeepCropPixels
   */
  public function getDeepCropPixels()
  {
    return $this->deepCropPixels;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param string
   */
  public function setEncryptedDocid($encryptedDocid)
  {
    $this->encryptedDocid = $encryptedDocid;
  }
  /**
   * @return string
   */
  public function getEncryptedDocid()
  {
    return $this->encryptedDocid;
  }
  /**
   * @param string
   */
  public function setFprint($fprint)
  {
    $this->fprint = $fprint;
  }
  /**
   * @return string
   */
  public function getFprint()
  {
    return $this->fprint;
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
   * @param int
   */
  public function setOriginalHeight($originalHeight)
  {
    $this->originalHeight = $originalHeight;
  }
  /**
   * @return int
   */
  public function getOriginalHeight()
  {
    return $this->originalHeight;
  }
  /**
   * @param int
   */
  public function setOriginalWidth($originalWidth)
  {
    $this->originalWidth = $originalWidth;
  }
  /**
   * @return int
   */
  public function getOriginalWidth()
  {
    return $this->originalWidth;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
class_alias(ImageBaseThumbnailMetadata::class, 'Google_Service_Contentwarehouse_ImageBaseThumbnailMetadata');
