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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity extends Google_Model
{
  protected $celebrityType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Celebrity';
  protected $celebrityDataType = '';
  public $confidence;

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Celebrity
   */
  public function setCelebrity(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Celebrity $celebrity)
  {
    $this->celebrity = $celebrity;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Celebrity
   */
  public function getCelebrity()
  {
    return $this->celebrity;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
}
