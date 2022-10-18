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

class WWWDocInfoRelatedImages extends \Google\Model
{
  /**
   * @var string
   */
  public $imageDocid;
  /**
   * @var int
   */
  public $thumbHeight;
  /**
   * @var string
   */
  public $thumbType;
  /**
   * @var int
   */
  public $thumbWidth;

  /**
   * @param string
   */
  public function setImageDocid($imageDocid)
  {
    $this->imageDocid = $imageDocid;
  }
  /**
   * @return string
   */
  public function getImageDocid()
  {
    return $this->imageDocid;
  }
  /**
   * @param int
   */
  public function setThumbHeight($thumbHeight)
  {
    $this->thumbHeight = $thumbHeight;
  }
  /**
   * @return int
   */
  public function getThumbHeight()
  {
    return $this->thumbHeight;
  }
  /**
   * @param string
   */
  public function setThumbType($thumbType)
  {
    $this->thumbType = $thumbType;
  }
  /**
   * @return string
   */
  public function getThumbType()
  {
    return $this->thumbType;
  }
  /**
   * @param int
   */
  public function setThumbWidth($thumbWidth)
  {
    $this->thumbWidth = $thumbWidth;
  }
  /**
   * @return int
   */
  public function getThumbWidth()
  {
    return $this->thumbWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WWWDocInfoRelatedImages::class, 'Google_Service_Contentwarehouse_WWWDocInfoRelatedImages');
