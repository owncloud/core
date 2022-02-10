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

namespace Google\Service\YouTube;

class VideoAgeGating extends \Google\Model
{
  /**
   * @var bool
   */
  public $alcoholContent;
  /**
   * @var bool
   */
  public $restricted;
  /**
   * @var string
   */
  public $videoGameRating;

  /**
   * @param bool
   */
  public function setAlcoholContent($alcoholContent)
  {
    $this->alcoholContent = $alcoholContent;
  }
  /**
   * @return bool
   */
  public function getAlcoholContent()
  {
    return $this->alcoholContent;
  }
  /**
   * @param bool
   */
  public function setRestricted($restricted)
  {
    $this->restricted = $restricted;
  }
  /**
   * @return bool
   */
  public function getRestricted()
  {
    return $this->restricted;
  }
  /**
   * @param string
   */
  public function setVideoGameRating($videoGameRating)
  {
    $this->videoGameRating = $videoGameRating;
  }
  /**
   * @return string
   */
  public function getVideoGameRating()
  {
    return $this->videoGameRating;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAgeGating::class, 'Google_Service_YouTube_VideoAgeGating');
