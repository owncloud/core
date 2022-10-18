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

class PhotosGDepthMetadata extends \Google\Model
{
  /**
   * @var float
   */
  public $far;
  /**
   * @var string
   */
  public $format;
  /**
   * @var int
   */
  public $imageHeight;
  /**
   * @var int
   */
  public $imageWidth;
  /**
   * @var string
   */
  public $mime;
  /**
   * @var float
   */
  public $near;
  /**
   * @var string
   */
  public $units;

  /**
   * @param float
   */
  public function setFar($far)
  {
    $this->far = $far;
  }
  /**
   * @return float
   */
  public function getFar()
  {
    return $this->far;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
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
   * @param string
   */
  public function setMime($mime)
  {
    $this->mime = $mime;
  }
  /**
   * @return string
   */
  public function getMime()
  {
    return $this->mime;
  }
  /**
   * @param float
   */
  public function setNear($near)
  {
    $this->near = $near;
  }
  /**
   * @return float
   */
  public function getNear()
  {
    return $this->near;
  }
  /**
   * @param string
   */
  public function setUnits($units)
  {
    $this->units = $units;
  }
  /**
   * @return string
   */
  public function getUnits()
  {
    return $this->units;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosGDepthMetadata::class, 'Google_Service_Contentwarehouse_PhotosGDepthMetadata');
