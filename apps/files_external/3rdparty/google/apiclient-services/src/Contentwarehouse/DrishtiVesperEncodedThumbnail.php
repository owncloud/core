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

class DrishtiVesperEncodedThumbnail extends \Google\Model
{
  /**
   * @var int
   */
  public $encodingQuality;
  /**
   * @var string
   */
  public $encodingType;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $imageBytes;
  /**
   * @var string
   */
  public $imageString;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setEncodingQuality($encodingQuality)
  {
    $this->encodingQuality = $encodingQuality;
  }
  /**
   * @return int
   */
  public function getEncodingQuality()
  {
    return $this->encodingQuality;
  }
  /**
   * @param string
   */
  public function setEncodingType($encodingType)
  {
    $this->encodingType = $encodingType;
  }
  /**
   * @return string
   */
  public function getEncodingType()
  {
    return $this->encodingType;
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
  public function setImageBytes($imageBytes)
  {
    $this->imageBytes = $imageBytes;
  }
  /**
   * @return string
   */
  public function getImageBytes()
  {
    return $this->imageBytes;
  }
  /**
   * @param string
   */
  public function setImageString($imageString)
  {
    $this->imageString = $imageString;
  }
  /**
   * @return string
   */
  public function getImageString()
  {
    return $this->imageString;
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
class_alias(DrishtiVesperEncodedThumbnail::class, 'Google_Service_Contentwarehouse_DrishtiVesperEncodedThumbnail');
