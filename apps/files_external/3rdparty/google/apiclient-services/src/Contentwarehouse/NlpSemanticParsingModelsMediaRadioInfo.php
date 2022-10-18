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

class NlpSemanticParsingModelsMediaRadioInfo extends \Google\Model
{
  protected $frequencyType = NlpSemanticParsingModelsMediaFrequency::class;
  protected $frequencyDataType = '';
  protected $locationType = NlpSemanticParsingModelsMediaLatLng::class;
  protected $locationDataType = '';
  public $popularity;

  /**
   * @param NlpSemanticParsingModelsMediaFrequency
   */
  public function setFrequency(NlpSemanticParsingModelsMediaFrequency $frequency)
  {
    $this->frequency = $frequency;
  }
  /**
   * @return NlpSemanticParsingModelsMediaFrequency
   */
  public function getFrequency()
  {
    return $this->frequency;
  }
  /**
   * @param NlpSemanticParsingModelsMediaLatLng
   */
  public function setLocation(NlpSemanticParsingModelsMediaLatLng $location)
  {
    $this->location = $location;
  }
  /**
   * @return NlpSemanticParsingModelsMediaLatLng
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setPopularity($popularity)
  {
    $this->popularity = $popularity;
  }
  public function getPopularity()
  {
    return $this->popularity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaRadioInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaRadioInfo');
