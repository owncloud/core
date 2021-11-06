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
  public $acquiredTime;
  public $acquisitionType;
  protected $copyType = VolumeUserInfoCopy::class;
  protected $copyDataType = '';
  public $entitlementType;
  protected $familySharingType = VolumeUserInfoFamilySharing::class;
  protected $familySharingDataType = '';
  public $isFamilySharedFromUser;
  public $isFamilySharedToUser;
  public $isFamilySharingAllowed;
  public $isFamilySharingDisabledByFop;
  public $isInMyBooks;
  public $isPreordered;
  public $isPurchased;
  public $isUploaded;
  protected $readingPositionType = ReadingPosition::class;
  protected $readingPositionDataType = '';
  protected $rentalPeriodType = VolumeUserInfoRentalPeriod::class;
  protected $rentalPeriodDataType = '';
  public $rentalState;
  protected $reviewType = Review::class;
  protected $reviewDataType = '';
  public $updated;
  protected $userUploadedVolumeInfoType = VolumeUserInfoUserUploadedVolumeInfo::class;
  protected $userUploadedVolumeInfoDataType = '';

  public function setAcquiredTime($acquiredTime)
  {
    $this->acquiredTime = $acquiredTime;
  }
  public function getAcquiredTime()
  {
    return $this->acquiredTime;
  }
  public function setAcquisitionType($acquisitionType)
  {
    $this->acquisitionType = $acquisitionType;
  }
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
  public function setEntitlementType($entitlementType)
  {
    $this->entitlementType = $entitlementType;
  }
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
  public function setIsFamilySharedFromUser($isFamilySharedFromUser)
  {
    $this->isFamilySharedFromUser = $isFamilySharedFromUser;
  }
  public function getIsFamilySharedFromUser()
  {
    return $this->isFamilySharedFromUser;
  }
  public function setIsFamilySharedToUser($isFamilySharedToUser)
  {
    $this->isFamilySharedToUser = $isFamilySharedToUser;
  }
  public function getIsFamilySharedToUser()
  {
    return $this->isFamilySharedToUser;
  }
  public function setIsFamilySharingAllowed($isFamilySharingAllowed)
  {
    $this->isFamilySharingAllowed = $isFamilySharingAllowed;
  }
  public function getIsFamilySharingAllowed()
  {
    return $this->isFamilySharingAllowed;
  }
  public function setIsFamilySharingDisabledByFop($isFamilySharingDisabledByFop)
  {
    $this->isFamilySharingDisabledByFop = $isFamilySharingDisabledByFop;
  }
  public function getIsFamilySharingDisabledByFop()
  {
    return $this->isFamilySharingDisabledByFop;
  }
  public function setIsInMyBooks($isInMyBooks)
  {
    $this->isInMyBooks = $isInMyBooks;
  }
  public function getIsInMyBooks()
  {
    return $this->isInMyBooks;
  }
  public function setIsPreordered($isPreordered)
  {
    $this->isPreordered = $isPreordered;
  }
  public function getIsPreordered()
  {
    return $this->isPreordered;
  }
  public function setIsPurchased($isPurchased)
  {
    $this->isPurchased = $isPurchased;
  }
  public function getIsPurchased()
  {
    return $this->isPurchased;
  }
  public function setIsUploaded($isUploaded)
  {
    $this->isUploaded = $isUploaded;
  }
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
  public function setRentalState($rentalState)
  {
    $this->rentalState = $rentalState;
  }
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
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
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
