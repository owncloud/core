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

class QualitySalientTermsDocData extends \Google\Collection
{
  protected $collection_key = 'signalData';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var float
   */
  public $headVolumeRatio;
  /**
   * @var string
   */
  public $language;
  protected $signalDataType = QualitySalientTermsSignalData::class;
  protected $signalDataDataType = 'array';
  /**
   * @var float
   */
  public $virtualVolume;

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
  public function setHeadVolumeRatio($headVolumeRatio)
  {
    $this->headVolumeRatio = $headVolumeRatio;
  }
  /**
   * @return float
   */
  public function getHeadVolumeRatio()
  {
    return $this->headVolumeRatio;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param QualitySalientTermsSignalData[]
   */
  public function setSignalData($signalData)
  {
    $this->signalData = $signalData;
  }
  /**
   * @return QualitySalientTermsSignalData[]
   */
  public function getSignalData()
  {
    return $this->signalData;
  }
  /**
   * @param float
   */
  public function setVirtualVolume($virtualVolume)
  {
    $this->virtualVolume = $virtualVolume;
  }
  /**
   * @return float
   */
  public function getVirtualVolume()
  {
    return $this->virtualVolume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySalientTermsDocData::class, 'Google_Service_Contentwarehouse_QualitySalientTermsDocData');
