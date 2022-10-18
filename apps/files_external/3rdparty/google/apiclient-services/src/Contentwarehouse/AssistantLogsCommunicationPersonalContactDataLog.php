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

class AssistantLogsCommunicationPersonalContactDataLog extends \Google\Collection
{
  protected $collection_key = 'systemContactGroupId';
  protected $accountProvenanceType = AssistantLogsCommunicationGoogleAccountProvenance::class;
  protected $accountProvenanceDataType = '';
  /**
   * @var float
   */
  public $commonNameAliasConfidence;
  /**
   * @var string
   */
  public $conceptId;
  /**
   * @var int[]
   */
  public $deviceContactAttributes;
  /**
   * @var int
   */
  public $emailIdCount;
  protected $fuzzyNgramMatchType = AssistantLogsCommunicationFuzzyNgramMatchLog::class;
  protected $fuzzyNgramMatchDataType = 'array';
  /**
   * @var string
   */
  public $gaiaId;
  /**
   * @var bool
   */
  public $isContactFromSecondaryAccount;
  /**
   * @var bool
   */
  public $isShared;
  /**
   * @var bool
   */
  public $isTransliteratedMatch;
  /**
   * @var bool
   */
  public $isVanityContact;
  /**
   * @var bool
   */
  public $isVisibleToGuestsRelationship;
  /**
   * @var string
   */
  public $matchedNameType;
  /**
   * @var string
   */
  public $matchedRecognitionAlternateName;
  /**
   * @var string[]
   */
  public $matchedStarlightLookupName;
  protected $metadataType = AssistantLogsCommunicationPersonMetadataLog::class;
  protected $metadataDataType = '';
  /**
   * @var int[]
   */
  public $nameMatchedContactIndex;
  /**
   * @var string
   */
  public $originalQueryName;
  protected $phoneType = AssistantLogsCommunicationPhoneLog::class;
  protected $phoneDataType = 'array';
  /**
   * @var int
   */
  public $phoneNumberCount;
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
  /**
   * @var int
   */
  public $relationshipMemoryCount;
  protected $selectedPhoneType = AssistantLogsCommunicationPhoneLog::class;
  protected $selectedPhoneDataType = '';
  protected $shortcutContactInfoType = MajelContactInformationShortcutInformation::class;
  protected $shortcutContactInfoDataType = '';
  /**
   * @var string
   */
  public $source;
  /**
   * @var int[]
   */
  public $systemContactGroupId;
  /**
   * @var int
   */
  public $whatsappPhoneNumberCount;

  /**
   * @param AssistantLogsCommunicationGoogleAccountProvenance
   */
  public function setAccountProvenance(AssistantLogsCommunicationGoogleAccountProvenance $accountProvenance)
  {
    $this->accountProvenance = $accountProvenance;
  }
  /**
   * @return AssistantLogsCommunicationGoogleAccountProvenance
   */
  public function getAccountProvenance()
  {
    return $this->accountProvenance;
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
   * @param int[]
   */
  public function setDeviceContactAttributes($deviceContactAttributes)
  {
    $this->deviceContactAttributes = $deviceContactAttributes;
  }
  /**
   * @return int[]
   */
  public function getDeviceContactAttributes()
  {
    return $this->deviceContactAttributes;
  }
  /**
   * @param int
   */
  public function setEmailIdCount($emailIdCount)
  {
    $this->emailIdCount = $emailIdCount;
  }
  /**
   * @return int
   */
  public function getEmailIdCount()
  {
    return $this->emailIdCount;
  }
  /**
   * @param AssistantLogsCommunicationFuzzyNgramMatchLog[]
   */
  public function setFuzzyNgramMatch($fuzzyNgramMatch)
  {
    $this->fuzzyNgramMatch = $fuzzyNgramMatch;
  }
  /**
   * @return AssistantLogsCommunicationFuzzyNgramMatchLog[]
   */
  public function getFuzzyNgramMatch()
  {
    return $this->fuzzyNgramMatch;
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
   * @param bool
   */
  public function setIsContactFromSecondaryAccount($isContactFromSecondaryAccount)
  {
    $this->isContactFromSecondaryAccount = $isContactFromSecondaryAccount;
  }
  /**
   * @return bool
   */
  public function getIsContactFromSecondaryAccount()
  {
    return $this->isContactFromSecondaryAccount;
  }
  /**
   * @param bool
   */
  public function setIsShared($isShared)
  {
    $this->isShared = $isShared;
  }
  /**
   * @return bool
   */
  public function getIsShared()
  {
    return $this->isShared;
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
  public function setIsVanityContact($isVanityContact)
  {
    $this->isVanityContact = $isVanityContact;
  }
  /**
   * @return bool
   */
  public function getIsVanityContact()
  {
    return $this->isVanityContact;
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
   * @param string[]
   */
  public function setMatchedStarlightLookupName($matchedStarlightLookupName)
  {
    $this->matchedStarlightLookupName = $matchedStarlightLookupName;
  }
  /**
   * @return string[]
   */
  public function getMatchedStarlightLookupName()
  {
    return $this->matchedStarlightLookupName;
  }
  /**
   * @param AssistantLogsCommunicationPersonMetadataLog
   */
  public function setMetadata(AssistantLogsCommunicationPersonMetadataLog $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AssistantLogsCommunicationPersonMetadataLog
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param int[]
   */
  public function setNameMatchedContactIndex($nameMatchedContactIndex)
  {
    $this->nameMatchedContactIndex = $nameMatchedContactIndex;
  }
  /**
   * @return int[]
   */
  public function getNameMatchedContactIndex()
  {
    return $this->nameMatchedContactIndex;
  }
  /**
   * @param string
   */
  public function setOriginalQueryName($originalQueryName)
  {
    $this->originalQueryName = $originalQueryName;
  }
  /**
   * @return string
   */
  public function getOriginalQueryName()
  {
    return $this->originalQueryName;
  }
  /**
   * @param AssistantLogsCommunicationPhoneLog[]
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  /**
   * @return AssistantLogsCommunicationPhoneLog[]
   */
  public function getPhone()
  {
    return $this->phone;
  }
  /**
   * @param int
   */
  public function setPhoneNumberCount($phoneNumberCount)
  {
    $this->phoneNumberCount = $phoneNumberCount;
  }
  /**
   * @return int
   */
  public function getPhoneNumberCount()
  {
    return $this->phoneNumberCount;
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
   * @param int
   */
  public function setRelationshipMemoryCount($relationshipMemoryCount)
  {
    $this->relationshipMemoryCount = $relationshipMemoryCount;
  }
  /**
   * @return int
   */
  public function getRelationshipMemoryCount()
  {
    return $this->relationshipMemoryCount;
  }
  /**
   * @param AssistantLogsCommunicationPhoneLog
   */
  public function setSelectedPhone(AssistantLogsCommunicationPhoneLog $selectedPhone)
  {
    $this->selectedPhone = $selectedPhone;
  }
  /**
   * @return AssistantLogsCommunicationPhoneLog
   */
  public function getSelectedPhone()
  {
    return $this->selectedPhone;
  }
  /**
   * @param MajelContactInformationShortcutInformation
   */
  public function setShortcutContactInfo(MajelContactInformationShortcutInformation $shortcutContactInfo)
  {
    $this->shortcutContactInfo = $shortcutContactInfo;
  }
  /**
   * @return MajelContactInformationShortcutInformation
   */
  public function getShortcutContactInfo()
  {
    return $this->shortcutContactInfo;
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
  /**
   * @param int[]
   */
  public function setSystemContactGroupId($systemContactGroupId)
  {
    $this->systemContactGroupId = $systemContactGroupId;
  }
  /**
   * @return int[]
   */
  public function getSystemContactGroupId()
  {
    return $this->systemContactGroupId;
  }
  /**
   * @param int
   */
  public function setWhatsappPhoneNumberCount($whatsappPhoneNumberCount)
  {
    $this->whatsappPhoneNumberCount = $whatsappPhoneNumberCount;
  }
  /**
   * @return int
   */
  public function getWhatsappPhoneNumberCount()
  {
    return $this->whatsappPhoneNumberCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsCommunicationPersonalContactDataLog::class, 'Google_Service_Contentwarehouse_AssistantLogsCommunicationPersonalContactDataLog');
