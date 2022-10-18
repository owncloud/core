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

class IndexingSpeechSpeechPropertiesProto extends \Google\Model
{
  /**
   * @var int
   */
  public $audioDuration;
  /**
   * @var bool
   */
  public $audioOnly;
  /**
   * @var int
   */
  public $estimatedAudioDuration;
  /**
   * @var float
   */
  public $estimatedAudioDurationConfidence;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var int
   */
  public $numWords;
  /**
   * @var float
   */
  public $recognizerAccuracy;
  /**
   * @var int
   */
  public $speechDuration;
  /**
   * @var bool
   */
  public $truncatedFile;

  /**
   * @param int
   */
  public function setAudioDuration($audioDuration)
  {
    $this->audioDuration = $audioDuration;
  }
  /**
   * @return int
   */
  public function getAudioDuration()
  {
    return $this->audioDuration;
  }
  /**
   * @param bool
   */
  public function setAudioOnly($audioOnly)
  {
    $this->audioOnly = $audioOnly;
  }
  /**
   * @return bool
   */
  public function getAudioOnly()
  {
    return $this->audioOnly;
  }
  /**
   * @param int
   */
  public function setEstimatedAudioDuration($estimatedAudioDuration)
  {
    $this->estimatedAudioDuration = $estimatedAudioDuration;
  }
  /**
   * @return int
   */
  public function getEstimatedAudioDuration()
  {
    return $this->estimatedAudioDuration;
  }
  /**
   * @param float
   */
  public function setEstimatedAudioDurationConfidence($estimatedAudioDurationConfidence)
  {
    $this->estimatedAudioDurationConfidence = $estimatedAudioDurationConfidence;
  }
  /**
   * @return float
   */
  public function getEstimatedAudioDurationConfidence()
  {
    return $this->estimatedAudioDurationConfidence;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param int
   */
  public function setNumWords($numWords)
  {
    $this->numWords = $numWords;
  }
  /**
   * @return int
   */
  public function getNumWords()
  {
    return $this->numWords;
  }
  /**
   * @param float
   */
  public function setRecognizerAccuracy($recognizerAccuracy)
  {
    $this->recognizerAccuracy = $recognizerAccuracy;
  }
  /**
   * @return float
   */
  public function getRecognizerAccuracy()
  {
    return $this->recognizerAccuracy;
  }
  /**
   * @param int
   */
  public function setSpeechDuration($speechDuration)
  {
    $this->speechDuration = $speechDuration;
  }
  /**
   * @return int
   */
  public function getSpeechDuration()
  {
    return $this->speechDuration;
  }
  /**
   * @param bool
   */
  public function setTruncatedFile($truncatedFile)
  {
    $this->truncatedFile = $truncatedFile;
  }
  /**
   * @return bool
   */
  public function getTruncatedFile()
  {
    return $this->truncatedFile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSpeechSpeechPropertiesProto::class, 'Google_Service_Contentwarehouse_IndexingSpeechSpeechPropertiesProto');
