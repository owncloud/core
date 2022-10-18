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

class VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp extends \Google\Model
{
  /**
   * @var float
   */
  public $asrConfidence;
  /**
   * @var bool
   */
  public $isSentenceStart;
  /**
   * @var string
   */
  public $labelBeginCharIndex;
  /**
   * @var string
   */
  public $labelEndCharIndex;
  /**
   * @var string
   */
  public $timeMs;

  /**
   * @param float
   */
  public function setAsrConfidence($asrConfidence)
  {
    $this->asrConfidence = $asrConfidence;
  }
  /**
   * @return float
   */
  public function getAsrConfidence()
  {
    return $this->asrConfidence;
  }
  /**
   * @param bool
   */
  public function setIsSentenceStart($isSentenceStart)
  {
    $this->isSentenceStart = $isSentenceStart;
  }
  /**
   * @return bool
   */
  public function getIsSentenceStart()
  {
    return $this->isSentenceStart;
  }
  /**
   * @param string
   */
  public function setLabelBeginCharIndex($labelBeginCharIndex)
  {
    $this->labelBeginCharIndex = $labelBeginCharIndex;
  }
  /**
   * @return string
   */
  public function getLabelBeginCharIndex()
  {
    return $this->labelBeginCharIndex;
  }
  /**
   * @param string
   */
  public function setLabelEndCharIndex($labelEndCharIndex)
  {
    $this->labelEndCharIndex = $labelEndCharIndex;
  }
  /**
   * @return string
   */
  public function getLabelEndCharIndex()
  {
    return $this->labelEndCharIndex;
  }
  /**
   * @param string
   */
  public function setTimeMs($timeMs)
  {
    $this->timeMs = $timeMs;
  }
  /**
   * @return string
   */
  public function getTimeMs()
  {
    return $this->timeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp');
