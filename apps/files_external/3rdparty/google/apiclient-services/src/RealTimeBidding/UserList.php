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

namespace Google\Service\RealTimeBidding;

class UserList extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $membershipDurationDays;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $status;
  protected $urlRestrictionType = UrlRestriction::class;
  protected $urlRestrictionDataType = '';

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
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  /**
   * @return string
   */
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param UrlRestriction
   */
  public function setUrlRestriction(UrlRestriction $urlRestriction)
  {
    $this->urlRestriction = $urlRestriction;
  }
  /**
   * @return UrlRestriction
   */
  public function getUrlRestriction()
  {
    return $this->urlRestriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserList::class, 'Google_Service_RealTimeBidding_UserList');
