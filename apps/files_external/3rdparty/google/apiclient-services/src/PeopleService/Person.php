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

namespace Google\Service\PeopleService;

class Person extends \Google\Collection
{
  protected $collection_key = 'userDefined';
  protected $addressesType = Address::class;
  protected $addressesDataType = 'array';
  /**
   * @var string
   */
  public $ageRange;
  protected $ageRangesType = AgeRangeType::class;
  protected $ageRangesDataType = 'array';
  protected $biographiesType = Biography::class;
  protected $biographiesDataType = 'array';
  protected $birthdaysType = Birthday::class;
  protected $birthdaysDataType = 'array';
  protected $braggingRightsType = BraggingRights::class;
  protected $braggingRightsDataType = 'array';
  protected $calendarUrlsType = CalendarUrl::class;
  protected $calendarUrlsDataType = 'array';
  protected $clientDataType = ClientData::class;
  protected $clientDataDataType = 'array';
  protected $coverPhotosType = CoverPhoto::class;
  protected $coverPhotosDataType = 'array';
  protected $emailAddressesType = EmailAddress::class;
  protected $emailAddressesDataType = 'array';
  /**
   * @var string
   */
  public $etag;
  protected $eventsType = Event::class;
  protected $eventsDataType = 'array';
  protected $externalIdsType = ExternalId::class;
  protected $externalIdsDataType = 'array';
  protected $fileAsesType = FileAs::class;
  protected $fileAsesDataType = 'array';
  protected $gendersType = Gender::class;
  protected $gendersDataType = 'array';
  protected $imClientsType = ImClient::class;
  protected $imClientsDataType = 'array';
  protected $interestsType = Interest::class;
  protected $interestsDataType = 'array';
  protected $localesType = Locale::class;
  protected $localesDataType = 'array';
  protected $locationsType = Location::class;
  protected $locationsDataType = 'array';
  protected $membershipsType = Membership::class;
  protected $membershipsDataType = 'array';
  protected $metadataType = PersonMetadata::class;
  protected $metadataDataType = '';
  protected $miscKeywordsType = MiscKeyword::class;
  protected $miscKeywordsDataType = 'array';
  protected $namesType = Name::class;
  protected $namesDataType = 'array';
  protected $nicknamesType = Nickname::class;
  protected $nicknamesDataType = 'array';
  protected $occupationsType = Occupation::class;
  protected $occupationsDataType = 'array';
  protected $organizationsType = Organization::class;
  protected $organizationsDataType = 'array';
  protected $phoneNumbersType = PhoneNumber::class;
  protected $phoneNumbersDataType = 'array';
  protected $photosType = Photo::class;
  protected $photosDataType = 'array';
  protected $relationsType = Relation::class;
  protected $relationsDataType = 'array';
  protected $relationshipInterestsType = RelationshipInterest::class;
  protected $relationshipInterestsDataType = 'array';
  protected $relationshipStatusesType = RelationshipStatus::class;
  protected $relationshipStatusesDataType = 'array';
  protected $residencesType = Residence::class;
  protected $residencesDataType = 'array';
  /**
   * @var string
   */
  public $resourceName;
  protected $sipAddressesType = SipAddress::class;
  protected $sipAddressesDataType = 'array';
  protected $skillsType = Skill::class;
  protected $skillsDataType = 'array';
  protected $taglinesType = Tagline::class;
  protected $taglinesDataType = 'array';
  protected $urlsType = Url::class;
  protected $urlsDataType = 'array';
  protected $userDefinedType = UserDefined::class;
  protected $userDefinedDataType = 'array';

  /**
   * @param Address[]
   */
  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  /**
   * @return Address[]
   */
  public function getAddresses()
  {
    return $this->addresses;
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
   * @param AgeRangeType[]
   */
  public function setAgeRanges($ageRanges)
  {
    $this->ageRanges = $ageRanges;
  }
  /**
   * @return AgeRangeType[]
   */
  public function getAgeRanges()
  {
    return $this->ageRanges;
  }
  /**
   * @param Biography[]
   */
  public function setBiographies($biographies)
  {
    $this->biographies = $biographies;
  }
  /**
   * @return Biography[]
   */
  public function getBiographies()
  {
    return $this->biographies;
  }
  /**
   * @param Birthday[]
   */
  public function setBirthdays($birthdays)
  {
    $this->birthdays = $birthdays;
  }
  /**
   * @return Birthday[]
   */
  public function getBirthdays()
  {
    return $this->birthdays;
  }
  /**
   * @param BraggingRights[]
   */
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  /**
   * @return BraggingRights[]
   */
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  /**
   * @param CalendarUrl[]
   */
  public function setCalendarUrls($calendarUrls)
  {
    $this->calendarUrls = $calendarUrls;
  }
  /**
   * @return CalendarUrl[]
   */
  public function getCalendarUrls()
  {
    return $this->calendarUrls;
  }
  /**
   * @param ClientData[]
   */
  public function setClientData($clientData)
  {
    $this->clientData = $clientData;
  }
  /**
   * @return ClientData[]
   */
  public function getClientData()
  {
    return $this->clientData;
  }
  /**
   * @param CoverPhoto[]
   */
  public function setCoverPhotos($coverPhotos)
  {
    $this->coverPhotos = $coverPhotos;
  }
  /**
   * @return CoverPhoto[]
   */
  public function getCoverPhotos()
  {
    return $this->coverPhotos;
  }
  /**
   * @param EmailAddress[]
   */
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  /**
   * @return EmailAddress[]
   */
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Event[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return Event[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param ExternalId[]
   */
  public function setExternalIds($externalIds)
  {
    $this->externalIds = $externalIds;
  }
  /**
   * @return ExternalId[]
   */
  public function getExternalIds()
  {
    return $this->externalIds;
  }
  /**
   * @param FileAs[]
   */
  public function setFileAses($fileAses)
  {
    $this->fileAses = $fileAses;
  }
  /**
   * @return FileAs[]
   */
  public function getFileAses()
  {
    return $this->fileAses;
  }
  /**
   * @param Gender[]
   */
  public function setGenders($genders)
  {
    $this->genders = $genders;
  }
  /**
   * @return Gender[]
   */
  public function getGenders()
  {
    return $this->genders;
  }
  /**
   * @param ImClient[]
   */
  public function setImClients($imClients)
  {
    $this->imClients = $imClients;
  }
  /**
   * @return ImClient[]
   */
  public function getImClients()
  {
    return $this->imClients;
  }
  /**
   * @param Interest[]
   */
  public function setInterests($interests)
  {
    $this->interests = $interests;
  }
  /**
   * @return Interest[]
   */
  public function getInterests()
  {
    return $this->interests;
  }
  /**
   * @param Locale[]
   */
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  /**
   * @return Locale[]
   */
  public function getLocales()
  {
    return $this->locales;
  }
  /**
   * @param Location[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return Location[]
   */
  public function getLocations()
  {
    return $this->locations;
  }
  /**
   * @param Membership[]
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return Membership[]
   */
  public function getMemberships()
  {
    return $this->memberships;
  }
  /**
   * @param PersonMetadata
   */
  public function setMetadata(PersonMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return PersonMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param MiscKeyword[]
   */
  public function setMiscKeywords($miscKeywords)
  {
    $this->miscKeywords = $miscKeywords;
  }
  /**
   * @return MiscKeyword[]
   */
  public function getMiscKeywords()
  {
    return $this->miscKeywords;
  }
  /**
   * @param Name[]
   */
  public function setNames($names)
  {
    $this->names = $names;
  }
  /**
   * @return Name[]
   */
  public function getNames()
  {
    return $this->names;
  }
  /**
   * @param Nickname[]
   */
  public function setNicknames($nicknames)
  {
    $this->nicknames = $nicknames;
  }
  /**
   * @return Nickname[]
   */
  public function getNicknames()
  {
    return $this->nicknames;
  }
  /**
   * @param Occupation[]
   */
  public function setOccupations($occupations)
  {
    $this->occupations = $occupations;
  }
  /**
   * @return Occupation[]
   */
  public function getOccupations()
  {
    return $this->occupations;
  }
  /**
   * @param Organization[]
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return Organization[]
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
  /**
   * @param PhoneNumber[]
   */
  public function setPhoneNumbers($phoneNumbers)
  {
    $this->phoneNumbers = $phoneNumbers;
  }
  /**
   * @return PhoneNumber[]
   */
  public function getPhoneNumbers()
  {
    return $this->phoneNumbers;
  }
  /**
   * @param Photo[]
   */
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  /**
   * @return Photo[]
   */
  public function getPhotos()
  {
    return $this->photos;
  }
  /**
   * @param Relation[]
   */
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  /**
   * @return Relation[]
   */
  public function getRelations()
  {
    return $this->relations;
  }
  /**
   * @param RelationshipInterest[]
   */
  public function setRelationshipInterests($relationshipInterests)
  {
    $this->relationshipInterests = $relationshipInterests;
  }
  /**
   * @return RelationshipInterest[]
   */
  public function getRelationshipInterests()
  {
    return $this->relationshipInterests;
  }
  /**
   * @param RelationshipStatus[]
   */
  public function setRelationshipStatuses($relationshipStatuses)
  {
    $this->relationshipStatuses = $relationshipStatuses;
  }
  /**
   * @return RelationshipStatus[]
   */
  public function getRelationshipStatuses()
  {
    return $this->relationshipStatuses;
  }
  /**
   * @param Residence[]
   */
  public function setResidences($residences)
  {
    $this->residences = $residences;
  }
  /**
   * @return Residence[]
   */
  public function getResidences()
  {
    return $this->residences;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param SipAddress[]
   */
  public function setSipAddresses($sipAddresses)
  {
    $this->sipAddresses = $sipAddresses;
  }
  /**
   * @return SipAddress[]
   */
  public function getSipAddresses()
  {
    return $this->sipAddresses;
  }
  /**
   * @param Skill[]
   */
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  /**
   * @return Skill[]
   */
  public function getSkills()
  {
    return $this->skills;
  }
  /**
   * @param Tagline[]
   */
  public function setTaglines($taglines)
  {
    $this->taglines = $taglines;
  }
  /**
   * @return Tagline[]
   */
  public function getTaglines()
  {
    return $this->taglines;
  }
  /**
   * @param Url[]
   */
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return Url[]
   */
  public function getUrls()
  {
    return $this->urls;
  }
  /**
   * @param UserDefined[]
   */
  public function setUserDefined($userDefined)
  {
    $this->userDefined = $userDefined;
  }
  /**
   * @return UserDefined[]
   */
  public function getUserDefined()
  {
    return $this->userDefined;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Person::class, 'Google_Service_PeopleService_Person');
