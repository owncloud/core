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

class TravelFlightsAirlineConfig extends \Google\Collection
{
  protected $collection_key = 'localizedContactInfo';
  /**
   * @var int
   */
  public $adwordsCid;
  /**
   * @var string
   */
  public $alliance;
  protected $baggageCarryonLimitationsUrlsType = TravelFlightsNameCatalogProto::class;
  protected $baggageCarryonLimitationsUrlsDataType = '';
  protected $baggageFeeUrlsType = TravelFlightsNameCatalogProto::class;
  protected $baggageFeeUrlsDataType = '';
  /**
   * @var string
   */
  public $countryCode;
  protected $countryContactInfoType = TravelFlightsAirlineConfigCountryContactInfo::class;
  protected $countryContactInfoDataType = 'array';
  /**
   * @var bool
   */
  public $dupFlag;
  protected $fareFamilyUrlsType = TravelFlightsNameCatalogProto::class;
  protected $fareFamilyUrlsDataType = '';
  /**
   * @var string[]
   */
  public $fqtvPartnerCode;
  /**
   * @var string
   */
  public $iataCode;
  /**
   * @var string
   */
  public $icaoCode;
  /**
   * @var string
   */
  public $innovataCode;
  protected $localizedContactInfoType = TravelFlightsAirlineConfigLocalizedContactInfo::class;
  protected $localizedContactInfoDataType = 'array';
  /**
   * @var string
   */
  public $mid;
  protected $namesType = TravelFlightsNameCatalogProto::class;
  protected $namesDataType = '';
  /**
   * @var int
   */
  public $popularity;
  protected $shortNamesType = TravelFlightsNameCatalogProto::class;
  protected $shortNamesDataType = '';
  /**
   * @var string
   */
  public $type;
  protected $urlsType = TravelFlightsNameCatalogProto::class;
  protected $urlsDataType = '';
  protected $waiverSummaryUrlsType = TravelFlightsNameCatalogProto::class;
  protected $waiverSummaryUrlsDataType = '';

  /**
   * @param int
   */
  public function setAdwordsCid($adwordsCid)
  {
    $this->adwordsCid = $adwordsCid;
  }
  /**
   * @return int
   */
  public function getAdwordsCid()
  {
    return $this->adwordsCid;
  }
  /**
   * @param string
   */
  public function setAlliance($alliance)
  {
    $this->alliance = $alliance;
  }
  /**
   * @return string
   */
  public function getAlliance()
  {
    return $this->alliance;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setBaggageCarryonLimitationsUrls(TravelFlightsNameCatalogProto $baggageCarryonLimitationsUrls)
  {
    $this->baggageCarryonLimitationsUrls = $baggageCarryonLimitationsUrls;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getBaggageCarryonLimitationsUrls()
  {
    return $this->baggageCarryonLimitationsUrls;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setBaggageFeeUrls(TravelFlightsNameCatalogProto $baggageFeeUrls)
  {
    $this->baggageFeeUrls = $baggageFeeUrls;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getBaggageFeeUrls()
  {
    return $this->baggageFeeUrls;
  }
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
   * @param TravelFlightsAirlineConfigCountryContactInfo[]
   */
  public function setCountryContactInfo($countryContactInfo)
  {
    $this->countryContactInfo = $countryContactInfo;
  }
  /**
   * @return TravelFlightsAirlineConfigCountryContactInfo[]
   */
  public function getCountryContactInfo()
  {
    return $this->countryContactInfo;
  }
  /**
   * @param bool
   */
  public function setDupFlag($dupFlag)
  {
    $this->dupFlag = $dupFlag;
  }
  /**
   * @return bool
   */
  public function getDupFlag()
  {
    return $this->dupFlag;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setFareFamilyUrls(TravelFlightsNameCatalogProto $fareFamilyUrls)
  {
    $this->fareFamilyUrls = $fareFamilyUrls;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getFareFamilyUrls()
  {
    return $this->fareFamilyUrls;
  }
  /**
   * @param string[]
   */
  public function setFqtvPartnerCode($fqtvPartnerCode)
  {
    $this->fqtvPartnerCode = $fqtvPartnerCode;
  }
  /**
   * @return string[]
   */
  public function getFqtvPartnerCode()
  {
    return $this->fqtvPartnerCode;
  }
  /**
   * @param string
   */
  public function setIataCode($iataCode)
  {
    $this->iataCode = $iataCode;
  }
  /**
   * @return string
   */
  public function getIataCode()
  {
    return $this->iataCode;
  }
  /**
   * @param string
   */
  public function setIcaoCode($icaoCode)
  {
    $this->icaoCode = $icaoCode;
  }
  /**
   * @return string
   */
  public function getIcaoCode()
  {
    return $this->icaoCode;
  }
  /**
   * @param string
   */
  public function setInnovataCode($innovataCode)
  {
    $this->innovataCode = $innovataCode;
  }
  /**
   * @return string
   */
  public function getInnovataCode()
  {
    return $this->innovataCode;
  }
  /**
   * @param TravelFlightsAirlineConfigLocalizedContactInfo[]
   */
  public function setLocalizedContactInfo($localizedContactInfo)
  {
    $this->localizedContactInfo = $localizedContactInfo;
  }
  /**
   * @return TravelFlightsAirlineConfigLocalizedContactInfo[]
   */
  public function getLocalizedContactInfo()
  {
    return $this->localizedContactInfo;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setNames(TravelFlightsNameCatalogProto $names)
  {
    $this->names = $names;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getNames()
  {
    return $this->names;
  }
  /**
   * @param int
   */
  public function setPopularity($popularity)
  {
    $this->popularity = $popularity;
  }
  /**
   * @return int
   */
  public function getPopularity()
  {
    return $this->popularity;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setShortNames(TravelFlightsNameCatalogProto $shortNames)
  {
    $this->shortNames = $shortNames;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getShortNames()
  {
    return $this->shortNames;
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
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setUrls(TravelFlightsNameCatalogProto $urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getUrls()
  {
    return $this->urls;
  }
  /**
   * @param TravelFlightsNameCatalogProto
   */
  public function setWaiverSummaryUrls(TravelFlightsNameCatalogProto $waiverSummaryUrls)
  {
    $this->waiverSummaryUrls = $waiverSummaryUrls;
  }
  /**
   * @return TravelFlightsNameCatalogProto
   */
  public function getWaiverSummaryUrls()
  {
    return $this->waiverSummaryUrls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TravelFlightsAirlineConfig::class, 'Google_Service_Contentwarehouse_TravelFlightsAirlineConfig');
