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

class QualityNavboostCrapsFeatureCrapsData extends \Google\Model
{
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $device;
  /**
   * @var string
   */
  public $language;
  /**
   * @var int
   */
  public $locationId;
  protected $signalsType = QualityNavboostCrapsCrapsClickSignals::class;
  protected $signalsDataType = '';

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDevice($device)
  {
    $this->device = $device;
  }
  /**
   * @return string
   */
  public function getDevice()
  {
    return $this->device;
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
   * @param int
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return int
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param QualityNavboostCrapsCrapsClickSignals
   */
  public function setSignals(QualityNavboostCrapsCrapsClickSignals $signals)
  {
    $this->signals = $signals;
  }
  /**
   * @return QualityNavboostCrapsCrapsClickSignals
   */
  public function getSignals()
  {
    return $this->signals;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNavboostCrapsFeatureCrapsData::class, 'Google_Service_Contentwarehouse_QualityNavboostCrapsFeatureCrapsData');
