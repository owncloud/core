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
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $active;
  protected $advertiserFilterType = ObjectFilter::class;
  protected $advertiserFilterDataType = '';
  protected $campaignFilterType = ObjectFilter::class;
  protected $campaignFilterDataType = '';
  /**
   * @var string
   */
  public $comments;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var string
   */
  public $name;
  protected $siteFilterType = ObjectFilter::class;
  protected $siteFilterDataType = '';
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $traffickerType;
  /**
   * @var string
   */
  public $userAccessType;
  protected $userRoleFilterType = ObjectFilter::class;
  protected $userRoleFilterDataType = '';
  /**
   * @var string
   */
  public $userRoleId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return string
   */
  public function getComments()
  {
    return $this->comments;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
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
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param string
   */
  public function setTraffickerType($traffickerType)
  {
    $this->traffickerType = $traffickerType;
  }
  /**
   * @return string
   */
  public function getTraffickerType()
  {
    return $this->traffickerType;
  }
  /**
   * @param string
   */
  public function setUserAccessType($userAccessType)
  {
    $this->userAccessType = $userAccessType;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setUserRoleId($userRoleId)
  {
    $this->userRoleId = $userRoleId;
  }
  /**
   * @return string
   */
  public function getUserRoleId()
  {
    return $this->userRoleId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountUserProfile::class, 'Google_Service_Dfareporting_AccountUserProfile');
