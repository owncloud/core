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

class CountryCountryAttachment extends \Google\Collection
{
  protected $collection_key = 'salientCountries';
  protected $clickDistributionType = CountryClickDistribution::class;
  protected $clickDistributionDataType = '';
  /**
   * @var bool
   */
  public $countryidFromUgc;
  /**
   * @var string
   */
  public $debug;
  /**
   * @var string[]
   */
  public $debugSourceUrl;
  /**
   * @var string
   */
  public $documentLocationSource;
  /**
   * @var bool
   */
  public $existNextLevel;
  /**
   * @var bool
   */
  public $fromLanguageFallback;
  /**
   * @var bool
   */
  public $fromRestricts;
  /**
   * @var bool
   */
  public $fromSgDomains;
  /**
   * @var bool
   */
  public $fromTld;
  /**
   * @var bool
   */
  public $fromUgc;
  /**
   * @var bool
   */
  public $fromUrlPattern;
  /**
   * @var bool
   */
  public $fromWmx;
  protected $geoLocationsType = CountryGeoLocations::class;
  protected $geoLocationsDataType = '';
  /**
   * @var bool
   */
  public $global;
  /**
   * @var bool
   */
  public $isValidForCountryRestrict;
  /**
   * @var string[]
   */
  public $localCountries;
  /**
   * @var int[]
   */
  public $localCountryCodes;
  protected $metroIdListType = CountryMetroNBFeature::class;
  protected $metroIdListDataType = 'array';
  /**
   * @var string[]
   */
  public $metroLocationId;
  protected $metroNavboostType = CountryMetroNBFeature::class;
  protected $metroNavboostDataType = 'array';
  protected $provinceGeotokenListType = CountryProvinceGeotoken::class;
  protected $provinceGeotokenListDataType = 'array';
  /**
   * @var string[]
   */
  public $relatedCountries;
  /**
   * @var int[]
   */
  public $relatedCountryCodes;
  /**
   * @var string[]
   */
  public $restrictCountries;
  protected $salientCountriesType = CountrySalientCountry::class;
  protected $salientCountriesDataType = 'array';
  protected $salientCountrySetType = QualitySalientCountriesSalientCountrySet::class;
  protected $salientCountrySetDataType = '';
  /**
   * @var string
   */
  public $sitename;
  /**
   * @var bool
   */
  public $superGlobal;
  /**
   * @var int
   */
  public $urlPatternBasedCountry;
  /**
   * @var int
   */
  public $urlPatternBasedLanguage;
  /**
   * @var string
   */
  public $userVisibleCountryFromLogs;
  /**
   * @var int
   */
  public $userVisibleLocalCountry;
  public $weightAboveIdealForLocalness;
  /**
   * @var string
   */
  public $wmxCountry;

  /**
   * @param CountryClickDistribution
   */
  public function setClickDistribution(CountryClickDistribution $clickDistribution)
  {
    $this->clickDistribution = $clickDistribution;
  }
  /**
   * @return CountryClickDistribution
   */
  public function getClickDistribution()
  {
    return $this->clickDistribution;
  }
  /**
   * @param bool
   */
  public function setCountryidFromUgc($countryidFromUgc)
  {
    $this->countryidFromUgc = $countryidFromUgc;
  }
  /**
   * @return bool
   */
  public function getCountryidFromUgc()
  {
    return $this->countryidFromUgc;
  }
  /**
   * @param string
   */
  public function setDebug($debug)
  {
    $this->debug = $debug;
  }
  /**
   * @return string
   */
  public function getDebug()
  {
    return $this->debug;
  }
  /**
   * @param string[]
   */
  public function setDebugSourceUrl($debugSourceUrl)
  {
    $this->debugSourceUrl = $debugSourceUrl;
  }
  /**
   * @return string[]
   */
  public function getDebugSourceUrl()
  {
    return $this->debugSourceUrl;
  }
  /**
   * @param string
   */
  public function setDocumentLocationSource($documentLocationSource)
  {
    $this->documentLocationSource = $documentLocationSource;
  }
  /**
   * @return string
   */
  public function getDocumentLocationSource()
  {
    return $this->documentLocationSource;
  }
  /**
   * @param bool
   */
  public function setExistNextLevel($existNextLevel)
  {
    $this->existNextLevel = $existNextLevel;
  }
  /**
   * @return bool
   */
  public function getExistNextLevel()
  {
    return $this->existNextLevel;
  }
  /**
   * @param bool
   */
  public function setFromLanguageFallback($fromLanguageFallback)
  {
    $this->fromLanguageFallback = $fromLanguageFallback;
  }
  /**
   * @return bool
   */
  public function getFromLanguageFallback()
  {
    return $this->fromLanguageFallback;
  }
  /**
   * @param bool
   */
  public function setFromRestricts($fromRestricts)
  {
    $this->fromRestricts = $fromRestricts;
  }
  /**
   * @return bool
   */
  public function getFromRestricts()
  {
    return $this->fromRestricts;
  }
  /**
   * @param bool
   */
  public function setFromSgDomains($fromSgDomains)
  {
    $this->fromSgDomains = $fromSgDomains;
  }
  /**
   * @return bool
   */
  public function getFromSgDomains()
  {
    return $this->fromSgDomains;
  }
  /**
   * @param bool
   */
  public function setFromTld($fromTld)
  {
    $this->fromTld = $fromTld;
  }
  /**
   * @return bool
   */
  public function getFromTld()
  {
    return $this->fromTld;
  }
  /**
   * @param bool
   */
  public function setFromUgc($fromUgc)
  {
    $this->fromUgc = $fromUgc;
  }
  /**
   * @return bool
   */
  public function getFromUgc()
  {
    return $this->fromUgc;
  }
  /**
   * @param bool
   */
  public function setFromUrlPattern($fromUrlPattern)
  {
    $this->fromUrlPattern = $fromUrlPattern;
  }
  /**
   * @return bool
   */
  public function getFromUrlPattern()
  {
    return $this->fromUrlPattern;
  }
  /**
   * @param bool
   */
  public function setFromWmx($fromWmx)
  {
    $this->fromWmx = $fromWmx;
  }
  /**
   * @return bool
   */
  public function getFromWmx()
  {
    return $this->fromWmx;
  }
  /**
   * @param CountryGeoLocations
   */
  public function setGeoLocations(CountryGeoLocations $geoLocations)
  {
    $this->geoLocations = $geoLocations;
  }
  /**
   * @return CountryGeoLocations
   */
  public function getGeoLocations()
  {
    return $this->geoLocations;
  }
  /**
   * @param bool
   */
  public function setGlobal($global)
  {
    $this->global = $global;
  }
  /**
   * @return bool
   */
  public function getGlobal()
  {
    return $this->global;
  }
  /**
   * @param bool
   */
  public function setIsValidForCountryRestrict($isValidForCountryRestrict)
  {
    $this->isValidForCountryRestrict = $isValidForCountryRestrict;
  }
  /**
   * @return bool
   */
  public function getIsValidForCountryRestrict()
  {
    return $this->isValidForCountryRestrict;
  }
  /**
   * @param string[]
   */
  public function setLocalCountries($localCountries)
  {
    $this->localCountries = $localCountries;
  }
  /**
   * @return string[]
   */
  public function getLocalCountries()
  {
    return $this->localCountries;
  }
  /**
   * @param int[]
   */
  public function setLocalCountryCodes($localCountryCodes)
  {
    $this->localCountryCodes = $localCountryCodes;
  }
  /**
   * @return int[]
   */
  public function getLocalCountryCodes()
  {
    return $this->localCountryCodes;
  }
  /**
   * @param CountryMetroNBFeature[]
   */
  public function setMetroIdList($metroIdList)
  {
    $this->metroIdList = $metroIdList;
  }
  /**
   * @return CountryMetroNBFeature[]
   */
  public function getMetroIdList()
  {
    return $this->metroIdList;
  }
  /**
   * @param string[]
   */
  public function setMetroLocationId($metroLocationId)
  {
    $this->metroLocationId = $metroLocationId;
  }
  /**
   * @return string[]
   */
  public function getMetroLocationId()
  {
    return $this->metroLocationId;
  }
  /**
   * @param CountryMetroNBFeature[]
   */
  public function setMetroNavboost($metroNavboost)
  {
    $this->metroNavboost = $metroNavboost;
  }
  /**
   * @return CountryMetroNBFeature[]
   */
  public function getMetroNavboost()
  {
    return $this->metroNavboost;
  }
  /**
   * @param CountryProvinceGeotoken[]
   */
  public function setProvinceGeotokenList($provinceGeotokenList)
  {
    $this->provinceGeotokenList = $provinceGeotokenList;
  }
  /**
   * @return CountryProvinceGeotoken[]
   */
  public function getProvinceGeotokenList()
  {
    return $this->provinceGeotokenList;
  }
  /**
   * @param string[]
   */
  public function setRelatedCountries($relatedCountries)
  {
    $this->relatedCountries = $relatedCountries;
  }
  /**
   * @return string[]
   */
  public function getRelatedCountries()
  {
    return $this->relatedCountries;
  }
  /**
   * @param int[]
   */
  public function setRelatedCountryCodes($relatedCountryCodes)
  {
    $this->relatedCountryCodes = $relatedCountryCodes;
  }
  /**
   * @return int[]
   */
  public function getRelatedCountryCodes()
  {
    return $this->relatedCountryCodes;
  }
  /**
   * @param string[]
   */
  public function setRestrictCountries($restrictCountries)
  {
    $this->restrictCountries = $restrictCountries;
  }
  /**
   * @return string[]
   */
  public function getRestrictCountries()
  {
    return $this->restrictCountries;
  }
  /**
   * @param CountrySalientCountry[]
   */
  public function setSalientCountries($salientCountries)
  {
    $this->salientCountries = $salientCountries;
  }
  /**
   * @return CountrySalientCountry[]
   */
  public function getSalientCountries()
  {
    return $this->salientCountries;
  }
  /**
   * @param QualitySalientCountriesSalientCountrySet
   */
  public function setSalientCountrySet(QualitySalientCountriesSalientCountrySet $salientCountrySet)
  {
    $this->salientCountrySet = $salientCountrySet;
  }
  /**
   * @return QualitySalientCountriesSalientCountrySet
   */
  public function getSalientCountrySet()
  {
    return $this->salientCountrySet;
  }
  /**
   * @param string
   */
  public function setSitename($sitename)
  {
    $this->sitename = $sitename;
  }
  /**
   * @return string
   */
  public function getSitename()
  {
    return $this->sitename;
  }
  /**
   * @param bool
   */
  public function setSuperGlobal($superGlobal)
  {
    $this->superGlobal = $superGlobal;
  }
  /**
   * @return bool
   */
  public function getSuperGlobal()
  {
    return $this->superGlobal;
  }
  /**
   * @param int
   */
  public function setUrlPatternBasedCountry($urlPatternBasedCountry)
  {
    $this->urlPatternBasedCountry = $urlPatternBasedCountry;
  }
  /**
   * @return int
   */
  public function getUrlPatternBasedCountry()
  {
    return $this->urlPatternBasedCountry;
  }
  /**
   * @param int
   */
  public function setUrlPatternBasedLanguage($urlPatternBasedLanguage)
  {
    $this->urlPatternBasedLanguage = $urlPatternBasedLanguage;
  }
  /**
   * @return int
   */
  public function getUrlPatternBasedLanguage()
  {
    return $this->urlPatternBasedLanguage;
  }
  /**
   * @param string
   */
  public function setUserVisibleCountryFromLogs($userVisibleCountryFromLogs)
  {
    $this->userVisibleCountryFromLogs = $userVisibleCountryFromLogs;
  }
  /**
   * @return string
   */
  public function getUserVisibleCountryFromLogs()
  {
    return $this->userVisibleCountryFromLogs;
  }
  /**
   * @param int
   */
  public function setUserVisibleLocalCountry($userVisibleLocalCountry)
  {
    $this->userVisibleLocalCountry = $userVisibleLocalCountry;
  }
  /**
   * @return int
   */
  public function getUserVisibleLocalCountry()
  {
    return $this->userVisibleLocalCountry;
  }
  public function setWeightAboveIdealForLocalness($weightAboveIdealForLocalness)
  {
    $this->weightAboveIdealForLocalness = $weightAboveIdealForLocalness;
  }
  public function getWeightAboveIdealForLocalness()
  {
    return $this->weightAboveIdealForLocalness;
  }
  /**
   * @param string
   */
  public function setWmxCountry($wmxCountry)
  {
    $this->wmxCountry = $wmxCountry;
  }
  /**
   * @return string
   */
  public function getWmxCountry()
  {
    return $this->wmxCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountryCountryAttachment::class, 'Google_Service_Contentwarehouse_CountryCountryAttachment');
