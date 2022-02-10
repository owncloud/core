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

namespace Google\Service\Dfareporting;

class City extends \Google\Model
{
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $countryDartId;
  /**
   * @var string
   */
  public $dartId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $metroCode;
  /**
   * @var string
   */
  public $metroDmaId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var string
   */
  public $regionDartId;

  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setCountryDartId($countryDartId)
  {
    $this->countryDartId = $countryDartId;
  }
  /**
   * @return string
   */
  public function getCountryDartId()
  {
    return $this->countryDartId;
  }
  /**
   * @param string
   */
  public function setDartId($dartId)
  {
    $this->dartId = $dartId;
  }
  /**
   * @return string
   */
  public function getDartId()
  {
    return $this->dartId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setMetroCode($metroCode)
  {
    $this->metroCode = $metroCode;
  }
  /**
   * @return string
   */
  public function getMetroCode()
  {
    return $this->metroCode;
  }
  /**
   * @param string
   */
  public function setMetroDmaId($metroDmaId)
  {
    $this->metroDmaId = $metroDmaId;
  }
  /**
   * @return string
   */
  public function getMetroDmaId()
  {
    return $this->metroDmaId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param string
   */
  public function setRegionDartId($regionDartId)
  {
    $this->regionDartId = $regionDartId;
  }
  /**
   * @return string
   */
  public function getRegionDartId()
  {
    return $this->regionDartId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(City::class, 'Google_Service_Dfareporting_City');
