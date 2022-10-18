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

class VideoContentSearchFrameSimilarityInterval extends \Google\Collection
{
  protected $collection_key = 'frameSimilarity';
  /**
   * @var float[]
   */
  public $frameSimilarity;
  /**
   * @var string
   */
  public $framesEndTimestampMs;
  /**
   * @var int
   */
  public $framesStarburstStartIndex;
  /**
   * @var string
   */
  public $framesStartTimestampMs;

  /**
   * @param float[]
   */
  public function setFrameSimilarity($frameSimilarity)
  {
    $this->frameSimilarity = $frameSimilarity;
  }
  /**
   * @return float[]
   */
  public function getFrameSimilarity()
  {
    return $this->frameSimilarity;
  }
  /**
   * @param string
   */
  public function setFramesEndTimestampMs($framesEndTimestampMs)
  {
    $this->framesEndTimestampMs = $framesEndTimestampMs;
  }
  /**
   * @return string
   */
  public function getFramesEndTimestampMs()
  {
    return $this->framesEndTimestampMs;
  }
  /**
   * @param int
   */
  public function setFramesStarburstStartIndex($framesStarburstStartIndex)
  {
    $this->framesStarburstStartIndex = $framesStarburstStartIndex;
  }
  /**
   * @return int
   */
  public function getFramesStarburstStartIndex()
  {
    return $this->framesStarburstStartIndex;
  }
  /**
   * @param string
   */
  public function setFramesStartTimestampMs($framesStartTimestampMs)
  {
    $this->framesStartTimestampMs = $framesStartTimestampMs;
  }
  /**
   * @return string
   */
  public function getFramesStartTimestampMs()
  {
    return $this->framesStartTimestampMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchFrameSimilarityInterval::class, 'Google_Service_Contentwarehouse_VideoContentSearchFrameSimilarityInterval');
