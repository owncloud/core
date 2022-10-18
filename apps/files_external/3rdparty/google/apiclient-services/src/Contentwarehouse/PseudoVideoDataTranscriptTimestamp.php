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

class PseudoVideoDataTranscriptTimestamp extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "charOffset" => "CharOffset",
        "confidence" => "Confidence",
        "timeOffset" => "TimeOffset",
  ];
  /**
   * @var int
   */
  public $charOffset;
  /**
   * @var int
   */
  public $confidence;
  /**
   * @var int
   */
  public $timeOffset;

  /**
   * @param int
   */
  public function setCharOffset($charOffset)
  {
    $this->charOffset = $charOffset;
  }
  /**
   * @return int
   */
  public function getCharOffset()
  {
    return $this->charOffset;
  }
  /**
   * @param int
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return int
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param int
   */
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  /**
   * @return int
   */
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PseudoVideoDataTranscriptTimestamp::class, 'Google_Service_Contentwarehouse_PseudoVideoDataTranscriptTimestamp');
