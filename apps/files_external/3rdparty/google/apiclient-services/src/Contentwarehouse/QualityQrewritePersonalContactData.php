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

class QualityQrewritePersonalContactData extends \Google\Collection
{
  protected $collection_key = 'relationshipMemory';
  protected $accountProvenanceType = QualityQrewriteAccountProvenance::class;
  protected $accountProvenanceDataType = '';
  /**
   * @var array[]
   */
  public $additionalContactMetadata;
  /**
   * @var float
   */
  public $commonNameAliasConfidence;
  /**
   * @var string
   */
  public $conceptId;
  /**
   * @var string
   */
  public $conceptIdEn;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $familyName;
  public $ffracScore;
  /**
   * @var string
   */
  public $gaiaId;
  /**
   * @var string
   */
  public $givenName;
  /**
   * @var bool
   */
  public $hasAddressForDeviceContacts;
  /**
   * @var bool
   */
  public $hasGplusProfile;
  /**
   * @var bool
   */
  public $isFromOnDeviceLookup;
  /**
   * @var bool
   */
  public $isTransliteratedMatch;
  /**
   * @var bool
   */
  public $isVisibleToGuestsRelationship;
  protected $matchSignalType = AssistantVerticalsCommonContactMatchSignal::class;
  protected $matchSignalDataType = '';
  /**
   * @var string
   */
  public $matchedNameType;
  /**
   * @var string
   */
  public $matchedRecognitionAlternateName;
  protected $personDataType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $personDataDataType = '';
  protected $personalContactDataLogType = AssistantLogsCommunicationPersonalContactDataLog::class;
  protected $personalContactDataLogDataType = '';
  protected $pkgPersonType = NlpSemanticParsingQRefAnnotation::class;
  protected $pkgPersonDataType = '';
  /**
   * @var string
   */
  public $pkgReferenceType;
  /**
   * @var float
   */
  public $recognitionAlternateScore;
  /**
   * @var string
   */
  public $recognitionAlternateSource;
  protected $relationshipLexicalInfoType = CopleyLexicalMetadata::class;
  protected $relationshipLexicalInfoDataType = '';
  protected $relationshipMemoryType = QualityQrewriteRelationshipMemoryData::class;
  protected $relationshipMemoryDataType = 'array';
  /**
   * @var string
   */
  public $sharedContactOwnerGaiaId;
  /**
   * @var string
   */
  public $source;

  /**
   * @param QualityQrewriteAccountProvenance
   */
  public function setAccountProvenance(QualityQrewriteAccountProvenance $accountProvenance)
  {
    $this->accountProvenance = $accountProvenance;
  }
  /**
   * @return QualityQrewriteAccountProvenance
   */
  public function getAccountProvenance()
  {
    return $this->accountProvenance;
  }
  /**
   * @param array[]
   */
  public function setAdditionalContactMetadata($additionalContactMetadata)
  {
    $this->additionalContactMetadata = $additionalContactMetadata;
  }
  /**
   * @return array[]
   */
  public function getAdditionalContactMetadata()
  {
    return $this->additionalContactMetadata;
  }
  /**
   * @param float
   */
  public function setCommonNameAliasConfidence($commonNameAliasConfidence)
  {
    $this->commonNameAliasConfidence = $commonNameAliasConfidence;
  }
  /**
   * @return float
   */
  public function getCommonNameAliasConfidence()
  {
    return $this->commonNameAliasConfidence;
  }
  /**
   * @param string
   */
  public function setConceptId($conceptId)
  {
    $this->conceptId = $conceptId;
  }
  /**
   * @return string
   */
  public function getConceptId()
  {
    return $this->conceptId;
  }
  /**
   * @param string
   */
  public function setConceptIdEn($conceptIdEn)
  {
    $this->conceptIdEn = $conceptIdEn;
  }
  /**
   * @return string
   */
  public function getConceptIdEn()
  {
    return $this->conceptIdEn;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  /**
   * @return string
   */
  public function getFamilyName()
  {
    return $this->familyName;
  }
  public function setFfracScore($ffracScore)
  {
    $this->ffracScore = $ffracScore;
  }
  public function getFfracScore()
  {
    return $this->ffracScore;
  }
  /**
   * @param string
   */
  public function setGaiaId($gaiaId)
  {
    $this->gaiaId = $gaiaId;
  }
  /**
   * @return string
   */
  public function getGaiaId()
  {
    return $this->gaiaId;
  }
  /**
   * @param string
   */
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  /**
   * @return string
   */
  public function getGivenName()
  {
    return $this->givenName;
  }
  /**
   * @param bool
   */
  public function setHasAddressForDeviceContacts($hasAddressForDeviceContacts)
  {
    $this->hasAddressForDeviceContacts = $hasAddressForDeviceContacts;
  }
  /**
   * @return bool
   */
  public function getHasAddressForDeviceContacts()
  {
    return $this->hasAddressForDeviceContacts;
  }
  /**
   * @param bool
   */
  public function setHasGplusProfile($hasGplusProfile)
  {
    $this->hasGplusProfile = $hasGplusProfile;
  }
  /**
   * @return bool
   */
  public function getHasGplusProfile()
  {
    return $this->hasGplusProfile;
  }
  /**
   * @param bool
   */
  public function setIsFromOnDeviceLookup($isFromOnDeviceLookup)
  {
    $this->isFromOnDeviceLookup = $isFromOnDeviceLookup;
  }
  /**
   * @return bool
   */
  public function getIsFromOnDeviceLookup()
  {
    return $this->isFromOnDeviceLookup;
  }
  /**
   * @param bool
   */
  public function setIsTransliteratedMatch($isTransliteratedMatch)
  {
    $this->isTransliteratedMatch = $isTransliteratedMatch;
  }
  /**
   * @return bool
   */
  public function getIsTransliteratedMatch()
  {
    return $this->isTransliteratedMatch;
  }
  /**
   * @param bool
   */
  public function setIsVisibleToGuestsRelationship($isVisibleToGuestsRelationship)
  {
    $this->isVisibleToGuestsRelationship = $isVisibleToGuestsRelationship;
  }
  /**
   * @return bool
   */
  public function getIsVisibleToGuestsRelationship()
  {
    return $this->isVisibleToGuestsRelationship;
  }
  /**
   * @param AssistantVerticalsCommonContactMatchSignal
   */
  public function setMatchSignal(AssistantVerticalsCommonContactMatchSignal $matchSignal)
  {
    $this->matchSignal = $matchSignal;
  }
  /**
   * @return AssistantVerticalsCommonContactMatchSignal
   */
  public function getMatchSignal()
  {
    return $this->matchSignal;
  }
  /**
   * @param string
   */
  public function setMatchedNameType($matchedNameType)
  {
    $this->matchedNameType = $matchedNameType;
  }
  /**
   * @return string
   */
  public function getMatchedNameType()
  {
    return $this->matchedNameType;
  }
  /**
   * @param string
   */
  public function setMatchedRecognitionAlternateName($matchedRecognitionAlternateName)
  {
    $this->matchedRecognitionAlternateName = $matchedRecognitionAlternateName;
  }
  /**
   * @return string
   */
  public function getMatchedRecognitionAlternateName()
  {
    return $this->matchedRecognitionAlternateName;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson
   */
  public function setPersonData(AppsPeopleOzExternalMergedpeopleapiPerson $personData)
  {
    $this->personData = $personData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson
   */
  public function getPersonData()
  {
    return $this->personData;
  }
  /**
   * @param AssistantLogsCommunicationPersonalContactDataLog
   */
  public function setPersonalContactDataLog(AssistantLogsCommunicationPersonalContactDataLog $personalContactDataLog)
  {
    $this->personalContactDataLog = $personalContactDataLog;
  }
  /**
   * @return AssistantLogsCommunicationPersonalContactDataLog
   */
  public function getPersonalContactDataLog()
  {
    return $this->personalContactDataLog;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation
   */
  public function setPkgPerson(NlpSemanticParsingQRefAnnotation $pkgPerson)
  {
    $this->pkgPerson = $pkgPerson;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation
   */
  public function getPkgPerson()
  {
    return $this->pkgPerson;
  }
  /**
   * @param string
   */
  public function setPkgReferenceType($pkgReferenceType)
  {
    $this->pkgReferenceType = $pkgReferenceType;
  }
  /**
   * @return string
   */
  public function getPkgReferenceType()
  {
    return $this->pkgReferenceType;
  }
  /**
   * @param float
   */
  public function setRecognitionAlternateScore($recognitionAlternateScore)
  {
    $this->recognitionAlternateScore = $recognitionAlternateScore;
  }
  /**
   * @return float
   */
  public function getRecognitionAlternateScore()
  {
    return $this->recognitionAlternateScore;
  }
  /**
   * @param string
   */
  public function setRecognitionAlternateSource($recognitionAlternateSource)
  {
    $this->recognitionAlternateSource = $recognitionAlternateSource;
  }
  /**
   * @return string
   */
  public function getRecognitionAlternateSource()
  {
    return $this->recognitionAlternateSource;
  }
  /**
   * @param CopleyLexicalMetadata
   */
  public function setRelationshipLexicalInfo(CopleyLexicalMetadata $relationshipLexicalInfo)
  {
    $this->relationshipLexicalInfo = $relationshipLexicalInfo;
  }
  /**
   * @return CopleyLexicalMetadata
   */
  public function getRelationshipLexicalInfo()
  {
    return $this->relationshipLexicalInfo;
  }
  /**
   * @param QualityQrewriteRelationshipMemoryData[]
   */
  public function setRelationshipMemory($relationshipMemory)
  {
    $this->relationshipMemory = $relationshipMemory;
  }
  /**
   * @return QualityQrewriteRelationshipMemoryData[]
   */
  public function getRelationshipMemory()
  {
    return $this->relationshipMemory;
  }
  /**
   * @param string
   */
  public function setSharedContactOwnerGaiaId($sharedContactOwnerGaiaId)
  {
    $this->sharedContactOwnerGaiaId = $sharedContactOwnerGaiaId;
  }
  /**
   * @return string
   */
  public function getSharedContactOwnerGaiaId()
  {
    return $this->sharedContactOwnerGaiaId;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityQrewritePersonalContactData::class, 'Google_Service_Contentwarehouse_QualityQrewritePersonalContactData');
