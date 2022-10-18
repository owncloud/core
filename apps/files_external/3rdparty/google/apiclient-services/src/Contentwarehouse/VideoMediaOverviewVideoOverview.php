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

class VideoMediaOverviewVideoOverview extends \Google\Model
{
  /**
   * @var string
   */
  public $aspectRatio;
  public $averageFps;
  /**
   * @var int
   */
  public $codecId;
  /**
   * @var string
   */
  public $colorDynamicRange;
  public $fps;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $resolution;
  /**
   * @var int
   */
  public $roundedUpOriginalDurationSec;
  /**
   * @var bool
   */
  public $videoHasClosedCaptions;
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setAspectRatio($aspectRatio)
  {
    $this->aspectRatio = $aspectRatio;
  }
  /**
   * @return string
   */
  public function getAspectRatio()
  {
    return $this->aspectRatio;
  }
  public function setAverageFps($averageFps)
  {
    $this->averageFps = $averageFps;
  }
  public function getAverageFps()
  {
    return $this->averageFps;
  }
  /**
   * @param int
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return int
   */
  public function getCodecId()
  {
    return $this->codecId;
  }
  /**
   * @param string
   */
  public function setColorDynamicRange($colorDynamicRange)
  {
    $this->colorDynamicRange = $colorDynamicRange;
  }
  /**
   * @return string
   */
  public function getColorDynamicRange()
  {
    return $this->colorDynamicRange;
  }
  public function setFps($fps)
  {
    $this->fps = $fps;
  }
  public function getFps()
  {
    return $this->fps;
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
  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return string
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param int
   */
  public function setRoundedUpOriginalDurationSec($roundedUpOriginalDurationSec)
  {
    $this->roundedUpOriginalDurationSec = $roundedUpOriginalDurationSec;
  }
  /**
   * @return int
   */
  public function getRoundedUpOriginalDurationSec()
  {
    return $this->roundedUpOriginalDurationSec;
  }
  /**
   * @param bool
   */
  public function setVideoHasClosedCaptions($videoHasClosedCaptions)
  {
    $this->videoHasClosedCaptions = $videoHasClosedCaptions;
  }
  /**
   * @return bool
   */
  public function getVideoHasClosedCaptions()
  {
    return $this->videoHasClosedCaptions;
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
class_alias(VideoMediaOverviewVideoOverview::class, 'Google_Service_Contentwarehouse_VideoMediaOverviewVideoOverview');
