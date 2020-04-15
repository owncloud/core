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

class Google_Service_CivicInfo_StreetSegment extends Google_Collection
{
  protected $collection_key = 'voterGeographicDivisionOcdIds';
  public $administrationRegionIds;
  public $beforeGeocodeId;
  public $catalistUniquePrecinctCode;
  public $city;
  public $cityCouncilDistrict;
  public $congressionalDistrict;
  public $contestIds;
  public $countyCouncilDistrict;
  public $countyFips;
  public $datasetId;
  public $earlyVoteSiteByIds;
  public $endHouseNumber;
  protected $geocodedPointType = 'Google_Service_CivicInfo_PointProto';
  protected $geocodedPointDataType = '';
  public $geographicDivisionOcdIds;
  public $id;
  public $judicialDistrict;
  public $mailOnly;
  public $municipalDistrict;
  public $ncoaAddress;
  public $oddOrEvens;
  public $originalId;
  public $pollinglocationByIds;
  public $precinctName;
  public $precinctOcdId;
  protected $provenancesType = 'Google_Service_CivicInfo_Provenance';
  protected $provenancesDataType = 'array';
  public $published;
  public $schoolDistrict;
  public $startHouseNumber;
  public $startLatE7;
  public $startLngE7;
  public $state;
  public $stateHouseDistrict;
  public $stateSenateDistrict;
  public $streetName;
  public $subAdministrativeAreaName;
  public $surrogateId;
  public $targetsmartUniquePrecinctCode;
  public $townshipDistrict;
  public $unitNumber;
  public $unitType;
  public $vanPrecinctCode;
  public $voterGeographicDivisionOcdIds;
  public $wardDistrict;
  public $wildcard;
  public $zip;

  public function setAdministrationRegionIds($administrationRegionIds)
  {
    $this->administrationRegionIds = $administrationRegionIds;
  }
  public function getAdministrationRegionIds()
  {
    return $this->administrationRegionIds;
  }
  public function setBeforeGeocodeId($beforeGeocodeId)
  {
    $this->beforeGeocodeId = $beforeGeocodeId;
  }
  public function getBeforeGeocodeId()
  {
    return $this->beforeGeocodeId;
  }
  public function setCatalistUniquePrecinctCode($catalistUniquePrecinctCode)
  {
    $this->catalistUniquePrecinctCode = $catalistUniquePrecinctCode;
  }
  public function getCatalistUniquePrecinctCode()
  {
    return $this->catalistUniquePrecinctCode;
  }
  public function setCity($city)
  {
    $this->city = $city;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setCityCouncilDistrict($cityCouncilDistrict)
  {
    $this->cityCouncilDistrict = $cityCouncilDistrict;
  }
  public function getCityCouncilDistrict()
  {
    return $this->cityCouncilDistrict;
  }
  public function setCongressionalDistrict($congressionalDistrict)
  {
    $this->congressionalDistrict = $congressionalDistrict;
  }
  public function getCongressionalDistrict()
  {
    return $this->congressionalDistrict;
  }
  public function setContestIds($contestIds)
  {
    $this->contestIds = $contestIds;
  }
  public function getContestIds()
  {
    return $this->contestIds;
  }
  public function setCountyCouncilDistrict($countyCouncilDistrict)
  {
    $this->countyCouncilDistrict = $countyCouncilDistrict;
  }
  public function getCountyCouncilDistrict()
  {
    return $this->countyCouncilDistrict;
  }
  public function setCountyFips($countyFips)
  {
    $this->countyFips = $countyFips;
  }
  public function getCountyFips()
  {
    return $this->countyFips;
  }
  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setEarlyVoteSiteByIds($earlyVoteSiteByIds)
  {
    $this->earlyVoteSiteByIds = $earlyVoteSiteByIds;
  }
  public function getEarlyVoteSiteByIds()
  {
    return $this->earlyVoteSiteByIds;
  }
  public function setEndHouseNumber($endHouseNumber)
  {
    $this->endHouseNumber = $endHouseNumber;
  }
  public function getEndHouseNumber()
  {
    return $this->endHouseNumber;
  }
  /**
   * @param Google_Service_CivicInfo_PointProto
   */
  public function setGeocodedPoint(Google_Service_CivicInfo_PointProto $geocodedPoint)
  {
    $this->geocodedPoint = $geocodedPoint;
  }
  /**
   * @return Google_Service_CivicInfo_PointProto
   */
  public function getGeocodedPoint()
  {
    return $this->geocodedPoint;
  }
  public function setGeographicDivisionOcdIds($geographicDivisionOcdIds)
  {
    $this->geographicDivisionOcdIds = $geographicDivisionOcdIds;
  }
  public function getGeographicDivisionOcdIds()
  {
    return $this->geographicDivisionOcdIds;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setJudicialDistrict($judicialDistrict)
  {
    $this->judicialDistrict = $judicialDistrict;
  }
  public function getJudicialDistrict()
  {
    return $this->judicialDistrict;
  }
  public function setMailOnly($mailOnly)
  {
    $this->mailOnly = $mailOnly;
  }
  public function getMailOnly()
  {
    return $this->mailOnly;
  }
  public function setMunicipalDistrict($municipalDistrict)
  {
    $this->municipalDistrict = $municipalDistrict;
  }
  public function getMunicipalDistrict()
  {
    return $this->municipalDistrict;
  }
  public function setNcoaAddress($ncoaAddress)
  {
    $this->ncoaAddress = $ncoaAddress;
  }
  public function getNcoaAddress()
  {
    return $this->ncoaAddress;
  }
  public function setOddOrEvens($oddOrEvens)
  {
    $this->oddOrEvens = $oddOrEvens;
  }
  public function getOddOrEvens()
  {
    return $this->oddOrEvens;
  }
  public function setOriginalId($originalId)
  {
    $this->originalId = $originalId;
  }
  public function getOriginalId()
  {
    return $this->originalId;
  }
  public function setPollinglocationByIds($pollinglocationByIds)
  {
    $this->pollinglocationByIds = $pollinglocationByIds;
  }
  public function getPollinglocationByIds()
  {
    return $this->pollinglocationByIds;
  }
  public function setPrecinctName($precinctName)
  {
    $this->precinctName = $precinctName;
  }
  public function getPrecinctName()
  {
    return $this->precinctName;
  }
  public function setPrecinctOcdId($precinctOcdId)
  {
    $this->precinctOcdId = $precinctOcdId;
  }
  public function getPrecinctOcdId()
  {
    return $this->precinctOcdId;
  }
  /**
   * @param Google_Service_CivicInfo_Provenance
   */
  public function setProvenances($provenances)
  {
    $this->provenances = $provenances;
  }
  /**
   * @return Google_Service_CivicInfo_Provenance
   */
  public function getProvenances()
  {
    return $this->provenances;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSchoolDistrict($schoolDistrict)
  {
    $this->schoolDistrict = $schoolDistrict;
  }
  public function getSchoolDistrict()
  {
    return $this->schoolDistrict;
  }
  public function setStartHouseNumber($startHouseNumber)
  {
    $this->startHouseNumber = $startHouseNumber;
  }
  public function getStartHouseNumber()
  {
    return $this->startHouseNumber;
  }
  public function setStartLatE7($startLatE7)
  {
    $this->startLatE7 = $startLatE7;
  }
  public function getStartLatE7()
  {
    return $this->startLatE7;
  }
  public function setStartLngE7($startLngE7)
  {
    $this->startLngE7 = $startLngE7;
  }
  public function getStartLngE7()
  {
    return $this->startLngE7;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateHouseDistrict($stateHouseDistrict)
  {
    $this->stateHouseDistrict = $stateHouseDistrict;
  }
  public function getStateHouseDistrict()
  {
    return $this->stateHouseDistrict;
  }
  public function setStateSenateDistrict($stateSenateDistrict)
  {
    $this->stateSenateDistrict = $stateSenateDistrict;
  }
  public function getStateSenateDistrict()
  {
    return $this->stateSenateDistrict;
  }
  public function setStreetName($streetName)
  {
    $this->streetName = $streetName;
  }
  public function getStreetName()
  {
    return $this->streetName;
  }
  public function setSubAdministrativeAreaName($subAdministrativeAreaName)
  {
    $this->subAdministrativeAreaName = $subAdministrativeAreaName;
  }
  public function getSubAdministrativeAreaName()
  {
    return $this->subAdministrativeAreaName;
  }
  public function setSurrogateId($surrogateId)
  {
    $this->surrogateId = $surrogateId;
  }
  public function getSurrogateId()
  {
    return $this->surrogateId;
  }
  public function setTargetsmartUniquePrecinctCode($targetsmartUniquePrecinctCode)
  {
    $this->targetsmartUniquePrecinctCode = $targetsmartUniquePrecinctCode;
  }
  public function getTargetsmartUniquePrecinctCode()
  {
    return $this->targetsmartUniquePrecinctCode;
  }
  public function setTownshipDistrict($townshipDistrict)
  {
    $this->townshipDistrict = $townshipDistrict;
  }
  public function getTownshipDistrict()
  {
    return $this->townshipDistrict;
  }
  public function setUnitNumber($unitNumber)
  {
    $this->unitNumber = $unitNumber;
  }
  public function getUnitNumber()
  {
    return $this->unitNumber;
  }
  public function setUnitType($unitType)
  {
    $this->unitType = $unitType;
  }
  public function getUnitType()
  {
    return $this->unitType;
  }
  public function setVanPrecinctCode($vanPrecinctCode)
  {
    $this->vanPrecinctCode = $vanPrecinctCode;
  }
  public function getVanPrecinctCode()
  {
    return $this->vanPrecinctCode;
  }
  public function setVoterGeographicDivisionOcdIds($voterGeographicDivisionOcdIds)
  {
    $this->voterGeographicDivisionOcdIds = $voterGeographicDivisionOcdIds;
  }
  public function getVoterGeographicDivisionOcdIds()
  {
    return $this->voterGeographicDivisionOcdIds;
  }
  public function setWardDistrict($wardDistrict)
  {
    $this->wardDistrict = $wardDistrict;
  }
  public function getWardDistrict()
  {
    return $this->wardDistrict;
  }
  public function setWildcard($wildcard)
  {
    $this->wildcard = $wildcard;
  }
  public function getWildcard()
  {
    return $this->wildcard;
  }
  public function setZip($zip)
  {
    $this->zip = $zip;
  }
  public function getZip()
  {
    return $this->zip;
  }
}
