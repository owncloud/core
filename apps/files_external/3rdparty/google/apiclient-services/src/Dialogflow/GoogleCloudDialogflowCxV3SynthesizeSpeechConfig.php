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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3SynthesizeSpeechConfig extends \Google\Collection
{
  protected $collection_key = 'effectsProfileId';
  public $effectsProfileId;
  public $pitch;
  public $speakingRate;
  protected $voiceType = GoogleCloudDialogflowCxV3VoiceSelectionParams::class;
  protected $voiceDataType = '';
  public $volumeGainDb;

  public function setEffectsProfileId($effectsProfileId)
  {
    $this->effectsProfileId = $effectsProfileId;
  }
  public function getEffectsProfileId()
  {
    return $this->effectsProfileId;
  }
  public function setPitch($pitch)
  {
    $this->pitch = $pitch;
  }
  public function getPitch()
  {
    return $this->pitch;
  }
  public function setSpeakingRate($speakingRate)
  {
    $this->speakingRate = $speakingRate;
  }
  public function getSpeakingRate()
  {
    return $this->speakingRate;
  }
  /**
   * @param GoogleCloudDialogflowCxV3VoiceSelectionParams
   */
  public function setVoice(GoogleCloudDialogflowCxV3VoiceSelectionParams $voice)
  {
    $this->voice = $voice;
  }
  /**
   * @return GoogleCloudDialogflowCxV3VoiceSelectionParams
   */
  public function getVoice()
  {
    return $this->voice;
  }
  public function setVolumeGainDb($volumeGainDb)
  {
    $this->volumeGainDb = $volumeGainDb;
  }
  public function getVolumeGainDb()
  {
    return $this->volumeGainDb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3SynthesizeSpeechConfig::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SynthesizeSpeechConfig');
