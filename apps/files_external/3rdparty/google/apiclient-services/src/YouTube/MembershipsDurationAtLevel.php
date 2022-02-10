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

class MembershipsDurationAtLevel extends \Google\Model
{
  /**
   * @var string
   */
  public $level;
  /**
   * @var string
   */
  public $memberSince;
  /**
   * @var int
   */
  public $memberTotalDurationMonths;

  /**
   * @param string
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return string
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param string
   */
  public function setMemberSince($memberSince)
  {
    $this->memberSince = $memberSince;
  }
  /**
   * @return string
   */
  public function getMemberSince()
  {
    return $this->memberSince;
  }
  /**
   * @param int
   */
  public function setMemberTotalDurationMonths($memberTotalDurationMonths)
  {
    $this->memberTotalDurationMonths = $memberTotalDurationMonths;
  }
  /**
   * @return int
   */
  public function getMemberTotalDurationMonths()
  {
    return $this->memberTotalDurationMonths;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipsDurationAtLevel::class, 'Google_Service_YouTube_MembershipsDurationAtLevel');
