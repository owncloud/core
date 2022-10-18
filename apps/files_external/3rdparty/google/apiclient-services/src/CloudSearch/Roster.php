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

class Roster extends \Google\Model
{
  /**
   * @var string
   */
  public $avatarUrl;
  protected $idType = RosterId::class;
  protected $idDataType = '';
  /**
   * @var int
   */
  public $membershipCount;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $rosterGaiaKey;
  /**
   * @var string
   */
  public $rosterState;
  protected $segmentedMembershipCountsType = AppsDynamiteSharedSegmentedMembershipCounts::class;
  protected $segmentedMembershipCountsDataType = '';

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
   * @param RosterId
   */
  public function setId(RosterId $id)
  {
    $this->id = $id;
  }
  /**
   * @return RosterId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param int
   */
  public function setMembershipCount($membershipCount)
  {
    $this->membershipCount = $membershipCount;
  }
  /**
   * @return int
   */
  public function getMembershipCount()
  {
    return $this->membershipCount;
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
   * @param string
   */
  public function setRosterGaiaKey($rosterGaiaKey)
  {
    $this->rosterGaiaKey = $rosterGaiaKey;
  }
  /**
   * @return string
   */
  public function getRosterGaiaKey()
  {
    return $this->rosterGaiaKey;
  }
  /**
   * @param string
   */
  public function setRosterState($rosterState)
  {
    $this->rosterState = $rosterState;
  }
  /**
   * @return string
   */
  public function getRosterState()
  {
    return $this->rosterState;
  }
  /**
   * @param AppsDynamiteSharedSegmentedMembershipCounts
   */
  public function setSegmentedMembershipCounts(AppsDynamiteSharedSegmentedMembershipCounts $segmentedMembershipCounts)
  {
    $this->segmentedMembershipCounts = $segmentedMembershipCounts;
  }
  /**
   * @return AppsDynamiteSharedSegmentedMembershipCounts
   */
  public function getSegmentedMembershipCounts()
  {
    return $this->segmentedMembershipCounts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Roster::class, 'Google_Service_CloudSearch_Roster');
