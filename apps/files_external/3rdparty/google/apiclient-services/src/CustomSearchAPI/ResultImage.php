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

namespace Google\Service\CustomSearchAPI;

class ResultImage extends \Google\Model
{
  /**
   * @var int
   */
  public $byteSize;
  /**
   * @var string
   */
  public $contextLink;
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $thumbnailHeight;
  /**
   * @var string
   */
  public $thumbnailLink;
  /**
   * @var int
   */
  public $thumbnailWidth;
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
   * @param string
   */
  public function setContextLink($contextLink)
  {
    $this->contextLink = $contextLink;
  }
  /**
   * @return string
   */
  public function getContextLink()
  {
    return $this->contextLink;
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
   * @param int
   */
  public function setThumbnailHeight($thumbnailHeight)
  {
    $this->thumbnailHeight = $thumbnailHeight;
  }
  /**
   * @return int
   */
  public function getThumbnailHeight()
  {
    return $this->thumbnailHeight;
  }
  /**
   * @param string
   */
  public function setThumbnailLink($thumbnailLink)
  {
    $this->thumbnailLink = $thumbnailLink;
  }
  /**
   * @return string
   */
  public function getThumbnailLink()
  {
    return $this->thumbnailLink;
  }
  /**
   * @param int
   */
  public function setThumbnailWidth($thumbnailWidth)
  {
    $this->thumbnailWidth = $thumbnailWidth;
  }
  /**
   * @return int
   */
  public function getThumbnailWidth()
  {
    return $this->thumbnailWidth;
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
class_alias(ResultImage::class, 'Google_Service_CustomSearchAPI_ResultImage');
