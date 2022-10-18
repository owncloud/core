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

class MembershipChangedMetadata extends \Google\Collection
{
  protected $collection_key = 'affectedMemberships';
  protected $affectedMemberProfilesType = Member::class;
  protected $affectedMemberProfilesDataType = 'array';
  protected $affectedMembersType = MemberId::class;
  protected $affectedMembersDataType = 'array';
  protected $affectedMembershipsType = AffectedMembership::class;
  protected $affectedMembershipsDataType = 'array';
  protected $initiatorType = UserId::class;
  protected $initiatorDataType = '';
  protected $initiatorProfileType = User::class;
  protected $initiatorProfileDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param Member[]
   */
  public function setAffectedMemberProfiles($affectedMemberProfiles)
  {
    $this->affectedMemberProfiles = $affectedMemberProfiles;
  }
  /**
   * @return Member[]
   */
  public function getAffectedMemberProfiles()
  {
    return $this->affectedMemberProfiles;
  }
  /**
   * @param MemberId[]
   */
  public function setAffectedMembers($affectedMembers)
  {
    $this->affectedMembers = $affectedMembers;
  }
  /**
   * @return MemberId[]
   */
  public function getAffectedMembers()
  {
    return $this->affectedMembers;
  }
  /**
   * @param AffectedMembership[]
   */
  public function setAffectedMemberships($affectedMemberships)
  {
    $this->affectedMemberships = $affectedMemberships;
  }
  /**
   * @return AffectedMembership[]
   */
  public function getAffectedMemberships()
  {
    return $this->affectedMemberships;
  }
  /**
   * @param UserId
   */
  public function setInitiator(UserId $initiator)
  {
    $this->initiator = $initiator;
  }
  /**
   * @return UserId
   */
  public function getInitiator()
  {
    return $this->initiator;
  }
  /**
   * @param User
   */
  public function setInitiatorProfile(User $initiatorProfile)
  {
    $this->initiatorProfile = $initiatorProfile;
  }
  /**
   * @return User
   */
  public function getInitiatorProfile()
  {
    return $this->initiatorProfile;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipChangedMetadata::class, 'Google_Service_CloudSearch_MembershipChangedMetadata');
