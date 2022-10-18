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

class QualitySalientTermsSignalData extends \Google\Model
{
  /**
   * @var float
   */
  public $bias;
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var float
   */
  public $halfSalience;
  /**
   * @var float
   */
  public $noiseCorrection;
  /**
   * @var float
   */
  public $observedConfidence;
  /**
   * @var float
   */
  public $observedVolume;
  /**
   * @var float
   */
  public $rawVolume;
  /**
   * @var string
   */
  public $source;
  /**
   * @var float
   */
  public $volume;

  /**
   * @param float
   */
  public function setBias($bias)
  {
    $this->bias = $bias;
  }
  /**
   * @return float
   */
  public function getBias()
  {
    return $this->bias;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param float
   */
  public function setHalfSalience($halfSalience)
  {
    $this->halfSalience = $halfSalience;
  }
  /**
   * @return float
   */
  public function getHalfSalience()
  {
    return $this->halfSalience;
  }
  /**
   * @param float
   */
  public function setNoiseCorrection($noiseCorrection)
  {
    $this->noiseCorrection = $noiseCorrection;
  }
  /**
   * @return float
   */
  public function getNoiseCorrection()
  {
    return $this->noiseCorrection;
  }
  /**
   * @param float
   */
  public function setObservedConfidence($observedConfidence)
  {
    $this->observedConfidence = $observedConfidence;
  }
  /**
   * @return float
   */
  public function getObservedConfidence()
  {
    return $this->observedConfidence;
  }
  /**
   * @param float
   */
  public function setObservedVolume($observedVolume)
  {
    $this->observedVolume = $observedVolume;
  }
  /**
   * @return float
   */
  public function getObservedVolume()
  {
    return $this->observedVolume;
  }
  /**
   * @param float
   */
  public function setRawVolume($rawVolume)
  {
    $this->rawVolume = $rawVolume;
  }
  /**
   * @return float
   */
  public function getRawVolume()
  {
    return $this->rawVolume;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param float
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return float
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySalientTermsSignalData::class, 'Google_Service_Contentwarehouse_QualitySalientTermsSignalData');
