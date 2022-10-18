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

class AppsDynamiteSharedSegmentedMembershipCount extends \Google\Model
{
  /**
   * @var string
   */
  public $memberType;
  /**
   * @var int
   */
  public $membershipCount;
  /**
   * @var string
   */
  public $membershipState;

  /**
   * @param string
   */
  public function setMemberType($memberType)
  {
    $this->memberType = $memberType;
  }
  /**
   * @return string
   */
  public function getMemberType()
  {
    return $this->memberType;
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
  public function setMembershipState($membershipState)
  {
    $this->membershipState = $membershipState;
  }
  /**
   * @return string
   */
  public function getMembershipState()
  {
    return $this->membershipState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedSegmentedMembershipCount::class, 'Google_Service_CloudSearch_AppsDynamiteSharedSegmentedMembershipCount');
