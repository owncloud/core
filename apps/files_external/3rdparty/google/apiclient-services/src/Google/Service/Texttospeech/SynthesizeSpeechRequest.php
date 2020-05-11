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

class Google_Service_Texttospeech_SynthesizeSpeechRequest extends Google_Model
{
  protected $audioConfigType = 'Google_Service_Texttospeech_AudioConfig';
  protected $audioConfigDataType = '';
  protected $inputType = 'Google_Service_Texttospeech_SynthesisInput';
  protected $inputDataType = '';
  protected $voiceType = 'Google_Service_Texttospeech_VoiceSelectionParams';
  protected $voiceDataType = '';

  /**
   * @param Google_Service_Texttospeech_AudioConfig
   */
  public function setAudioConfig(Google_Service_Texttospeech_AudioConfig $audioConfig)
  {
    $this->audioConfig = $audioConfig;
  }
  /**
   * @return Google_Service_Texttospeech_AudioConfig
   */
  public function getAudioConfig()
  {
    return $this->audioConfig;
  }
  /**
   * @param Google_Service_Texttospeech_SynthesisInput
   */
  public function setInput(Google_Service_Texttospeech_SynthesisInput $input)
  {
    $this->input = $input;
  }
  /**
   * @return Google_Service_Texttospeech_SynthesisInput
   */
  public function getInput()
  {
    return $this->input;
  }
  /**
   * @param Google_Service_Texttospeech_VoiceSelectionParams
   */
  public function setVoice(Google_Service_Texttospeech_VoiceSelectionParams $voice)
  {
    $this->voice = $voice;
  }
  /**
   * @return Google_Service_Texttospeech_VoiceSelectionParams
   */
  public function getVoice()
  {
    return $this->voice;
  }
}
