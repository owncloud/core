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

class CountryLocationInfo extends \Google\Model
{
  protected $centerType = GeostorePointProto::class;
  protected $centerDataType = '';
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $county;
  protected $enclosingStateFeatureIdType = GeostoreFeatureIdProto::class;
  protected $enclosingStateFeatureIdDataType = '';
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateIdFprint;
  /**
   * @var string
   */
  public $subLocality;
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostorePointProto
   */
  public function setCenter(GeostorePointProto $center)
  {
    $this->center = $center;
  }
  /**
   * @return GeostorePointProto
   */
  public function getCenter()
  {
    return $this->center;
  }
  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
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
  public function setCounty($county)
  {
    $this->county = $county;
  }
  /**
   * @return string
   */
  public function getCounty()
  {
    return $this->county;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setEnclosingStateFeatureId(GeostoreFeatureIdProto $enclosingStateFeatureId)
  {
    $this->enclosingStateFeatureId = $enclosingStateFeatureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getEnclosingStateFeatureId()
  {
    return $this->enclosingStateFeatureId;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureId(GeostoreFeatureIdProto $featureId)
  {
    $this->featureId = $featureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureId()
  {
    return $this->featureId;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStateIdFprint($stateIdFprint)
  {
    $this->stateIdFprint = $stateIdFprint;
  }
  /**
   * @return string
   */
  public function getStateIdFprint()
  {
    return $this->stateIdFprint;
  }
  /**
   * @param string
   */
  public function setSubLocality($subLocality)
  {
    $this->subLocality = $subLocality;
  }
  /**
   * @return string
   */
  public function getSubLocality()
  {
    return $this->subLocality;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountryLocationInfo::class, 'Google_Service_Contentwarehouse_CountryLocationInfo');
