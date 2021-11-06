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

namespace Google\Service\Dfareporting;

class AccountUserProfile extends \Google\Model
{
  public $accountId;
  public $active;
  protected $advertiserFilterType = ObjectFilter::class;
  protected $advertiserFilterDataType = '';
  protected $campaignFilterType = ObjectFilter::class;
  protected $campaignFilterDataType = '';
  public $comments;
  public $email;
  public $id;
  public $kind;
  public $locale;
  public $name;
  protected $siteFilterType = ObjectFilter::class;
  protected $siteFilterDataType = '';
  public $subaccountId;
  public $traffickerType;
  public $userAccessType;
  protected $userRoleFilterType = ObjectFilter::class;
  protected $userRoleFilterDataType = '';
  public $userRoleId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param ObjectFilter
   */
  public function setAdvertiserFilter(ObjectFilter $advertiserFilter)
  {
    $this->advertiserFilter = $advertiserFilter;
  }
  /**
   * @return ObjectFilter
   */
  public function getAdvertiserFilter()
  {
    return $this->advertiserFilter;
  }
  /**
   * @param ObjectFilter
   */
  public function setCampaignFilter(ObjectFilter $campaignFilter)
  {
    $this->campaignFilter = $campaignFilter;
  }
  /**
   * @return ObjectFilter
   */
  public function getCampaignFilter()
  {
    return $this->campaignFilter;
  }
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  public function getComments()
  {
    return $this->comments;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param ObjectFilter
   */
  public function setSiteFilter(ObjectFilter $siteFilter)
  {
    $this->siteFilter = $siteFilter;
  }
  /**
   * @return ObjectFilter
   */
  public function getSiteFilter()
  {
    return $this->siteFilter;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTraffickerType($traffickerType)
  {
    $this->traffickerType = $traffickerType;
  }
  public function getTraffickerType()
  {
    return $this->traffickerType;
  }
  public function setUserAccessType($userAccessType)
  {
    $this->userAccessType = $userAccessType;
  }
  public function getUserAccessType()
  {
    return $this->userAccessType;
  }
  /**
   * @param ObjectFilter
   */
  public function setUserRoleFilter(ObjectFilter $userRoleFilter)
  {
    $this->userRoleFilter = $userRoleFilter;
  }
  /**
   * @return ObjectFilter
   */
  public function getUserRoleFilter()
  {
    return $this->userRoleFilter;
  }
  public function setUserRoleId($userRoleId)
  {
    $this->userRoleId = $userRoleId;
  }
  public function getUserRoleId()
  {
    return $this->userRoleId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountUserProfile::class, 'Google_Service_Dfareporting_AccountUserProfile');
