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

class AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo extends \Google\Collection
{
  protected $collection_key = 'appContactData';
  /**
   * @var string
   */
  public $accountName;
  /**
   * @var string
   */
  public $accountType;
  protected $appContactDataType = SocialGraphApiAppContactData::class;
  protected $appContactDataDataType = 'array';
  protected $appInfoType = AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo::class;
  protected $appInfoDataType = '';
  /**
   * @var bool
   */
  public $crossDeviceAllowed;
  protected $deviceContactMetadataType = AppsPeopleOzExternalMergedpeopleapiDeviceContactExtraMetadata::class;
  protected $deviceContactMetadataDataType = '';
  /**
   * @var string
   */
  public $googleContactId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $photoType;
  /**
   * @var string
   */
  public $rawContactId;
  protected $rawDeviceContactAnalyticalInfoType = AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo::class;
  protected $rawDeviceContactAnalyticalInfoDataType = '';

  /**
   * @param string
   */
  public function setAccountName($accountName)
  {
    $this->accountName = $accountName;
  }
  /**
   * @return string
   */
  public function getAccountName()
  {
    return $this->accountName;
  }
  /**
   * @param string
   */
  public function setAccountType($accountType)
  {
    $this->accountType = $accountType;
  }
  /**
   * @return string
   */
  public function getAccountType()
  {
    return $this->accountType;
  }
  /**
   * @param SocialGraphApiAppContactData[]
   */
  public function setAppContactData($appContactData)
  {
    $this->appContactData = $appContactData;
  }
  /**
   * @return SocialGraphApiAppContactData[]
   */
  public function getAppContactData()
  {
    return $this->appContactData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo
   */
  public function setAppInfo(AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo $appInfo)
  {
    $this->appInfo = $appInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo
   */
  public function getAppInfo()
  {
    return $this->appInfo;
  }
  /**
   * @param bool
   */
  public function setCrossDeviceAllowed($crossDeviceAllowed)
  {
    $this->crossDeviceAllowed = $crossDeviceAllowed;
  }
  /**
   * @return bool
   */
  public function getCrossDeviceAllowed()
  {
    return $this->crossDeviceAllowed;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiDeviceContactExtraMetadata
   */
  public function setDeviceContactMetadata(AppsPeopleOzExternalMergedpeopleapiDeviceContactExtraMetadata $deviceContactMetadata)
  {
    $this->deviceContactMetadata = $deviceContactMetadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiDeviceContactExtraMetadata
   */
  public function getDeviceContactMetadata()
  {
    return $this->deviceContactMetadata;
  }
  /**
   * @param string
   */
  public function setGoogleContactId($googleContactId)
  {
    $this->googleContactId = $googleContactId;
  }
  /**
   * @return string
   */
  public function getGoogleContactId()
  {
    return $this->googleContactId;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setPhotoType($photoType)
  {
    $this->photoType = $photoType;
  }
  /**
   * @return string
   */
  public function getPhotoType()
  {
    return $this->photoType;
  }
  /**
   * @param string
   */
  public function setRawContactId($rawContactId)
  {
    $this->rawContactId = $rawContactId;
  }
  /**
   * @return string
   */
  public function getRawContactId()
  {
    return $this->rawContactId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo
   */
  public function setRawDeviceContactAnalyticalInfo(AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo $rawDeviceContactAnalyticalInfo)
  {
    $this->rawDeviceContactAnalyticalInfo = $rawDeviceContactAnalyticalInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo
   */
  public function getRawDeviceContactAnalyticalInfo()
  {
    return $this->rawDeviceContactAnalyticalInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo');
