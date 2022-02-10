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

namespace Google\Service\Books;

class VolumeVolumeInfoDimensions extends \Google\Model
{
  /**
   * @var string
   */
  public $height;
  /**
   * @var string
   */
  public $thickness;
  /**
   * @var string
   */
  public $width;

  /**
   * @param string
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return string
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setThickness($thickness)
  {
    $this->thickness = $thickness;
  }
  /**
   * @return string
   */
  public function getThickness()
  {
    return $this->thickness;
  }
  /**
   * @param string
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return string
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeVolumeInfoDimensions::class, 'Google_Service_Books_VolumeVolumeInfoDimensions');
