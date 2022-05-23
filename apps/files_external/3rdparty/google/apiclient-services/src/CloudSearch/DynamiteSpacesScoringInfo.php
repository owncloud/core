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

class DynamiteSpacesScoringInfo extends \Google\Model
{
  public $affinityScore;
  public $commonContactCountAffinityScore;
  public $contactsIntersectionCount;
  public $finalScore;
  public $freshnessScore;
  public $joinedSpacesAffinityScore;
  /**
   * @var string
   */
  public $lastMessagePostedTimestampSecs;
  /**
   * @var string
   */
  public $lastReadTimestampSecs;
  public $memberMetadataCount;
  public $messageScore;
  /**
   * @var string
   */
  public $numAucContacts;
  public $smallContactListAffinityScore;
  public $smallUnjoinedSpacesAffinityScore;
  public $spaceAgeInDays;
  /**
   * @var string
   */
  public $spaceCreationTimestampSecs;
  public $topicalityScore;

  public function setAffinityScore($affinityScore)
  {
    $this->affinityScore = $affinityScore;
  }
  public function getAffinityScore()
  {
    return $this->affinityScore;
  }
  public function setCommonContactCountAffinityScore($commonContactCountAffinityScore)
  {
    $this->commonContactCountAffinityScore = $commonContactCountAffinityScore;
  }
  public function getCommonContactCountAffinityScore()
  {
    return $this->commonContactCountAffinityScore;
  }
  public function setContactsIntersectionCount($contactsIntersectionCount)
  {
    $this->contactsIntersectionCount = $contactsIntersectionCount;
  }
  public function getContactsIntersectionCount()
  {
    return $this->contactsIntersectionCount;
  }
  public function setFinalScore($finalScore)
  {
    $this->finalScore = $finalScore;
  }
  public function getFinalScore()
  {
    return $this->finalScore;
  }
  public function setFreshnessScore($freshnessScore)
  {
    $this->freshnessScore = $freshnessScore;
  }
  public function getFreshnessScore()
  {
    return $this->freshnessScore;
  }
  public function setJoinedSpacesAffinityScore($joinedSpacesAffinityScore)
  {
    $this->joinedSpacesAffinityScore = $joinedSpacesAffinityScore;
  }
  public function getJoinedSpacesAffinityScore()
  {
    return $this->joinedSpacesAffinityScore;
  }
  /**
   * @param string
   */
  public function setLastMessagePostedTimestampSecs($lastMessagePostedTimestampSecs)
  {
    $this->lastMessagePostedTimestampSecs = $lastMessagePostedTimestampSecs;
  }
  /**
   * @return string
   */
  public function getLastMessagePostedTimestampSecs()
  {
    return $this->lastMessagePostedTimestampSecs;
  }
  /**
   * @param string
   */
  public function setLastReadTimestampSecs($lastReadTimestampSecs)
  {
    $this->lastReadTimestampSecs = $lastReadTimestampSecs;
  }
  /**
   * @return string
   */
  public function getLastReadTimestampSecs()
  {
    return $this->lastReadTimestampSecs;
  }
  public function setMemberMetadataCount($memberMetadataCount)
  {
    $this->memberMetadataCount = $memberMetadataCount;
  }
  public function getMemberMetadataCount()
  {
    return $this->memberMetadataCount;
  }
  public function setMessageScore($messageScore)
  {
    $this->messageScore = $messageScore;
  }
  public function getMessageScore()
  {
    return $this->messageScore;
  }
  /**
   * @param string
   */
  public function setNumAucContacts($numAucContacts)
  {
    $this->numAucContacts = $numAucContacts;
  }
  /**
   * @return string
   */
  public function getNumAucContacts()
  {
    return $this->numAucContacts;
  }
  public function setSmallContactListAffinityScore($smallContactListAffinityScore)
  {
    $this->smallContactListAffinityScore = $smallContactListAffinityScore;
  }
  public function getSmallContactListAffinityScore()
  {
    return $this->smallContactListAffinityScore;
  }
  public function setSmallUnjoinedSpacesAffinityScore($smallUnjoinedSpacesAffinityScore)
  {
    $this->smallUnjoinedSpacesAffinityScore = $smallUnjoinedSpacesAffinityScore;
  }
  public function getSmallUnjoinedSpacesAffinityScore()
  {
    return $this->smallUnjoinedSpacesAffinityScore;
  }
  public function setSpaceAgeInDays($spaceAgeInDays)
  {
    $this->spaceAgeInDays = $spaceAgeInDays;
  }
  public function getSpaceAgeInDays()
  {
    return $this->spaceAgeInDays;
  }
  /**
   * @param string
   */
  public function setSpaceCreationTimestampSecs($spaceCreationTimestampSecs)
  {
    $this->spaceCreationTimestampSecs = $spaceCreationTimestampSecs;
  }
  /**
   * @return string
   */
  public function getSpaceCreationTimestampSecs()
  {
    return $this->spaceCreationTimestampSecs;
  }
  public function setTopicalityScore($topicalityScore)
  {
    $this->topicalityScore = $topicalityScore;
  }
  public function getTopicalityScore()
  {
    return $this->topicalityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamiteSpacesScoringInfo::class, 'Google_Service_CloudSearch_DynamiteSpacesScoringInfo');
