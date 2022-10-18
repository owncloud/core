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

class CountryGeoLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $clickRadius50Percent;
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $confidencePercent;
  /**
   * @var int
   */
  public $internalId;
  protected $locationInfoType = CountryLocationInfo::class;
  protected $locationInfoDataType = '';
  /**
   * @var bool
   */
  public $propagatedFromASubpage;

  /**
   * @param string
   */
  public function setClickRadius50Percent($clickRadius50Percent)
  {
    $this->clickRadius50Percent = $clickRadius50Percent;
  }
  /**
   * @return string
   */
  public function getClickRadius50Percent()
  {
    return $this->clickRadius50Percent;
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
   * @param string
   */
  public function setConfidencePercent($confidencePercent)
  {
    $this->confidencePercent = $confidencePercent;
  }
  /**
   * @return string
   */
  public function getConfidencePercent()
  {
    return $this->confidencePercent;
  }
  /**
   * @param int
   */
  public function setInternalId($internalId)
  {
    $this->internalId = $internalId;
  }
  /**
   * @return int
   */
  public function getInternalId()
  {
    return $this->internalId;
  }
  /**
   * @param CountryLocationInfo
   */
  public function setLocationInfo(CountryLocationInfo $locationInfo)
  {
    $this->locationInfo = $locationInfo;
  }
  /**
   * @return CountryLocationInfo
   */
  public function getLocationInfo()
  {
    return $this->locationInfo;
  }
  /**
   * @param bool
   */
  public function setPropagatedFromASubpage($propagatedFromASubpage)
  {
    $this->propagatedFromASubpage = $propagatedFromASubpage;
  }
  /**
   * @return bool
   */
  public function getPropagatedFromASubpage()
  {
    return $this->propagatedFromASubpage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountryGeoLocation::class, 'Google_Service_Contentwarehouse_CountryGeoLocation');
