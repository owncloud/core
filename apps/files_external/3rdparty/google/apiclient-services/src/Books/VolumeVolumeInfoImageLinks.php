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

class VolumeVolumeInfoImageLinks extends \Google\Model
{
  /**
   * @var string
   */
  public $extraLarge;
  /**
   * @var string
   */
  public $large;
  /**
   * @var string
   */
  public $medium;
  /**
   * @var string
   */
  public $small;
  /**
   * @var string
   */
  public $smallThumbnail;
  /**
   * @var string
   */
  public $thumbnail;

  /**
   * @param string
   */
  public function setExtraLarge($extraLarge)
  {
    $this->extraLarge = $extraLarge;
  }
  /**
   * @return string
   */
  public function getExtraLarge()
  {
    return $this->extraLarge;
  }
  /**
   * @param string
   */
  public function setLarge($large)
  {
    $this->large = $large;
  }
  /**
   * @return string
   */
  public function getLarge()
  {
    return $this->large;
  }
  /**
   * @param string
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
  }
  /**
   * @param string
   */
  public function setSmall($small)
  {
    $this->small = $small;
  }
  /**
   * @return string
   */
  public function getSmall()
  {
    return $this->small;
  }
  /**
   * @param string
   */
  public function setSmallThumbnail($smallThumbnail)
  {
    $this->smallThumbnail = $smallThumbnail;
  }
  /**
   * @return string
   */
  public function getSmallThumbnail()
  {
    return $this->smallThumbnail;
  }
  /**
   * @param string
   */
  public function setThumbnail($thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return string
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeVolumeInfoImageLinks::class, 'Google_Service_Books_VolumeVolumeInfoImageLinks');
