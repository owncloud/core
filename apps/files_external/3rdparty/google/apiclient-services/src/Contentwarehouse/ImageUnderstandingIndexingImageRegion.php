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

class ImageUnderstandingIndexingImageRegion extends \Google\Model
{
  protected $boxType = PhotosVisionGroundtruthdbNormalizedBoundingBox::class;
  protected $boxDataType = '';
  /**
   * @var float
   */
  public $score;
  /**
   * @var string
   */
  public $version;

  /**
   * @param PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function setBox(PhotosVisionGroundtruthdbNormalizedBoundingBox $box)
  {
    $this->box = $box;
  }
  /**
   * @return PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function getBox()
  {
    return $this->box;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageUnderstandingIndexingImageRegion::class, 'Google_Service_Contentwarehouse_ImageUnderstandingIndexingImageRegion');
