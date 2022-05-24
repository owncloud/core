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

namespace Google\Service\Books;

class VolumeUserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $acquiredTime;
  /**
   * @var int
   */
  public $acquisitionType;
  protected $copyType = VolumeUserInfoCopy::class;
  protected $copyDataType = '';
  /**
   * @var int
   */
  public $entitlementType;
  protected $familySharingType = VolumeUserInfoFamilySharing::class;
  protected $familySharingDataType = '';
  /**
   * @var bool
   */
  public $isFamilySharedFromUser;
  /**
   * @var bool
   */
  public $isFamilySharedToUser;
  /**
   * @var bool
   */
  public $isFamilySharingAllowed;
  /**
   * @var bool
   */
  public $isFamilySharingDisabledByFop;
  /**
   * @var bool
   */
  public $isInMyBooks;
  /**
   * @var bool
   */
  public $isPreordered;
  /**
   * @var bool
   */
  public $isPurchased;
  /**
   * @var bool
   */
  public $isUploaded;
  protected $readingPositionType = ReadingPosition::class;
  protected $readingPositionDataType = '';
  protected $rentalPeriodType = VolumeUserInfoRentalPeriod::class;
  protected $rentalPeriodDataType = '';
  /**
   * @var string
   */
  public $rentalState;
  protected $reviewType = Review::class;
  protected $reviewDataType = '';
  /**
   * @var string
   */
  public $updated;
  protected $userUploadedVolumeInfoType = VolumeUserInfoUserUploadedVolumeInfo::class;
  protected $userUploadedVolumeInfoDataType = '';

  /**
   * @param string
   */
  public function setAcquiredTime($acquiredTime)
  {
    $this->acquiredTime = $acquiredTime;
  }
  /**
   * @return string
   */
  public function getAcquiredTime()
  {
    return $this->acquiredTime;
  }
  /**
   * @param int
   */
  public function setAcquisitionType($acquisitionType)
  {
    $this->acquisitionType = $acquisitionType;
  }
  /**
   * @return int
   */
  public function getAcquisitionType()
  {
    return $this->acquisitionType;
  }
  /**
   * @param VolumeUserInfoCopy
   */
  public function setCopy(VolumeUserInfoCopy $copy)
  {
    $this->copy = $copy;
  }
  /**
   * @return VolumeUserInfoCopy
   */
  public function getCopy()
  {
    return $this->copy;
  }
  /**
   * @param int
   */
  public function setEntitlementType($entitlementType)
  {
    $this->entitlementType = $entitlementType;
  }
  /**
   * @return int
   */
  public function getEntitlementType()
  {
    return $this->entitlementType;
  }
  /**
   * @param VolumeUserInfoFamilySharing
   */
  public function setFamilySharing(VolumeUserInfoFamilySharing $familySharing)
  {
    $this->familySharing = $familySharing;
  }
  /**
   * @return VolumeUserInfoFamilySharing
   */
  public function getFamilySharing()
  {
    return $this->familySharing;
  }
  /**
   * @param bool
   */
  public function setIsFamilySharedFromUser($isFamilySharedFromUser)
  {
    $this->isFamilySharedFromUser = $isFamilySharedFromUser;
  }
  /**
   * @return bool
   */
  public function getIsFamilySharedFromUser()
  {
    return $this->isFamilySharedFromUser;
  }
  /**
   * @param bool
   */
  public function setIsFamilySharedToUser($isFamilySharedToUser)
  {
    $this->isFamilySharedToUser = $isFamilySharedToUser;
  }
  /**
   * @return bool
   */
  public function getIsFamilySharedToUser()
  {
    return $this->isFamilySharedToUser;
  }
  /**
   * @param bool
   */
  public function setIsFamilySharingAllowed($isFamilySharingAllowed)
  {
    $this->isFamilySharingAllowed = $isFamilySharingAllowed;
  }
  /**
   * @return bool
   */
  public function getIsFamilySharingAllowed()
  {
    return $this->isFamilySharingAllowed;
  }
  /**
   * @param bool
   */
  public function setIsFamilySharingDisabledByFop($isFamilySharingDisabledByFop)
  {
    $this->isFamilySharingDisabledByFop = $isFamilySharingDisabledByFop;
  }
  /**
   * @return bool
   */
  public function getIsFamilySharingDisabledByFop()
  {
    return $this->isFamilySharingDisabledByFop;
  }
  /**
   * @param bool
   */
  public function setIsInMyBooks($isInMyBooks)
  {
    $this->isInMyBooks = $isInMyBooks;
  }
  /**
   * @return bool
   */
  public function getIsInMyBooks()
  {
    return $this->isInMyBooks;
  }
  /**
   * @param bool
   */
  public function setIsPreordered($isPreordered)
  {
    $this->isPreordered = $isPreordered;
  }
  /**
   * @return bool
   */
  public function getIsPreordered()
  {
    return $this->isPreordered;
  }
  /**
   * @param bool
   */
  public function setIsPurchased($isPurchased)
  {
    $this->isPurchased = $isPurchased;
  }
  /**
   * @return bool
   */
  public function getIsPurchased()
  {
    return $this->isPurchased;
  }
  /**
   * @param bool
   */
  public function setIsUploaded($isUploaded)
  {
    $this->isUploaded = $isUploaded;
  }
  /**
   * @return bool
   */
  public function getIsUploaded()
  {
    return $this->isUploaded;
  }
  /**
   * @param ReadingPosition
   */
  public function setReadingPosition(ReadingPosition $readingPosition)
  {
    $this->readingPosition = $readingPosition;
  }
  /**
   * @return ReadingPosition
   */
  public function getReadingPosition()
  {
    return $this->readingPosition;
  }
  /**
   * @param VolumeUserInfoRentalPeriod
   */
  public function setRentalPeriod(VolumeUserInfoRentalPeriod $rentalPeriod)
  {
    $this->rentalPeriod = $rentalPeriod;
  }
  /**
   * @return VolumeUserInfoRentalPeriod
   */
  public function getRentalPeriod()
  {
    return $this->rentalPeriod;
  }
  /**
   * @param string
   */
  public function setRentalState($rentalState)
  {
    $this->rentalState = $rentalState;
  }
  /**
   * @return string
   */
  public function getRentalState()
  {
    return $this->rentalState;
  }
  /**
   * @param Review
   */
  public function setReview(Review $review)
  {
    $this->review = $review;
  }
  /**
   * @return Review
   */
  public function getReview()
  {
    return $this->review;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param VolumeUserInfoUserUploadedVolumeInfo
   */
  public function setUserUploadedVolumeInfo(VolumeUserInfoUserUploadedVolumeInfo $userUploadedVolumeInfo)
  {
    $this->userUploadedVolumeInfo = $userUploadedVolumeInfo;
  }
  /**
   * @return VolumeUserInfoUserUploadedVolumeInfo
   */
  public function getUserUploadedVolumeInfo()
  {
    return $this->userUploadedVolumeInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeUserInfo::class, 'Google_Service_Books_VolumeUserInfo');
