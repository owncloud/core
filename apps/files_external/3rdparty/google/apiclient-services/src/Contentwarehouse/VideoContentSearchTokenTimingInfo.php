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

class VideoContentSearchTokenTimingInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $durationMs;
  /**
   * @var string
   */
  public $startMs;
  /**
   * @var string
   */
  public $text;

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return string
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  /**
   * @param string
   */
  public function setStartMs($startMs)
  {
    $this->startMs = $startMs;
  }
  /**
   * @return string
   */
  public function getStartMs()
  {
    return $this->startMs;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchTokenTimingInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchTokenTimingInfo');
