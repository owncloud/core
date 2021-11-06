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

namespace Google\Service\Texttospeech;

class SynthesizeSpeechRequest extends \Google\Model
{
  protected $audioConfigType = AudioConfig::class;
  protected $audioConfigDataType = '';
  protected $inputType = SynthesisInput::class;
  protected $inputDataType = '';
  protected $voiceType = VoiceSelectionParams::class;
  protected $voiceDataType = '';

  /**
   * @param AudioConfig
   */
  public function setAudioConfig(AudioConfig $audioConfig)
  {
    $this->audioConfig = $audioConfig;
  }
  /**
   * @return AudioConfig
   */
  public function getAudioConfig()
  {
    return $this->audioConfig;
  }
  /**
   * @param SynthesisInput
   */
  public function setInput(SynthesisInput $input)
  {
    $this->input = $input;
  }
  /**
   * @return SynthesisInput
   */
  public function getInput()
  {
    return $this->input;
  }
  /**
   * @param VoiceSelectionParams
   */
  public function setVoice(VoiceSelectionParams $voice)
  {
    $this->voice = $voice;
  }
  /**
   * @return VoiceSelectionParams
   */
  public function getVoice()
  {
    return $this->voice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SynthesizeSpeechRequest::class, 'Google_Service_Texttospeech_SynthesizeSpeechRequest');
