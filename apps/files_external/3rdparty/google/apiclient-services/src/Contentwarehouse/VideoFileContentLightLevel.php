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

class VideoFileContentLightLevel extends \Google\Model
{
  /**
   * @var int
   */
  public $maxContentLightLevel;
  /**
   * @var int
   */
  public $maxFrameAverageLightLevel;

  /**
   * @param int
   */
  public function setMaxContentLightLevel($maxContentLightLevel)
  {
    $this->maxContentLightLevel = $maxContentLightLevel;
  }
  /**
   * @return int
   */
  public function getMaxContentLightLevel()
  {
    return $this->maxContentLightLevel;
  }
  /**
   * @param int
   */
  public function setMaxFrameAverageLightLevel($maxFrameAverageLightLevel)
  {
    $this->maxFrameAverageLightLevel = $maxFrameAverageLightLevel;
  }
  /**
   * @return int
   */
  public function getMaxFrameAverageLightLevel()
  {
    return $this->maxFrameAverageLightLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileContentLightLevel::class, 'Google_Service_Contentwarehouse_VideoFileContentLightLevel');
