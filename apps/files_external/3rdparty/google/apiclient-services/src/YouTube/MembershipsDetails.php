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

namespace Google\Service\YouTube;

class MembershipsDetails extends \Google\Collection
{
  protected $collection_key = 'membershipsDurationAtLevels';
  public $accessibleLevels;
  public $highestAccessibleLevel;
  public $highestAccessibleLevelDisplayName;
  protected $membershipsDurationType = MembershipsDuration::class;
  protected $membershipsDurationDataType = '';
  protected $membershipsDurationAtLevelsType = MembershipsDurationAtLevel::class;
  protected $membershipsDurationAtLevelsDataType = 'array';

  public function setAccessibleLevels($accessibleLevels)
  {
    $this->accessibleLevels = $accessibleLevels;
  }
  public function getAccessibleLevels()
  {
    return $this->accessibleLevels;
  }
  public function setHighestAccessibleLevel($highestAccessibleLevel)
  {
    $this->highestAccessibleLevel = $highestAccessibleLevel;
  }
  public function getHighestAccessibleLevel()
  {
    return $this->highestAccessibleLevel;
  }
  public function setHighestAccessibleLevelDisplayName($highestAccessibleLevelDisplayName)
  {
    $this->highestAccessibleLevelDisplayName = $highestAccessibleLevelDisplayName;
  }
  public function getHighestAccessibleLevelDisplayName()
  {
    return $this->highestAccessibleLevelDisplayName;
  }
  /**
   * @param MembershipsDuration
   */
  public function setMembershipsDuration(MembershipsDuration $membershipsDuration)
  {
    $this->membershipsDuration = $membershipsDuration;
  }
  /**
   * @return MembershipsDuration
   */
  public function getMembershipsDuration()
  {
    return $this->membershipsDuration;
  }
  /**
   * @param MembershipsDurationAtLevel[]
   */
  public function setMembershipsDurationAtLevels($membershipsDurationAtLevels)
  {
    $this->membershipsDurationAtLevels = $membershipsDurationAtLevels;
  }
  /**
   * @return MembershipsDurationAtLevel[]
   */
  public function getMembershipsDurationAtLevels()
  {
    return $this->membershipsDurationAtLevels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipsDetails::class, 'Google_Service_YouTube_MembershipsDetails');
