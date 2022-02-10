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

namespace Google\Service\MyBusinessBusinessInformation;

class Location extends \Google\Collection
{
  protected $collection_key = 'serviceItems';
  protected $adWordsLocationExtensionsType = AdWordsLocationExtensions::class;
  protected $adWordsLocationExtensionsDataType = '';
  protected $categoriesType = Categories::class;
  protected $categoriesDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $languageCode;
  protected $latlngType = LatLng::class;
  protected $latlngDataType = '';
  protected $metadataType = Metadata::class;
  protected $metadataDataType = '';
  protected $moreHoursType = MoreHours::class;
  protected $moreHoursDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $openInfoType = OpenInfo::class;
  protected $openInfoDataType = '';
  protected $phoneNumbersType = PhoneNumbers::class;
  protected $phoneNumbersDataType = '';
  protected $profileType = Profile::class;
  protected $profileDataType = '';
  protected $regularHoursType = BusinessHours::class;
  protected $regularHoursDataType = '';
  protected $relationshipDataType = RelationshipData::class;
  protected $relationshipDataDataType = '';
  protected $serviceAreaType = ServiceAreaBusiness::class;
  protected $serviceAreaDataType = '';
  protected $serviceItemsType = ServiceItem::class;
  protected $serviceItemsDataType = 'array';
  protected $specialHoursType = SpecialHours::class;
  protected $specialHoursDataType = '';
  /**
   * @var string
   */
  public $storeCode;
  protected $storefrontAddressType = PostalAddress::class;
  protected $storefrontAddressDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $websiteUri;

  /**
   * @param AdWordsLocationExtensions
   */
  public function setAdWordsLocationExtensions(AdWordsLocationExtensions $adWordsLocationExtensions)
  {
    $this->adWordsLocationExtensions = $adWordsLocationExtensions;
  }
  /**
   * @return AdWordsLocationExtensions
   */
  public function getAdWordsLocationExtensions()
  {
    return $this->adWordsLocationExtensions;
  }
  /**
   * @param Categories
   */
  public function setCategories(Categories $categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Categories
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param LatLng
   */
  public function setLatlng(LatLng $latlng)
  {
    $this->latlng = $latlng;
  }
  /**
   * @return LatLng
   */
  public function getLatlng()
  {
    return $this->latlng;
  }
  /**
   * @param Metadata
   */
  public function setMetadata(Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param MoreHours[]
   */
  public function setMoreHours($moreHours)
  {
    $this->moreHours = $moreHours;
  }
  /**
   * @return MoreHours[]
   */
  public function getMoreHours()
  {
    return $this->moreHours;
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
   * @param OpenInfo
   */
  public function setOpenInfo(OpenInfo $openInfo)
  {
    $this->openInfo = $openInfo;
  }
  /**
   * @return OpenInfo
   */
  public function getOpenInfo()
  {
    return $this->openInfo;
  }
  /**
   * @param PhoneNumbers
   */
  public function setPhoneNumbers(PhoneNumbers $phoneNumbers)
  {
    $this->phoneNumbers = $phoneNumbers;
  }
  /**
   * @return PhoneNumbers
   */
  public function getPhoneNumbers()
  {
    return $this->phoneNumbers;
  }
  /**
   * @param Profile
   */
  public function setProfile(Profile $profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return Profile
   */
  public function getProfile()
  {
    return $this->profile;
  }
  /**
   * @param BusinessHours
   */
  public function setRegularHours(BusinessHours $regularHours)
  {
    $this->regularHours = $regularHours;
  }
  /**
   * @return BusinessHours
   */
  public function getRegularHours()
  {
    return $this->regularHours;
  }
  /**
   * @param RelationshipData
   */
  public function setRelationshipData(RelationshipData $relationshipData)
  {
    $this->relationshipData = $relationshipData;
  }
  /**
   * @return RelationshipData
   */
  public function getRelationshipData()
  {
    return $this->relationshipData;
  }
  /**
   * @param ServiceAreaBusiness
   */
  public function setServiceArea(ServiceAreaBusiness $serviceArea)
  {
    $this->serviceArea = $serviceArea;
  }
  /**
   * @return ServiceAreaBusiness
   */
  public function getServiceArea()
  {
    return $this->serviceArea;
  }
  /**
   * @param ServiceItem[]
   */
  public function setServiceItems($serviceItems)
  {
    $this->serviceItems = $serviceItems;
  }
  /**
   * @return ServiceItem[]
   */
  public function getServiceItems()
  {
    return $this->serviceItems;
  }
  /**
   * @param SpecialHours
   */
  public function setSpecialHours(SpecialHours $specialHours)
  {
    $this->specialHours = $specialHours;
  }
  /**
   * @return SpecialHours
   */
  public function getSpecialHours()
  {
    return $this->specialHours;
  }
  /**
   * @param string
   */
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  /**
   * @return string
   */
  public function getStoreCode()
  {
    return $this->storeCode;
  }
  /**
   * @param PostalAddress
   */
  public function setStorefrontAddress(PostalAddress $storefrontAddress)
  {
    $this->storefrontAddress = $storefrontAddress;
  }
  /**
   * @return PostalAddress
   */
  public function getStorefrontAddress()
  {
    return $this->storefrontAddress;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setWebsiteUri($websiteUri)
  {
    $this->websiteUri = $websiteUri;
  }
  /**
   * @return string
   */
  public function getWebsiteUri()
  {
    return $this->websiteUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Location::class, 'Google_Service_MyBusinessBusinessInformation_Location');
