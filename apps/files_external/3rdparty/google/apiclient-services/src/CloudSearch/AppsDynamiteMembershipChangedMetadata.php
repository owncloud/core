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

class AppsDynamiteMembershipChangedMetadata extends \Google\Collection
{
  protected $collection_key = 'affectedMemberships';
  protected $affectedMemberProfilesType = AppsDynamiteFrontendMember::class;
  protected $affectedMemberProfilesDataType = 'array';
  protected $affectedMembersType = AppsDynamiteMemberId::class;
  protected $affectedMembersDataType = 'array';
  protected $affectedMembershipsType = AppsDynamiteMembershipChangedMetadataAffectedMembership::class;
  protected $affectedMembershipsDataType = 'array';
  protected $initiatorType = AppsDynamiteUserId::class;
  protected $initiatorDataType = '';
  protected $initiatorProfileType = AppsDynamiteFrontendUser::class;
  protected $initiatorProfileDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param AppsDynamiteFrontendMember[]
   */
  public function setAffectedMemberProfiles($affectedMemberProfiles)
  {
    $this->affectedMemberProfiles = $affectedMemberProfiles;
  }
  /**
   * @return AppsDynamiteFrontendMember[]
   */
  public function getAffectedMemberProfiles()
  {
    return $this->affectedMemberProfiles;
  }
  /**
   * @param AppsDynamiteMemberId[]
   */
  public function setAffectedMembers($affectedMembers)
  {
    $this->affectedMembers = $affectedMembers;
  }
  /**
   * @return AppsDynamiteMemberId[]
   */
  public function getAffectedMembers()
  {
    return $this->affectedMembers;
  }
  /**
   * @param AppsDynamiteMembershipChangedMetadataAffectedMembership[]
   */
  public function setAffectedMemberships($affectedMemberships)
  {
    $this->affectedMemberships = $affectedMemberships;
  }
  /**
   * @return AppsDynamiteMembershipChangedMetadataAffectedMembership[]
   */
  public function getAffectedMemberships()
  {
    return $this->affectedMemberships;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setInitiator(AppsDynamiteUserId $initiator)
  {
    $this->initiator = $initiator;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getInitiator()
  {
    return $this->initiator;
  }
  /**
   * @param AppsDynamiteFrontendUser
   */
  public function setInitiatorProfile(AppsDynamiteFrontendUser $initiatorProfile)
  {
    $this->initiatorProfile = $initiatorProfile;
  }
  /**
   * @return AppsDynamiteFrontendUser
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
class_alias(AppsDynamiteMembershipChangedMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteMembershipChangedMetadata');
