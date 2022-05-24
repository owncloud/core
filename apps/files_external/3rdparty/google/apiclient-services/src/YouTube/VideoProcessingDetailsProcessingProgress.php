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

class VideoProcessingDetailsProcessingProgress extends \Google\Model
{
  /**
   * @var string
   */
  public $partsProcessed;
  /**
   * @var string
   */
  public $partsTotal;
  /**
   * @var string
   */
  public $timeLeftMs;

  /**
   * @param string
   */
  public function setPartsProcessed($partsProcessed)
  {
    $this->partsProcessed = $partsProcessed;
  }
  /**
   * @return string
   */
  public function getPartsProcessed()
  {
    return $this->partsProcessed;
  }
  /**
   * @param string
   */
  public function setPartsTotal($partsTotal)
  {
    $this->partsTotal = $partsTotal;
  }
  /**
   * @return string
   */
  public function getPartsTotal()
  {
    return $this->partsTotal;
  }
  /**
   * @param string
   */
  public function setTimeLeftMs($timeLeftMs)
  {
    $this->timeLeftMs = $timeLeftMs;
  }
  /**
   * @return string
   */
  public function getTimeLeftMs()
  {
    return $this->timeLeftMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoProcessingDetailsProcessingProgress::class, 'Google_Service_YouTube_VideoProcessingDetailsProcessingProgress');
