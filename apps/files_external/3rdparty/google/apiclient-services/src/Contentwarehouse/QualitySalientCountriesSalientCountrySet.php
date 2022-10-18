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

class QualitySalientCountriesSalientCountrySet extends \Google\Collection
{
  protected $collection_key = 'salientCountry';
  /**
   * @var int[]
   */
  public $packedCountry;
  /**
   * @var int[]
   */
  public $packedSalience;
  protected $salientCountryType = QualitySalientCountriesSalientCountry::class;
  protected $salientCountryDataType = 'array';

  /**
   * @param int[]
   */
  public function setPackedCountry($packedCountry)
  {
    $this->packedCountry = $packedCountry;
  }
  /**
   * @return int[]
   */
  public function getPackedCountry()
  {
    return $this->packedCountry;
  }
  /**
   * @param int[]
   */
  public function setPackedSalience($packedSalience)
  {
    $this->packedSalience = $packedSalience;
  }
  /**
   * @return int[]
   */
  public function getPackedSalience()
  {
    return $this->packedSalience;
  }
  /**
   * @param QualitySalientCountriesSalientCountry[]
   */
  public function setSalientCountry($salientCountry)
  {
    $this->salientCountry = $salientCountry;
  }
  /**
   * @return QualitySalientCountriesSalientCountry[]
   */
  public function getSalientCountry()
  {
    return $this->salientCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySalientCountriesSalientCountrySet::class, 'Google_Service_Contentwarehouse_QualitySalientCountriesSalientCountrySet');
