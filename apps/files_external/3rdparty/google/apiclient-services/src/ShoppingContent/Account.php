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

namespace Google\Service\ShoppingContent;

class Account extends \Google\Collection
{
  protected $collection_key = 'youtubeChannelLinks';
  public $accountManagement;
  protected $adsLinksType = AccountAdsLink::class;
  protected $adsLinksDataType = 'array';
  public $adultContent;
  public $automaticLabelIds;
  protected $businessInformationType = AccountBusinessInformation::class;
  protected $businessInformationDataType = '';
  public $cssId;
  protected $googleMyBusinessLinkType = AccountGoogleMyBusinessLink::class;
  protected $googleMyBusinessLinkDataType = '';
  public $id;
  public $kind;
  public $labelIds;
  public $name;
  public $sellerId;
  protected $usersType = AccountUser::class;
  protected $usersDataType = 'array';
  public $websiteUrl;
  protected $youtubeChannelLinksType = AccountYouTubeChannelLink::class;
  protected $youtubeChannelLinksDataType = 'array';

  public function setAccountManagement($accountManagement)
  {
    $this->accountManagement = $accountManagement;
  }
  public function getAccountManagement()
  {
    return $this->accountManagement;
  }
  /**
   * @param AccountAdsLink[]
   */
  public function setAdsLinks($adsLinks)
  {
    $this->adsLinks = $adsLinks;
  }
  /**
   * @return AccountAdsLink[]
   */
  public function getAdsLinks()
  {
    return $this->adsLinks;
  }
  public function setAdultContent($adultContent)
  {
    $this->adultContent = $adultContent;
  }
  public function getAdultContent()
  {
    return $this->adultContent;
  }
  public function setAutomaticLabelIds($automaticLabelIds)
  {
    $this->automaticLabelIds = $automaticLabelIds;
  }
  public function getAutomaticLabelIds()
  {
    return $this->automaticLabelIds;
  }
  /**
   * @param AccountBusinessInformation
   */
  public function setBusinessInformation(AccountBusinessInformation $businessInformation)
  {
    $this->businessInformation = $businessInformation;
  }
  /**
   * @return AccountBusinessInformation
   */
  public function getBusinessInformation()
  {
    return $this->businessInformation;
  }
  public function setCssId($cssId)
  {
    $this->cssId = $cssId;
  }
  public function getCssId()
  {
    return $this->cssId;
  }
  /**
   * @param AccountGoogleMyBusinessLink
   */
  public function setGoogleMyBusinessLink(AccountGoogleMyBusinessLink $googleMyBusinessLink)
  {
    $this->googleMyBusinessLink = $googleMyBusinessLink;
  }
  /**
   * @return AccountGoogleMyBusinessLink
   */
  public function getGoogleMyBusinessLink()
  {
    return $this->googleMyBusinessLink;
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
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  public function getLabelIds()
  {
    return $this->labelIds;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSellerId($sellerId)
  {
    $this->sellerId = $sellerId;
  }
  public function getSellerId()
  {
    return $this->sellerId;
  }
  /**
   * @param AccountUser[]
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return AccountUser[]
   */
  public function getUsers()
  {
    return $this->users;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
  /**
   * @param AccountYouTubeChannelLink[]
   */
  public function setYoutubeChannelLinks($youtubeChannelLinks)
  {
    $this->youtubeChannelLinks = $youtubeChannelLinks;
  }
  /**
   * @return AccountYouTubeChannelLink[]
   */
  public function getYoutubeChannelLinks()
  {
    return $this->youtubeChannelLinks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Account::class, 'Google_Service_ShoppingContent_Account');
