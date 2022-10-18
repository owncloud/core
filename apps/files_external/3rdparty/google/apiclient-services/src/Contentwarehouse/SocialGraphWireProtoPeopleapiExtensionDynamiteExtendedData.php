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

class SocialGraphWireProtoPeopleapiExtensionDynamiteExtendedData extends \Google\Model
{
  /**
   * @var string
   */
  public $avatarUrl;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $developerName;
  /**
   * @var string
   */
  public $dndState;
  /**
   * @var string
   */
  public $entityType;
  /**
   * @var string
   */
  public $memberCount;
  protected $organizationInfoType = AppsDynamiteSharedOrganizationInfo::class;
  protected $organizationInfoDataType = '';
  /**
   * @var string
   */
  public $presence;

  /**
   * @param string
   */
  public function setAvatarUrl($avatarUrl)
  {
    $this->avatarUrl = $avatarUrl;
  }
  /**
   * @return string
   */
  public function getAvatarUrl()
  {
    return $this->avatarUrl;
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
  public function setDeveloperName($developerName)
  {
    $this->developerName = $developerName;
  }
  /**
   * @return string
   */
  public function getDeveloperName()
  {
    return $this->developerName;
  }
  /**
   * @param string
   */
  public function setDndState($dndState)
  {
    $this->dndState = $dndState;
  }
  /**
   * @return string
   */
  public function getDndState()
  {
    return $this->dndState;
  }
  /**
   * @param string
   */
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  /**
   * @return string
   */
  public function getEntityType()
  {
    return $this->entityType;
  }
  /**
   * @param string
   */
  public function setMemberCount($memberCount)
  {
    $this->memberCount = $memberCount;
  }
  /**
   * @return string
   */
  public function getMemberCount()
  {
    return $this->memberCount;
  }
  /**
   * @param AppsDynamiteSharedOrganizationInfo
   */
  public function setOrganizationInfo(AppsDynamiteSharedOrganizationInfo $organizationInfo)
  {
    $this->organizationInfo = $organizationInfo;
  }
  /**
   * @return AppsDynamiteSharedOrganizationInfo
   */
  public function getOrganizationInfo()
  {
    return $this->organizationInfo;
  }
  /**
   * @param string
   */
  public function setPresence($presence)
  {
    $this->presence = $presence;
  }
  /**
   * @return string
   */
  public function getPresence()
  {
    return $this->presence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphWireProtoPeopleapiExtensionDynamiteExtendedData::class, 'Google_Service_Contentwarehouse_SocialGraphWireProtoPeopleapiExtensionDynamiteExtendedData');
