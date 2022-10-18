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

class AssistantApiSettingsPersonalizationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $faceMatch;
  /**
   * @var string
   */
  public $personalResults;
  /**
   * @var string
   */
  public $voiceMatch;

  /**
   * @param string
   */
  public function setFaceMatch($faceMatch)
  {
    $this->faceMatch = $faceMatch;
  }
  /**
   * @return string
   */
  public function getFaceMatch()
  {
    return $this->faceMatch;
  }
  /**
   * @param string
   */
  public function setPersonalResults($personalResults)
  {
    $this->personalResults = $personalResults;
  }
  /**
   * @return string
   */
  public function getPersonalResults()
  {
    return $this->personalResults;
  }
  /**
   * @param string
   */
  public function setVoiceMatch($voiceMatch)
  {
    $this->voiceMatch = $voiceMatch;
  }
  /**
   * @return string
   */
  public function getVoiceMatch()
  {
    return $this->voiceMatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsPersonalizationMetadata::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsPersonalizationMetadata');
