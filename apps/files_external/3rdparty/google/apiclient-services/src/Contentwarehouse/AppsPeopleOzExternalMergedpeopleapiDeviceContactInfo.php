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

class AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo extends \Google\Collection
{
  protected $collection_key = 'rawContactInfo';
  protected $deviceContactMetadataType = AppsPeopleOzExternalMergedpeopleapiDeviceContactExtraMetadata::class;
  protected $deviceContactMetadataDataType = '';
  /**
   * @var bool
   */
  public $hasCrossDeviceData;
  protected $idType = AppsPeopleOzExternalMergedpeopleapiDeviceContactId::class;
  protected $idDataType = '';
  /**
   * @var string
   */
  public $lastClientUpdateTime;
  /**
   * @var string
   */
  public $lookupKey;
  protected $rawContactInfoType = AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo::class;
  protected $rawContactInfoDataType = 'array';

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
   * @param bool
   */
  public function setHasCrossDeviceData($hasCrossDeviceData)
  {
    $this->hasCrossDeviceData = $hasCrossDeviceData;
  }
  /**
   * @return bool
   */
  public function getHasCrossDeviceData()
  {
    return $this->hasCrossDeviceData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiDeviceContactId
   */
  public function setId(AppsPeopleOzExternalMergedpeopleapiDeviceContactId $id)
  {
    $this->id = $id;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiDeviceContactId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLastClientUpdateTime($lastClientUpdateTime)
  {
    $this->lastClientUpdateTime = $lastClientUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastClientUpdateTime()
  {
    return $this->lastClientUpdateTime;
  }
  /**
   * @param string
   */
  public function setLookupKey($lookupKey)
  {
    $this->lookupKey = $lookupKey;
  }
  /**
   * @return string
   */
  public function getLookupKey()
  {
    return $this->lookupKey;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo[]
   */
  public function setRawContactInfo($rawContactInfo)
  {
    $this->rawContactInfo = $rawContactInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRawDeviceContactInfo[]
   */
  public function getRawContactInfo()
  {
    return $this->rawContactInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo');
