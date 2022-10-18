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

class RepositoryAnnotationsGeoTopic extends \Google\Collection
{
  protected $collection_key = 'componentScores';
  protected $addressType = GeostoreAddressProto::class;
  protected $addressDataType = '';
  protected $componentScoresType = RepositoryAnnotationsGeoTopicalityScore::class;
  protected $componentScoresDataType = 'array';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var bool
   */
  public $denseCity;
  /**
   * @var int
   */
  public $establishmentType;
  /**
   * @var string
   */
  public $latE7;
  /**
   * @var string
   */
  public $lngE7;
  /**
   * @var string
   */
  public $locationName;
  /**
   * @var float
   */
  public $normalizedScore;
  protected $oysterIdType = GeostoreFeatureIdProto::class;
  protected $oysterIdDataType = '';
  /**
   * @var int
   */
  public $oysterType;
  /**
   * @var float
   */
  public $sumContainedPoiNormalizedScores;

  /**
   * @param GeostoreAddressProto
   */
  public function setAddress(GeostoreAddressProto $address)
  {
    $this->address = $address;
  }
  /**
   * @return GeostoreAddressProto
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param RepositoryAnnotationsGeoTopicalityScore[]
   */
  public function setComponentScores($componentScores)
  {
    $this->componentScores = $componentScores;
  }
  /**
   * @return RepositoryAnnotationsGeoTopicalityScore[]
   */
  public function getComponentScores()
  {
    return $this->componentScores;
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
   * @param bool
   */
  public function setDenseCity($denseCity)
  {
    $this->denseCity = $denseCity;
  }
  /**
   * @return bool
   */
  public function getDenseCity()
  {
    return $this->denseCity;
  }
  /**
   * @param int
   */
  public function setEstablishmentType($establishmentType)
  {
    $this->establishmentType = $establishmentType;
  }
  /**
   * @return int
   */
  public function getEstablishmentType()
  {
    return $this->establishmentType;
  }
  /**
   * @param string
   */
  public function setLatE7($latE7)
  {
    $this->latE7 = $latE7;
  }
  /**
   * @return string
   */
  public function getLatE7()
  {
    return $this->latE7;
  }
  /**
   * @param string
   */
  public function setLngE7($lngE7)
  {
    $this->lngE7 = $lngE7;
  }
  /**
   * @return string
   */
  public function getLngE7()
  {
    return $this->lngE7;
  }
  /**
   * @param string
   */
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  /**
   * @return string
   */
  public function getLocationName()
  {
    return $this->locationName;
  }
  /**
   * @param float
   */
  public function setNormalizedScore($normalizedScore)
  {
    $this->normalizedScore = $normalizedScore;
  }
  /**
   * @return float
   */
  public function getNormalizedScore()
  {
    return $this->normalizedScore;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setOysterId(GeostoreFeatureIdProto $oysterId)
  {
    $this->oysterId = $oysterId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOysterId()
  {
    return $this->oysterId;
  }
  /**
   * @param int
   */
  public function setOysterType($oysterType)
  {
    $this->oysterType = $oysterType;
  }
  /**
   * @return int
   */
  public function getOysterType()
  {
    return $this->oysterType;
  }
  /**
   * @param float
   */
  public function setSumContainedPoiNormalizedScores($sumContainedPoiNormalizedScores)
  {
    $this->sumContainedPoiNormalizedScores = $sumContainedPoiNormalizedScores;
  }
  /**
   * @return float
   */
  public function getSumContainedPoiNormalizedScores()
  {
    return $this->sumContainedPoiNormalizedScores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryAnnotationsGeoTopic::class, 'Google_Service_Contentwarehouse_RepositoryAnnotationsGeoTopic');
