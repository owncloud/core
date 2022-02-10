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
  /**
   * @var string
   */
  public $accountManagement;
  protected $adsLinksType = AccountAdsLink::class;
  protected $adsLinksDataType = 'array';
  /**
   * @var bool
   */
  public $adultContent;
  /**
   * @var string[]
   */
  public $automaticLabelIds;
  protected $businessInformationType = AccountBusinessInformation::class;
  protected $businessInformationDataType = '';
  /**
   * @var string
   */
  public $cssId;
  protected $googleMyBusinessLinkType = AccountGoogleMyBusinessLink::class;
  protected $googleMyBusinessLinkDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labelIds;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $sellerId;
  protected $usersType = AccountUser::class;
  protected $usersDataType = 'array';
  /**
   * @var string
   */
  public $websiteUrl;
  protected $youtubeChannelLinksType = AccountYouTubeChannelLink::class;
  protected $youtubeChannelLinksDataType = 'array';

  /**
   * @param string
   */
  public function setAccountManagement($accountManagement)
  {
    $this->accountManagement = $accountManagement;
  }
  /**
   * @return string
   */
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
  /**
   * @param bool
   */
  public function setAdultContent($adultContent)
  {
    $this->adultContent = $adultContent;
  }
  /**
   * @return bool
   */
  public function getAdultContent()
  {
    return $this->adultContent;
  }
  /**
   * @param string[]
   */
  public function setAutomaticLabelIds($automaticLabelIds)
  {
    $this->automaticLabelIds = $automaticLabelIds;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setCssId($cssId)
  {
    $this->cssId = $cssId;
  }
  /**
   * @return string
   */
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
   * @param string[]
   */
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  /**
   * @return string[]
   */
  public function getLabelIds()
  {
    return $this->labelIds;
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
  public function setSellerId($sellerId)
  {
    $this->sellerId = $sellerId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  /**
   * @return string
   */
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
