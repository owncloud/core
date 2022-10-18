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

namespace Google\Service\CloudSearch;

class User extends \Google\Collection
{
  protected $collection_key = 'phoneNumber';
  /**
   * @var string
   */
  public $avatarUrl;
  protected $blockRelationshipType = AppsDynamiteSharedUserBlockRelationship::class;
  protected $blockRelationshipDataType = '';
  protected $botInfoType = BotInfo::class;
  protected $botInfoDataType = '';
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $firstName;
  /**
   * @var string
   */
  public $gender;
  protected $idType = UserId::class;
  protected $idDataType = '';
  /**
   * @var bool
   */
  public $isAnonymous;
  /**
   * @var string
   */
  public $lastName;
  /**
   * @var string
   */
  public $name;
  protected $organizationInfoType = AppsDynamiteSharedOrganizationInfo::class;
  protected $organizationInfoDataType = '';
  protected $phoneNumberType = AppsDynamiteSharedPhoneNumber::class;
  protected $phoneNumberDataType = 'array';
  /**
   * @var string
   */
  public $userAccountState;
  /**
   * @var string
   */
  public $userProfileVisibility;

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
   * @param AppsDynamiteSharedUserBlockRelationship
   */
  public function setBlockRelationship(AppsDynamiteSharedUserBlockRelationship $blockRelationship)
  {
    $this->blockRelationship = $blockRelationship;
  }
  /**
   * @return AppsDynamiteSharedUserBlockRelationship
   */
  public function getBlockRelationship()
  {
    return $this->blockRelationship;
  }
  /**
   * @param BotInfo
   */
  public function setBotInfo(BotInfo $botInfo)
  {
    $this->botInfo = $botInfo;
  }
  /**
   * @return BotInfo
   */
  public function getBotInfo()
  {
    return $this->botInfo;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }
  /**
   * @param string
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return string
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param UserId
   */
  public function setId(UserId $id)
  {
    $this->id = $id;
  }
  /**
   * @return UserId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsAnonymous($isAnonymous)
  {
    $this->isAnonymous = $isAnonymous;
  }
  /**
   * @return bool
   */
  public function getIsAnonymous()
  {
    return $this->isAnonymous;
  }
  /**
   * @param string
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
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
   * @param AppsDynamiteSharedPhoneNumber[]
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return AppsDynamiteSharedPhoneNumber[]
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setUserAccountState($userAccountState)
  {
    $this->userAccountState = $userAccountState;
  }
  /**
   * @return string
   */
  public function getUserAccountState()
  {
    return $this->userAccountState;
  }
  /**
   * @param string
   */
  public function setUserProfileVisibility($userProfileVisibility)
  {
    $this->userProfileVisibility = $userProfileVisibility;
  }
  /**
   * @return string
   */
  public function getUserProfileVisibility()
  {
    return $this->userProfileVisibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(User::class, 'Google_Service_CloudSearch_User');
