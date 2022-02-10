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

namespace Google\Service\Analytics;

class IncludeConditions extends \Google\Model
{
  /**
   * @var int
   */
  public $daysToLookBack;
  /**
   * @var bool
   */
  public $isSmartList;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $membershipDurationDays;
  /**
   * @var string
   */
  public $segment;

  /**
   * @param int
   */
  public function setDaysToLookBack($daysToLookBack)
  {
    $this->daysToLookBack = $daysToLookBack;
  }
  /**
   * @return int
   */
  public function getDaysToLookBack()
  {
    return $this->daysToLookBack;
  }
  /**
   * @param bool
   */
  public function setIsSmartList($isSmartList)
  {
    $this->isSmartList = $isSmartList;
  }
  /**
   * @return bool
   */
  public function getIsSmartList()
  {
    return $this->isSmartList;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  /**
   * @return int
   */
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
  }
  /**
   * @param string
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return string
   */
  public function getSegment()
  {
    return $this->segment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IncludeConditions::class, 'Google_Service_Analytics_IncludeConditions');
