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

class AppsPeopleOzExternalMergedpeopleapiPerson extends \Google\Collection
{
  protected $collection_key = 'website';
  protected $aboutType = AppsPeopleOzExternalMergedpeopleapiAbout::class;
  protected $aboutDataType = 'array';
  protected $addressType = AppsPeopleOzExternalMergedpeopleapiAddress::class;
  protected $addressDataType = 'array';
  /**
   * @var string
   */
  public $ageRange;
  protected $ageRangeRepeatedType = AppsPeopleOzExternalMergedpeopleapiAgeRangeType::class;
  protected $ageRangeRepeatedDataType = 'array';
  protected $birthdayType = AppsPeopleOzExternalMergedpeopleapiBirthday::class;
  protected $birthdayDataType = 'array';
  protected $braggingRightsType = AppsPeopleOzExternalMergedpeopleapiBraggingRights::class;
  protected $braggingRightsDataType = 'array';
  protected $calendarType = AppsPeopleOzExternalMergedpeopleapiCalendar::class;
  protected $calendarDataType = 'array';
  protected $certifiedBornBeforeType = AppsPeopleOzExternalMergedpeopleapiCertifiedBornBefore::class;
  protected $certifiedBornBeforeDataType = 'array';
  protected $circleMembershipType = AppsPeopleOzExternalMergedpeopleapiCircleMembership::class;
  protected $circleMembershipDataType = 'array';
  protected $clientDataType = AppsPeopleOzExternalMergedpeopleapiClientData::class;
  protected $clientDataDataType = 'array';
  protected $communicationEmailType = AppsPeopleOzExternalMergedpeopleapiCommunicationEmail::class;
  protected $communicationEmailDataType = 'array';
  protected $contactGroupMembershipType = AppsPeopleOzExternalMergedpeopleapiContactGroupMembership::class;
  protected $contactGroupMembershipDataType = 'array';
  protected $contactStateInfoType = AppsPeopleOzExternalMergedpeopleapiContactStateInfo::class;
  protected $contactStateInfoDataType = 'array';
  protected $coverPhotoType = AppsPeopleOzExternalMergedpeopleapiCoverPhoto::class;
  protected $coverPhotoDataType = 'array';
  protected $customSchemaFieldType = AppsPeopleOzExternalMergedpeopleapiCustomSchemaField::class;
  protected $customSchemaFieldDataType = 'array';
  protected $emailType = AppsPeopleOzExternalMergedpeopleapiEmail::class;
  protected $emailDataType = 'array';
  protected $emergencyInfoType = AppsPeopleOzExternalMergedpeopleapiEmergencyInfo::class;
  protected $emergencyInfoDataType = 'array';
  protected $eventType = AppsPeopleOzExternalMergedpeopleapiEvent::class;
  protected $eventDataType = 'array';
  protected $extendedDataType = AppsPeopleOzExternalMergedpeopleapiPersonExtendedData::class;
  protected $extendedDataDataType = '';
  protected $externalIdType = AppsPeopleOzExternalMergedpeopleapiExternalId::class;
  protected $externalIdDataType = 'array';
  protected $fileAsType = AppsPeopleOzExternalMergedpeopleapiFileAs::class;
  protected $fileAsDataType = 'array';
  /**
   * @var string
   */
  public $fingerprint;
  protected $genderType = AppsPeopleOzExternalMergedpeopleapiGender::class;
  protected $genderDataType = 'array';
  protected $imType = AppsPeopleOzExternalMergedpeopleapiIm::class;
  protected $imDataType = 'array';
  protected $inAppNotificationTargetType = AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget::class;
  protected $inAppNotificationTargetDataType = 'array';
  protected $inAppReachabilityType = AppsPeopleOzExternalMergedpeopleapiInAppReachability::class;
  protected $inAppReachabilityDataType = 'array';
  protected $interactionSettingsType = AppsPeopleOzExternalMergedpeopleapiInteractionSettings::class;
  protected $interactionSettingsDataType = 'array';
  protected $interestType = AppsPeopleOzExternalMergedpeopleapiInterest::class;
  protected $interestDataType = 'array';
  protected $languageType = AppsPeopleOzExternalMergedpeopleapiLanguage::class;
  protected $languageDataType = 'array';
  protected $legacyFieldsType = AppsPeopleOzExternalMergedpeopleapiLegacyFields::class;
  protected $legacyFieldsDataType = '';
  protected $limitedProfileSettingsType = AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField::class;
  protected $limitedProfileSettingsDataType = 'array';
  protected $linkedPersonType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $linkedPersonDataType = 'array';
  protected $locationType = AppsPeopleOzExternalMergedpeopleapiLocation::class;
  protected $locationDataType = 'array';
  protected $managementUpchainType = AppsPeopleOzExternalMergedpeopleapiManagementUpchain::class;
  protected $managementUpchainDataType = 'array';
  protected $mapsProfileType = AppsPeopleOzExternalMergedpeopleapiMapsProfile::class;
  protected $mapsProfileDataType = 'array';
  protected $membershipType = AppsPeopleOzExternalMergedpeopleapiMembership::class;
  protected $membershipDataType = 'array';
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonMetadata::class;
  protected $metadataDataType = '';
  protected $missionType = AppsPeopleOzExternalMergedpeopleapiMission::class;
  protected $missionDataType = 'array';
  protected $nameType = AppsPeopleOzExternalMergedpeopleapiName::class;
  protected $nameDataType = 'array';
  protected $nicknameType = AppsPeopleOzExternalMergedpeopleapiNickname::class;
  protected $nicknameDataType = 'array';
  protected $occupationType = AppsPeopleOzExternalMergedpeopleapiOccupation::class;
  protected $occupationDataType = 'array';
  protected $organizationType = AppsPeopleOzExternalMergedpeopleapiOrganization::class;
  protected $organizationDataType = 'array';
  protected $otherKeywordType = AppsPeopleOzExternalMergedpeopleapiOtherKeyword::class;
  protected $otherKeywordDataType = 'array';
  protected $peopleInCommonType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $peopleInCommonDataType = 'array';
  protected $personAttributeType = AppsPeopleOzExternalMergedpeopleapiPersonAttribute::class;
  protected $personAttributeDataType = 'array';
  /**
   * @var string
   */
  public $personId;
  protected $phoneType = AppsPeopleOzExternalMergedpeopleapiPhone::class;
  protected $phoneDataType = 'array';
  protected $photoType = AppsPeopleOzExternalMergedpeopleapiPhoto::class;
  protected $photoDataType = 'array';
  protected $placeDetailsType = AppsPeopleOzExternalMergedpeopleapiPlaceDetails::class;
  protected $placeDetailsDataType = 'array';
  protected $plusPageInfoType = AppsPeopleOzExternalMergedpeopleapiPlusPageInfo::class;
  protected $plusPageInfoDataType = 'array';
  protected $posixAccountType = AppsPeopleOzExternalMergedpeopleapiPosixAccount::class;
  protected $posixAccountDataType = 'array';
  /**
   * @var string
   */
  public $profileUrl;
  protected $profileUrlRepeatedType = AppsPeopleOzExternalMergedpeopleapiProfileUrl::class;
  protected $profileUrlRepeatedDataType = 'array';
  protected $pronounType = AppsPeopleOzExternalMergedpeopleapiPronoun::class;
  protected $pronounDataType = 'array';
  protected $readOnlyProfileInfoType = AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo::class;
  protected $readOnlyProfileInfoDataType = 'array';
  protected $relationType = AppsPeopleOzExternalMergedpeopleapiRelation::class;
  protected $relationDataType = 'array';
  protected $relationshipInterestType = AppsPeopleOzExternalMergedpeopleapiRelationshipInterest::class;
  protected $relationshipInterestDataType = 'array';
  protected $relationshipStatusType = AppsPeopleOzExternalMergedpeopleapiRelationshipStatus::class;
  protected $relationshipStatusDataType = 'array';
  protected $rightOfPublicityStateType = AppsPeopleOzExternalMergedpeopleapiRightOfPublicityState::class;
  protected $rightOfPublicityStateDataType = 'array';
  protected $rosterDetailsType = AppsPeopleOzExternalMergedpeopleapiRosterDetails::class;
  protected $rosterDetailsDataType = 'array';
  protected $searchProfileType = AppsPeopleOzExternalMergedpeopleapiSearchProfile::class;
  protected $searchProfileDataType = 'array';
  protected $sipAddressType = AppsPeopleOzExternalMergedpeopleapiSipAddress::class;
  protected $sipAddressDataType = 'array';
  protected $skillsType = AppsPeopleOzExternalMergedpeopleapiSkills::class;
  protected $skillsDataType = 'array';
  protected $socialConnectionType = AppsPeopleOzExternalMergedpeopleapiSocialConnection::class;
  protected $socialConnectionDataType = 'array';
  protected $sortKeysType = AppsPeopleOzExternalMergedpeopleapiSortKeys::class;
  protected $sortKeysDataType = '';
  protected $sshPublicKeyType = AppsPeopleOzExternalMergedpeopleapiSshPublicKey::class;
  protected $sshPublicKeyDataType = 'array';
  protected $taglineType = AppsPeopleOzExternalMergedpeopleapiTagline::class;
  protected $taglineDataType = 'array';
  protected $teamsExtendedDataType = AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData::class;
  protected $teamsExtendedDataDataType = '';
  protected $userDefinedType = AppsPeopleOzExternalMergedpeopleapiUserDefined::class;
  protected $userDefinedDataType = 'array';
  protected $visibleToGuestsType = AppsPeopleOzExternalMergedpeopleapiVisibleToGuests::class;
  protected $visibleToGuestsDataType = 'array';
  protected $websiteType = AppsPeopleOzExternalMergedpeopleapiWebsite::class;
  protected $websiteDataType = 'array';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAbout[]
   */
  public function setAbout($about)
  {
    $this->about = $about;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAbout[]
   */
  public function getAbout()
  {
    return $this->about;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAddress[]
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAddress[]
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param string
   */
  public function setAgeRange($ageRange)
  {
    $this->ageRange = $ageRange;
  }
  /**
   * @return string
   */
  public function getAgeRange()
  {
    return $this->ageRange;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAgeRangeType[]
   */
  public function setAgeRangeRepeated($ageRangeRepeated)
  {
    $this->ageRangeRepeated = $ageRangeRepeated;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAgeRangeType[]
   */
  public function getAgeRangeRepeated()
  {
    return $this->ageRangeRepeated;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiBirthday[]
   */
  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiBirthday[]
   */
  public function getBirthday()
  {
    return $this->birthday;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiBraggingRights[]
   */
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiBraggingRights[]
   */
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCalendar[]
   */
  public function setCalendar($calendar)
  {
    $this->calendar = $calendar;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCalendar[]
   */
  public function getCalendar()
  {
    return $this->calendar;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCertifiedBornBefore[]
   */
  public function setCertifiedBornBefore($certifiedBornBefore)
  {
    $this->certifiedBornBefore = $certifiedBornBefore;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCertifiedBornBefore[]
   */
  public function getCertifiedBornBefore()
  {
    return $this->certifiedBornBefore;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCircleMembership[]
   */
  public function setCircleMembership($circleMembership)
  {
    $this->circleMembership = $circleMembership;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCircleMembership[]
   */
  public function getCircleMembership()
  {
    return $this->circleMembership;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiClientData[]
   */
  public function setClientData($clientData)
  {
    $this->clientData = $clientData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiClientData[]
   */
  public function getClientData()
  {
    return $this->clientData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCommunicationEmail[]
   */
  public function setCommunicationEmail($communicationEmail)
  {
    $this->communicationEmail = $communicationEmail;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCommunicationEmail[]
   */
  public function getCommunicationEmail()
  {
    return $this->communicationEmail;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiContactGroupMembership[]
   */
  public function setContactGroupMembership($contactGroupMembership)
  {
    $this->contactGroupMembership = $contactGroupMembership;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiContactGroupMembership[]
   */
  public function getContactGroupMembership()
  {
    return $this->contactGroupMembership;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiContactStateInfo[]
   */
  public function setContactStateInfo($contactStateInfo)
  {
    $this->contactStateInfo = $contactStateInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiContactStateInfo[]
   */
  public function getContactStateInfo()
  {
    return $this->contactStateInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCoverPhoto[]
   */
  public function setCoverPhoto($coverPhoto)
  {
    $this->coverPhoto = $coverPhoto;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCoverPhoto[]
   */
  public function getCoverPhoto()
  {
    return $this->coverPhoto;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiCustomSchemaField[]
   */
  public function setCustomSchemaField($customSchemaField)
  {
    $this->customSchemaField = $customSchemaField;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCustomSchemaField[]
   */
  public function getCustomSchemaField()
  {
    return $this->customSchemaField;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmail[]
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmail[]
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEmergencyInfo[]
   */
  public function setEmergencyInfo($emergencyInfo)
  {
    $this->emergencyInfo = $emergencyInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEmergencyInfo[]
   */
  public function getEmergencyInfo()
  {
    return $this->emergencyInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEvent[]
   */
  public function setEvent($event)
  {
    $this->event = $event;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEvent[]
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonExtendedData
   */
  public function setExtendedData(AppsPeopleOzExternalMergedpeopleapiPersonExtendedData $extendedData)
  {
    $this->extendedData = $extendedData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonExtendedData
   */
  public function getExtendedData()
  {
    return $this->extendedData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiExternalId[]
   */
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiExternalId[]
   */
  public function getExternalId()
  {
    return $this->externalId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFileAs[]
   */
  public function setFileAs($fileAs)
  {
    $this->fileAs = $fileAs;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFileAs[]
   */
  public function getFileAs()
  {
    return $this->fileAs;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiGender[]
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiGender[]
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiIm[]
   */
  public function setIm($im)
  {
    $this->im = $im;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiIm[]
   */
  public function getIm()
  {
    return $this->im;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget[]
   */
  public function setInAppNotificationTarget($inAppNotificationTarget)
  {
    $this->inAppNotificationTarget = $inAppNotificationTarget;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget[]
   */
  public function getInAppNotificationTarget()
  {
    return $this->inAppNotificationTarget;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInAppReachability[]
   */
  public function setInAppReachability($inAppReachability)
  {
    $this->inAppReachability = $inAppReachability;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInAppReachability[]
   */
  public function getInAppReachability()
  {
    return $this->inAppReachability;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInteractionSettings[]
   */
  public function setInteractionSettings($interactionSettings)
  {
    $this->interactionSettings = $interactionSettings;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInteractionSettings[]
   */
  public function getInteractionSettings()
  {
    return $this->interactionSettings;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInterest[]
   */
  public function setInterest($interest)
  {
    $this->interest = $interest;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInterest[]
   */
  public function getInterest()
  {
    return $this->interest;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiLanguage[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiLanguage[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiLegacyFields
   */
  public function setLegacyFields(AppsPeopleOzExternalMergedpeopleapiLegacyFields $legacyFields)
  {
    $this->legacyFields = $legacyFields;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiLegacyFields
   */
  public function getLegacyFields()
  {
    return $this->legacyFields;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField[]
   */
  public function setLimitedProfileSettings($limitedProfileSettings)
  {
    $this->limitedProfileSettings = $limitedProfileSettings;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField[]
   */
  public function getLimitedProfileSettings()
  {
    return $this->limitedProfileSettings;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setLinkedPerson($linkedPerson)
  {
    $this->linkedPerson = $linkedPerson;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getLinkedPerson()
  {
    return $this->linkedPerson;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiLocation[]
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiLocation[]
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiManagementUpchain[]
   */
  public function setManagementUpchain($managementUpchain)
  {
    $this->managementUpchain = $managementUpchain;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiManagementUpchain[]
   */
  public function getManagementUpchain()
  {
    return $this->managementUpchain;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiMapsProfile[]
   */
  public function setMapsProfile($mapsProfile)
  {
    $this->mapsProfile = $mapsProfile;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiMapsProfile[]
   */
  public function getMapsProfile()
  {
    return $this->mapsProfile;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiMembership[]
   */
  public function setMembership($membership)
  {
    $this->membership = $membership;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiMembership[]
   */
  public function getMembership()
  {
    return $this->membership;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiMission[]
   */
  public function setMission($mission)
  {
    $this->mission = $mission;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiMission[]
   */
  public function getMission()
  {
    return $this->mission;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiName[]
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiName[]
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiNickname[]
   */
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiNickname[]
   */
  public function getNickname()
  {
    return $this->nickname;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiOccupation[]
   */
  public function setOccupation($occupation)
  {
    $this->occupation = $occupation;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOccupation[]
   */
  public function getOccupation()
  {
    return $this->occupation;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiOrganization[]
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOrganization[]
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiOtherKeyword[]
   */
  public function setOtherKeyword($otherKeyword)
  {
    $this->otherKeyword = $otherKeyword;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOtherKeyword[]
   */
  public function getOtherKeyword()
  {
    return $this->otherKeyword;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setPeopleInCommon($peopleInCommon)
  {
    $this->peopleInCommon = $peopleInCommon;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getPeopleInCommon()
  {
    return $this->peopleInCommon;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonAttribute[]
   */
  public function setPersonAttribute($personAttribute)
  {
    $this->personAttribute = $personAttribute;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonAttribute[]
   */
  public function getPersonAttribute()
  {
    return $this->personAttribute;
  }
  /**
   * @param string
   */
  public function setPersonId($personId)
  {
    $this->personId = $personId;
  }
  /**
   * @return string
   */
  public function getPersonId()
  {
    return $this->personId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPhone[]
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPhone[]
   */
  public function getPhone()
  {
    return $this->phone;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPhoto[]
   */
  public function setPhoto($photo)
  {
    $this->photo = $photo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPhoto[]
   */
  public function getPhoto()
  {
    return $this->photo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPlaceDetails[]
   */
  public function setPlaceDetails($placeDetails)
  {
    $this->placeDetails = $placeDetails;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPlaceDetails[]
   */
  public function getPlaceDetails()
  {
    return $this->placeDetails;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPlusPageInfo[]
   */
  public function setPlusPageInfo($plusPageInfo)
  {
    $this->plusPageInfo = $plusPageInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPlusPageInfo[]
   */
  public function getPlusPageInfo()
  {
    return $this->plusPageInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPosixAccount[]
   */
  public function setPosixAccount($posixAccount)
  {
    $this->posixAccount = $posixAccount;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPosixAccount[]
   */
  public function getPosixAccount()
  {
    return $this->posixAccount;
  }
  /**
   * @param string
   */
  public function setProfileUrl($profileUrl)
  {
    $this->profileUrl = $profileUrl;
  }
  /**
   * @return string
   */
  public function getProfileUrl()
  {
    return $this->profileUrl;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiProfileUrl[]
   */
  public function setProfileUrlRepeated($profileUrlRepeated)
  {
    $this->profileUrlRepeated = $profileUrlRepeated;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiProfileUrl[]
   */
  public function getProfileUrlRepeated()
  {
    return $this->profileUrlRepeated;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPronoun[]
   */
  public function setPronoun($pronoun)
  {
    $this->pronoun = $pronoun;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPronoun[]
   */
  public function getPronoun()
  {
    return $this->pronoun;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo[]
   */
  public function setReadOnlyProfileInfo($readOnlyProfileInfo)
  {
    $this->readOnlyProfileInfo = $readOnlyProfileInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo[]
   */
  public function getReadOnlyProfileInfo()
  {
    return $this->readOnlyProfileInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRelation[]
   */
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRelation[]
   */
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRelationshipInterest[]
   */
  public function setRelationshipInterest($relationshipInterest)
  {
    $this->relationshipInterest = $relationshipInterest;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRelationshipInterest[]
   */
  public function getRelationshipInterest()
  {
    return $this->relationshipInterest;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRelationshipStatus[]
   */
  public function setRelationshipStatus($relationshipStatus)
  {
    $this->relationshipStatus = $relationshipStatus;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRelationshipStatus[]
   */
  public function getRelationshipStatus()
  {
    return $this->relationshipStatus;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRightOfPublicityState[]
   */
  public function setRightOfPublicityState($rightOfPublicityState)
  {
    $this->rightOfPublicityState = $rightOfPublicityState;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRightOfPublicityState[]
   */
  public function getRightOfPublicityState()
  {
    return $this->rightOfPublicityState;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRosterDetails[]
   */
  public function setRosterDetails($rosterDetails)
  {
    $this->rosterDetails = $rosterDetails;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRosterDetails[]
   */
  public function getRosterDetails()
  {
    return $this->rosterDetails;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSearchProfile[]
   */
  public function setSearchProfile($searchProfile)
  {
    $this->searchProfile = $searchProfile;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSearchProfile[]
   */
  public function getSearchProfile()
  {
    return $this->searchProfile;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSipAddress[]
   */
  public function setSipAddress($sipAddress)
  {
    $this->sipAddress = $sipAddress;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSipAddress[]
   */
  public function getSipAddress()
  {
    return $this->sipAddress;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSkills[]
   */
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSkills[]
   */
  public function getSkills()
  {
    return $this->skills;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSocialConnection[]
   */
  public function setSocialConnection($socialConnection)
  {
    $this->socialConnection = $socialConnection;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSocialConnection[]
   */
  public function getSocialConnection()
  {
    return $this->socialConnection;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSortKeys
   */
  public function setSortKeys(AppsPeopleOzExternalMergedpeopleapiSortKeys $sortKeys)
  {
    $this->sortKeys = $sortKeys;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSortKeys
   */
  public function getSortKeys()
  {
    return $this->sortKeys;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSshPublicKey[]
   */
  public function setSshPublicKey($sshPublicKey)
  {
    $this->sshPublicKey = $sshPublicKey;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSshPublicKey[]
   */
  public function getSshPublicKey()
  {
    return $this->sshPublicKey;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiTagline[]
   */
  public function setTagline($tagline)
  {
    $this->tagline = $tagline;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiTagline[]
   */
  public function getTagline()
  {
    return $this->tagline;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData
   */
  public function setTeamsExtendedData(AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData $teamsExtendedData)
  {
    $this->teamsExtendedData = $teamsExtendedData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData
   */
  public function getTeamsExtendedData()
  {
    return $this->teamsExtendedData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiUserDefined[]
   */
  public function setUserDefined($userDefined)
  {
    $this->userDefined = $userDefined;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiUserDefined[]
   */
  public function getUserDefined()
  {
    return $this->userDefined;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiVisibleToGuests[]
   */
  public function setVisibleToGuests($visibleToGuests)
  {
    $this->visibleToGuests = $visibleToGuests;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiVisibleToGuests[]
   */
  public function getVisibleToGuests()
  {
    return $this->visibleToGuests;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiWebsite[]
   */
  public function setWebsite($website)
  {
    $this->website = $website;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiWebsite[]
   */
  public function getWebsite()
  {
    return $this->website;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPerson::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPerson');
