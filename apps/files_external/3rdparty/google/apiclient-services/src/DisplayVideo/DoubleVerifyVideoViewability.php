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

namespace Google\Service\DisplayVideo;

class DoubleVerifyVideoViewability extends \Google\Model
{
  /**
   * @var string
   */
  public $playerImpressionRate;
  /**
   * @var string
   */
  public $videoIab;
  /**
   * @var string
   */
  public $videoViewableRate;

  /**
   * @param string
   */
  public function setPlayerImpressionRate($playerImpressionRate)
  {
    $this->playerImpressionRate = $playerImpressionRate;
  }
  /**
   * @return string
   */
  public function getPlayerImpressionRate()
  {
    return $this->playerImpressionRate;
  }
  /**
   * @param string
   */
  public function setVideoIab($videoIab)
  {
    $this->videoIab = $videoIab;
  }
  /**
   * @return string
   */
  public function getVideoIab()
  {
    return $this->videoIab;
  }
  /**
   * @param string
   */
  public function setVideoViewableRate($videoViewableRate)
  {
    $this->videoViewableRate = $videoViewableRate;
  }
  /**
   * @return string
   */
  public function getVideoViewableRate()
  {
    return $this->videoViewableRate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DoubleVerifyVideoViewability::class, 'Google_Service_DisplayVideo_DoubleVerifyVideoViewability');
