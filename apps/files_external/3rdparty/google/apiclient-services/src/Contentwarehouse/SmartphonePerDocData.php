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

class SmartphonePerDocData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "dEPRECATEDDesktopCanonicalDocid" => "DEPRECATEDDesktopCanonicalDocid",
        "dEPRECATEDMobileHomepageDocid" => "DEPRECATEDMobileHomepageDocid",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDDesktopCanonicalDocid;
  /**
   * @var string
   */
  public $dEPRECATEDMobileHomepageDocid;
  /**
   * @var int
   */
  public $adsDensityInterstitialViolationStrength;
  /**
   * @var bool
   */
  public $isErrorPage;
  /**
   * @var bool
   */
  public $isN1Redirect;
  /**
   * @var bool
   */
  public $isSmartphoneOptimized;
  /**
   * @var bool
   */
  public $isWebErrorMobileContent;
  public $maximumFlashRatio;
  /**
   * @var int
   */
  public $mobileFriendlyScore;
  /**
   * @var bool
   */
  public $violatesMobileInterstitialPolicy;

  /**
   * @param string
   */
  public function setDEPRECATEDDesktopCanonicalDocid($dEPRECATEDDesktopCanonicalDocid)
  {
    $this->dEPRECATEDDesktopCanonicalDocid = $dEPRECATEDDesktopCanonicalDocid;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDDesktopCanonicalDocid()
  {
    return $this->dEPRECATEDDesktopCanonicalDocid;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDMobileHomepageDocid($dEPRECATEDMobileHomepageDocid)
  {
    $this->dEPRECATEDMobileHomepageDocid = $dEPRECATEDMobileHomepageDocid;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDMobileHomepageDocid()
  {
    return $this->dEPRECATEDMobileHomepageDocid;
  }
  /**
   * @param int
   */
  public function setAdsDensityInterstitialViolationStrength($adsDensityInterstitialViolationStrength)
  {
    $this->adsDensityInterstitialViolationStrength = $adsDensityInterstitialViolationStrength;
  }
  /**
   * @return int
   */
  public function getAdsDensityInterstitialViolationStrength()
  {
    return $this->adsDensityInterstitialViolationStrength;
  }
  /**
   * @param bool
   */
  public function setIsErrorPage($isErrorPage)
  {
    $this->isErrorPage = $isErrorPage;
  }
  /**
   * @return bool
   */
  public function getIsErrorPage()
  {
    return $this->isErrorPage;
  }
  /**
   * @param bool
   */
  public function setIsN1Redirect($isN1Redirect)
  {
    $this->isN1Redirect = $isN1Redirect;
  }
  /**
   * @return bool
   */
  public function getIsN1Redirect()
  {
    return $this->isN1Redirect;
  }
  /**
   * @param bool
   */
  public function setIsSmartphoneOptimized($isSmartphoneOptimized)
  {
    $this->isSmartphoneOptimized = $isSmartphoneOptimized;
  }
  /**
   * @return bool
   */
  public function getIsSmartphoneOptimized()
  {
    return $this->isSmartphoneOptimized;
  }
  /**
   * @param bool
   */
  public function setIsWebErrorMobileContent($isWebErrorMobileContent)
  {
    $this->isWebErrorMobileContent = $isWebErrorMobileContent;
  }
  /**
   * @return bool
   */
  public function getIsWebErrorMobileContent()
  {
    return $this->isWebErrorMobileContent;
  }
  public function setMaximumFlashRatio($maximumFlashRatio)
  {
    $this->maximumFlashRatio = $maximumFlashRatio;
  }
  public function getMaximumFlashRatio()
  {
    return $this->maximumFlashRatio;
  }
  /**
   * @param int
   */
  public function setMobileFriendlyScore($mobileFriendlyScore)
  {
    $this->mobileFriendlyScore = $mobileFriendlyScore;
  }
  /**
   * @return int
   */
  public function getMobileFriendlyScore()
  {
    return $this->mobileFriendlyScore;
  }
  /**
   * @param bool
   */
  public function setViolatesMobileInterstitialPolicy($violatesMobileInterstitialPolicy)
  {
    $this->violatesMobileInterstitialPolicy = $violatesMobileInterstitialPolicy;
  }
  /**
   * @return bool
   */
  public function getViolatesMobileInterstitialPolicy()
  {
    return $this->violatesMobileInterstitialPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SmartphonePerDocData::class, 'Google_Service_Contentwarehouse_SmartphonePerDocData');
