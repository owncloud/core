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

class SpaceInfo extends \Google\Model
{
  protected $avatarInfoType = AvatarInfo::class;
  protected $avatarInfoDataType = '';
  /**
   * @var string
   */
  public $avatarUrl;
  /**
   * @var string
   */
  public $description;
  protected $groupIdType = GroupId::class;
  protected $groupIdDataType = '';
  /**
   * @var string
   */
  public $inviterEmail;
  /**
   * @var bool
   */
  public $isExternal;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $numMembers;
  /**
   * @var string
   */
  public $userMembershipState;

  /**
   * @param AvatarInfo
   */
  public function setAvatarInfo(AvatarInfo $avatarInfo)
  {
    $this->avatarInfo = $avatarInfo;
  }
  /**
   * @return AvatarInfo
   */
  public function getAvatarInfo()
  {
    return $this->avatarInfo;
  }
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
   * @param GroupId
   */
  public function setGroupId(GroupId $groupId)
  {
    $this->groupId = $groupId;
  }
  /**
   * @return GroupId
   */
  public function getGroupId()
  {
    return $this->groupId;
  }
  /**
   * @param string
   */
  public function setInviterEmail($inviterEmail)
  {
    $this->inviterEmail = $inviterEmail;
  }
  /**
   * @return string
   */
  public function getInviterEmail()
  {
    return $this->inviterEmail;
  }
  /**
   * @param bool
   */
  public function setIsExternal($isExternal)
  {
    $this->isExternal = $isExternal;
  }
  /**
   * @return bool
   */
  public function getIsExternal()
  {
    return $this->isExternal;
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
   * @param int
   */
  public function setNumMembers($numMembers)
  {
    $this->numMembers = $numMembers;
  }
  /**
   * @return int
   */
  public function getNumMembers()
  {
    return $this->numMembers;
  }
  /**
   * @param string
   */
  public function setUserMembershipState($userMembershipState)
  {
    $this->userMembershipState = $userMembershipState;
  }
  /**
   * @return string
   */
  public function getUserMembershipState()
  {
    return $this->userMembershipState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpaceInfo::class, 'Google_Service_CloudSearch_SpaceInfo');
