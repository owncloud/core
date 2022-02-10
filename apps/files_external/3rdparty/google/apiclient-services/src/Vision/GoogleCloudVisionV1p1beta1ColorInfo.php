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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p1beta1ColorInfo extends \Google\Model
{
  protected $colorType = Color::class;
  protected $colorDataType = '';
  /**
   * @var float
   */
  public $pixelFraction;
  /**
   * @var float
   */
  public $score;

  /**
   * @param Color
   */
  public function setColor(Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param float
   */
  public function setPixelFraction($pixelFraction)
  {
    $this->pixelFraction = $pixelFraction;
  }
  /**
   * @return float
   */
  public function getPixelFraction()
  {
    return $this->pixelFraction;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1ColorInfo::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1ColorInfo');
