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

class VideoContentSearchVideoIntroduction extends \Google\Model
{
  /**
   * @var bool
   */
  public $hasIntro;
  /**
   * @var string
   */
  public $introEndMs;
  /**
   * @var string
   */
  public $introStartMs;

  /**
   * @param bool
   */
  public function setHasIntro($hasIntro)
  {
    $this->hasIntro = $hasIntro;
  }
  /**
   * @return bool
   */
  public function getHasIntro()
  {
    return $this->hasIntro;
  }
  /**
   * @param string
   */
  public function setIntroEndMs($introEndMs)
  {
    $this->introEndMs = $introEndMs;
  }
  /**
   * @return string
   */
  public function getIntroEndMs()
  {
    return $this->introEndMs;
  }
  /**
   * @param string
   */
  public function setIntroStartMs($introStartMs)
  {
    $this->introStartMs = $introStartMs;
  }
  /**
   * @return string
   */
  public function getIntroStartMs()
  {
    return $this->introStartMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoIntroduction::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoIntroduction');
