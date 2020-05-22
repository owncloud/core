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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig extends Google_Collection
{
  protected $collection_key = 'speechContexts';
  public $audioTracks;
  public $diarizationSpeakerCount;
  public $enableAutomaticPunctuation;
  public $enableSpeakerDiarization;
  public $enableWordConfidence;
  public $filterProfanity;
  public $languageCode;
  public $maxAlternatives;
  protected $speechContextsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechContext';
  protected $speechContextsDataType = 'array';

  public function setAudioTracks($audioTracks)
  {
    $this->audioTracks = $audioTracks;
  }
  public function getAudioTracks()
  {
    return $this->audioTracks;
  }
  public function setDiarizationSpeakerCount($diarizationSpeakerCount)
  {
    $this->diarizationSpeakerCount = $diarizationSpeakerCount;
  }
  public function getDiarizationSpeakerCount()
  {
    return $this->diarizationSpeakerCount;
  }
  public function setEnableAutomaticPunctuation($enableAutomaticPunctuation)
  {
    $this->enableAutomaticPunctuation = $enableAutomaticPunctuation;
  }
  public function getEnableAutomaticPunctuation()
  {
    return $this->enableAutomaticPunctuation;
  }
  public function setEnableSpeakerDiarization($enableSpeakerDiarization)
  {
    $this->enableSpeakerDiarization = $enableSpeakerDiarization;
  }
  public function getEnableSpeakerDiarization()
  {
    return $this->enableSpeakerDiarization;
  }
  public function setEnableWordConfidence($enableWordConfidence)
  {
    $this->enableWordConfidence = $enableWordConfidence;
  }
  public function getEnableWordConfidence()
  {
    return $this->enableWordConfidence;
  }
  public function setFilterProfanity($filterProfanity)
  {
    $this->filterProfanity = $filterProfanity;
  }
  public function getFilterProfanity()
  {
    return $this->filterProfanity;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMaxAlternatives($maxAlternatives)
  {
    $this->maxAlternatives = $maxAlternatives;
  }
  public function getMaxAlternatives()
  {
    return $this->maxAlternatives;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechContext
   */
  public function setSpeechContexts($speechContexts)
  {
    $this->speechContexts = $speechContexts;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechContext
   */
  public function getSpeechContexts()
  {
    return $this->speechContexts;
  }
}
