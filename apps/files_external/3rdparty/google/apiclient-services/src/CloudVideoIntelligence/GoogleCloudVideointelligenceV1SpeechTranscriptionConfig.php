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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1SpeechTranscriptionConfig extends \Google\Collection
{
  protected $collection_key = 'speechContexts';
  /**
   * @var int[]
   */
  public $audioTracks;
  /**
   * @var int
   */
  public $diarizationSpeakerCount;
  /**
   * @var bool
   */
  public $enableAutomaticPunctuation;
  /**
   * @var bool
   */
  public $enableSpeakerDiarization;
  /**
   * @var bool
   */
  public $enableWordConfidence;
  /**
   * @var bool
   */
  public $filterProfanity;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var int
   */
  public $maxAlternatives;
  protected $speechContextsType = GoogleCloudVideointelligenceV1SpeechContext::class;
  protected $speechContextsDataType = 'array';

  /**
   * @param int[]
   */
  public function setAudioTracks($audioTracks)
  {
    $this->audioTracks = $audioTracks;
  }
  /**
   * @return int[]
   */
  public function getAudioTracks()
  {
    return $this->audioTracks;
  }
  /**
   * @param int
   */
  public function setDiarizationSpeakerCount($diarizationSpeakerCount)
  {
    $this->diarizationSpeakerCount = $diarizationSpeakerCount;
  }
  /**
   * @return int
   */
  public function getDiarizationSpeakerCount()
  {
    return $this->diarizationSpeakerCount;
  }
  /**
   * @param bool
   */
  public function setEnableAutomaticPunctuation($enableAutomaticPunctuation)
  {
    $this->enableAutomaticPunctuation = $enableAutomaticPunctuation;
  }
  /**
   * @return bool
   */
  public function getEnableAutomaticPunctuation()
  {
    return $this->enableAutomaticPunctuation;
  }
  /**
   * @param bool
   */
  public function setEnableSpeakerDiarization($enableSpeakerDiarization)
  {
    $this->enableSpeakerDiarization = $enableSpeakerDiarization;
  }
  /**
   * @return bool
   */
  public function getEnableSpeakerDiarization()
  {
    return $this->enableSpeakerDiarization;
  }
  /**
   * @param bool
   */
  public function setEnableWordConfidence($enableWordConfidence)
  {
    $this->enableWordConfidence = $enableWordConfidence;
  }
  /**
   * @return bool
   */
  public function getEnableWordConfidence()
  {
    return $this->enableWordConfidence;
  }
  /**
   * @param bool
   */
  public function setFilterProfanity($filterProfanity)
  {
    $this->filterProfanity = $filterProfanity;
  }
  /**
   * @return bool
   */
  public function getFilterProfanity()
  {
    return $this->filterProfanity;
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
  public function setMaxAlternatives($maxAlternatives)
  {
    $this->maxAlternatives = $maxAlternatives;
  }
  /**
   * @return int
   */
  public function getMaxAlternatives()
  {
    return $this->maxAlternatives;
  }
  /**
   * @param GoogleCloudVideointelligenceV1SpeechContext[]
   */
  public function setSpeechContexts($speechContexts)
  {
    $this->speechContexts = $speechContexts;
  }
  /**
   * @return GoogleCloudVideointelligenceV1SpeechContext[]
   */
  public function getSpeechContexts()
  {
    return $this->speechContexts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1SpeechTranscriptionConfig::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig');
