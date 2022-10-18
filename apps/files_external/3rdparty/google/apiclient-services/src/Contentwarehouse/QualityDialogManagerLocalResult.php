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

class QualityDialogManagerLocalResult extends \Google\Collection
{
  protected $collection_key = 'synonym';
  /**
   * @var string
   */
  public $adminArea1;
  protected $availableIntentsType = QualityDialogManagerLocalIntentOptions::class;
  protected $availableIntentsDataType = '';
  protected $businessTypeType = NlpSemanticParsingLocalBusinessType::class;
  protected $businessTypeDataType = '';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $distanceMeters;
  /**
   * @var string
   */
  public $distanceUnits;
  protected $externalIdsType = QualityDialogManagerExternalIds::class;
  protected $externalIdsDataType = '';
  /**
   * @var string
   */
  public $featureType;
  /**
   * @var bool
   */
  public $inUserAdminArea1;
  /**
   * @var bool
   */
  public $inUserCountry;
  /**
   * @var bool
   */
  public $inUserLocality;
  protected $internalFoodOrderingMetadataType = LocalsearchProtoInternalFoodOrderingActionMetadata::class;
  protected $internalFoodOrderingMetadataDataType = '';
  /**
   * @var bool
   */
  public $isBusinessChain;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $neighborhood;
  protected $resultIdType = NlpSemanticParsingLocalLocalResultId::class;
  protected $resultIdDataType = '';
  /**
   * @var string
   */
  public $streetName;
  /**
   * @var string
   */
  public $streetNumber;
  /**
   * @var string[]
   */
  public $synonym;
  /**
   * @var string
   */
  public $ttsAddress;

  /**
   * @param string
   */
  public function setAdminArea1($adminArea1)
  {
    $this->adminArea1 = $adminArea1;
  }
  /**
   * @return string
   */
  public function getAdminArea1()
  {
    return $this->adminArea1;
  }
  /**
   * @param QualityDialogManagerLocalIntentOptions
   */
  public function setAvailableIntents(QualityDialogManagerLocalIntentOptions $availableIntents)
  {
    $this->availableIntents = $availableIntents;
  }
  /**
   * @return QualityDialogManagerLocalIntentOptions
   */
  public function getAvailableIntents()
  {
    return $this->availableIntents;
  }
  /**
   * @param NlpSemanticParsingLocalBusinessType
   */
  public function setBusinessType(NlpSemanticParsingLocalBusinessType $businessType)
  {
    $this->businessType = $businessType;
  }
  /**
   * @return NlpSemanticParsingLocalBusinessType
   */
  public function getBusinessType()
  {
    return $this->businessType;
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
  public function setDistanceMeters($distanceMeters)
  {
    $this->distanceMeters = $distanceMeters;
  }
  /**
   * @return string
   */
  public function getDistanceMeters()
  {
    return $this->distanceMeters;
  }
  /**
   * @param string
   */
  public function setDistanceUnits($distanceUnits)
  {
    $this->distanceUnits = $distanceUnits;
  }
  /**
   * @return string
   */
  public function getDistanceUnits()
  {
    return $this->distanceUnits;
  }
  /**
   * @param QualityDialogManagerExternalIds
   */
  public function setExternalIds(QualityDialogManagerExternalIds $externalIds)
  {
    $this->externalIds = $externalIds;
  }
  /**
   * @return QualityDialogManagerExternalIds
   */
  public function getExternalIds()
  {
    return $this->externalIds;
  }
  /**
   * @param string
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return string
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param bool
   */
  public function setInUserAdminArea1($inUserAdminArea1)
  {
    $this->inUserAdminArea1 = $inUserAdminArea1;
  }
  /**
   * @return bool
   */
  public function getInUserAdminArea1()
  {
    return $this->inUserAdminArea1;
  }
  /**
   * @param bool
   */
  public function setInUserCountry($inUserCountry)
  {
    $this->inUserCountry = $inUserCountry;
  }
  /**
   * @return bool
   */
  public function getInUserCountry()
  {
    return $this->inUserCountry;
  }
  /**
   * @param bool
   */
  public function setInUserLocality($inUserLocality)
  {
    $this->inUserLocality = $inUserLocality;
  }
  /**
   * @return bool
   */
  public function getInUserLocality()
  {
    return $this->inUserLocality;
  }
  /**
   * @param LocalsearchProtoInternalFoodOrderingActionMetadata
   */
  public function setInternalFoodOrderingMetadata(LocalsearchProtoInternalFoodOrderingActionMetadata $internalFoodOrderingMetadata)
  {
    $this->internalFoodOrderingMetadata = $internalFoodOrderingMetadata;
  }
  /**
   * @return LocalsearchProtoInternalFoodOrderingActionMetadata
   */
  public function getInternalFoodOrderingMetadata()
  {
    return $this->internalFoodOrderingMetadata;
  }
  /**
   * @param bool
   */
  public function setIsBusinessChain($isBusinessChain)
  {
    $this->isBusinessChain = $isBusinessChain;
  }
  /**
   * @return bool
   */
  public function getIsBusinessChain()
  {
    return $this->isBusinessChain;
  }
  /**
   * @param string
   */
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return string
   */
  public function getLocality()
  {
    return $this->locality;
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
  public function setNeighborhood($neighborhood)
  {
    $this->neighborhood = $neighborhood;
  }
  /**
   * @return string
   */
  public function getNeighborhood()
  {
    return $this->neighborhood;
  }
  /**
   * @param NlpSemanticParsingLocalLocalResultId
   */
  public function setResultId(NlpSemanticParsingLocalLocalResultId $resultId)
  {
    $this->resultId = $resultId;
  }
  /**
   * @return NlpSemanticParsingLocalLocalResultId
   */
  public function getResultId()
  {
    return $this->resultId;
  }
  /**
   * @param string
   */
  public function setStreetName($streetName)
  {
    $this->streetName = $streetName;
  }
  /**
   * @return string
   */
  public function getStreetName()
  {
    return $this->streetName;
  }
  /**
   * @param string
   */
  public function setStreetNumber($streetNumber)
  {
    $this->streetNumber = $streetNumber;
  }
  /**
   * @return string
   */
  public function getStreetNumber()
  {
    return $this->streetNumber;
  }
  /**
   * @param string[]
   */
  public function setSynonym($synonym)
  {
    $this->synonym = $synonym;
  }
  /**
   * @return string[]
   */
  public function getSynonym()
  {
    return $this->synonym;
  }
  /**
   * @param string
   */
  public function setTtsAddress($ttsAddress)
  {
    $this->ttsAddress = $ttsAddress;
  }
  /**
   * @return string
   */
  public function getTtsAddress()
  {
    return $this->ttsAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityDialogManagerLocalResult::class, 'Google_Service_Contentwarehouse_QualityDialogManagerLocalResult');
