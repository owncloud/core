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

class ImageExifIPTCMetadata extends \Google\Collection
{
  protected $collection_key = 'supplementalCategories';
  /**
   * @var string
   */
  public $acquireLicensePage;
  protected $artworkType = ImageExifIPTCMetadataArtwork::class;
  protected $artworkDataType = 'array';
  protected $contactinfoType = ImageExifIPTCMetadataContactInfo::class;
  protected $contactinfoDataType = '';
  /**
   * @var string
   */
  public $copyrightNotice;
  /**
   * @var string[]
   */
  public $creator;
  /**
   * @var string
   */
  public $creditLine;
  /**
   * @var string
   */
  public $dateCreated;
  /**
   * @var string
   */
  public $dateExpired;
  /**
   * @var string
   */
  public $dateReleased;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $event;
  /**
   * @var string
   */
  public $headline;
  /**
   * @var string
   */
  public $imageSupplier;
  /**
   * @var string
   */
  public $instructions;
  /**
   * @var string[]
   */
  public $keywords;
  /**
   * @var string
   */
  public $licenseUrl;
  protected $locationType = ImageExifIPTCMetadataLocation::class;
  protected $locationDataType = '';
  protected $locationCreatedType = ImageExifIPTCMetadataLocationInfo::class;
  protected $locationCreatedDataType = '';
  protected $locationShownType = ImageExifIPTCMetadataLocationInfo::class;
  protected $locationShownDataType = 'array';
  /**
   * @var string
   */
  public $modelReleaseStatus;
  /**
   * @var string
   */
  public $propertyReleaseStatus;
  /**
   * @var string
   */
  public $rightsUsageTerms;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string[]
   */
  public $supplementalCategories;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setAcquireLicensePage($acquireLicensePage)
  {
    $this->acquireLicensePage = $acquireLicensePage;
  }
  /**
   * @return string
   */
  public function getAcquireLicensePage()
  {
    return $this->acquireLicensePage;
  }
  /**
   * @param ImageExifIPTCMetadataArtwork[]
   */
  public function setArtwork($artwork)
  {
    $this->artwork = $artwork;
  }
  /**
   * @return ImageExifIPTCMetadataArtwork[]
   */
  public function getArtwork()
  {
    return $this->artwork;
  }
  /**
   * @param ImageExifIPTCMetadataContactInfo
   */
  public function setContactinfo(ImageExifIPTCMetadataContactInfo $contactinfo)
  {
    $this->contactinfo = $contactinfo;
  }
  /**
   * @return ImageExifIPTCMetadataContactInfo
   */
  public function getContactinfo()
  {
    return $this->contactinfo;
  }
  /**
   * @param string
   */
  public function setCopyrightNotice($copyrightNotice)
  {
    $this->copyrightNotice = $copyrightNotice;
  }
  /**
   * @return string
   */
  public function getCopyrightNotice()
  {
    return $this->copyrightNotice;
  }
  /**
   * @param string[]
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string[]
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setCreditLine($creditLine)
  {
    $this->creditLine = $creditLine;
  }
  /**
   * @return string
   */
  public function getCreditLine()
  {
    return $this->creditLine;
  }
  /**
   * @param string
   */
  public function setDateCreated($dateCreated)
  {
    $this->dateCreated = $dateCreated;
  }
  /**
   * @return string
   */
  public function getDateCreated()
  {
    return $this->dateCreated;
  }
  /**
   * @param string
   */
  public function setDateExpired($dateExpired)
  {
    $this->dateExpired = $dateExpired;
  }
  /**
   * @return string
   */
  public function getDateExpired()
  {
    return $this->dateExpired;
  }
  /**
   * @param string
   */
  public function setDateReleased($dateReleased)
  {
    $this->dateReleased = $dateReleased;
  }
  /**
   * @return string
   */
  public function getDateReleased()
  {
    return $this->dateReleased;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEvent($event)
  {
    $this->event = $event;
  }
  /**
   * @return string
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param string
   */
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  /**
   * @return string
   */
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param string
   */
  public function setImageSupplier($imageSupplier)
  {
    $this->imageSupplier = $imageSupplier;
  }
  /**
   * @return string
   */
  public function getImageSupplier()
  {
    return $this->imageSupplier;
  }
  /**
   * @param string
   */
  public function setInstructions($instructions)
  {
    $this->instructions = $instructions;
  }
  /**
   * @return string
   */
  public function getInstructions()
  {
    return $this->instructions;
  }
  /**
   * @param string[]
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return string[]
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  /**
   * @param string
   */
  public function setLicenseUrl($licenseUrl)
  {
    $this->licenseUrl = $licenseUrl;
  }
  /**
   * @return string
   */
  public function getLicenseUrl()
  {
    return $this->licenseUrl;
  }
  /**
   * @param ImageExifIPTCMetadataLocation
   */
  public function setLocation(ImageExifIPTCMetadataLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return ImageExifIPTCMetadataLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param ImageExifIPTCMetadataLocationInfo
   */
  public function setLocationCreated(ImageExifIPTCMetadataLocationInfo $locationCreated)
  {
    $this->locationCreated = $locationCreated;
  }
  /**
   * @return ImageExifIPTCMetadataLocationInfo
   */
  public function getLocationCreated()
  {
    return $this->locationCreated;
  }
  /**
   * @param ImageExifIPTCMetadataLocationInfo[]
   */
  public function setLocationShown($locationShown)
  {
    $this->locationShown = $locationShown;
  }
  /**
   * @return ImageExifIPTCMetadataLocationInfo[]
   */
  public function getLocationShown()
  {
    return $this->locationShown;
  }
  /**
   * @param string
   */
  public function setModelReleaseStatus($modelReleaseStatus)
  {
    $this->modelReleaseStatus = $modelReleaseStatus;
  }
  /**
   * @return string
   */
  public function getModelReleaseStatus()
  {
    return $this->modelReleaseStatus;
  }
  /**
   * @param string
   */
  public function setPropertyReleaseStatus($propertyReleaseStatus)
  {
    $this->propertyReleaseStatus = $propertyReleaseStatus;
  }
  /**
   * @return string
   */
  public function getPropertyReleaseStatus()
  {
    return $this->propertyReleaseStatus;
  }
  /**
   * @param string
   */
  public function setRightsUsageTerms($rightsUsageTerms)
  {
    $this->rightsUsageTerms = $rightsUsageTerms;
  }
  /**
   * @return string
   */
  public function getRightsUsageTerms()
  {
    return $this->rightsUsageTerms;
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
   * @param string[]
   */
  public function setSupplementalCategories($supplementalCategories)
  {
    $this->supplementalCategories = $supplementalCategories;
  }
  /**
   * @return string[]
   */
  public function getSupplementalCategories()
  {
    return $this->supplementalCategories;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageExifIPTCMetadata::class, 'Google_Service_Contentwarehouse_ImageExifIPTCMetadata');
