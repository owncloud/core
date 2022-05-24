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

class Order extends \Google\Collection
{
  protected $collection_key = 'siteNames';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string[]
   */
  public $approverUserProfileIds;
  /**
   * @var string
   */
  public $buyerInvoiceId;
  /**
   * @var string
   */
  public $buyerOrganizationName;
  /**
   * @var string
   */
  public $comments;
  protected $contactsType = OrderContact::class;
  protected $contactsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  /**
   * @var string
   */
  public $planningTermId;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $sellerOrderId;
  /**
   * @var string
   */
  public $sellerOrganizationName;
  /**
   * @var string[]
   */
  public $siteId;
  /**
   * @var string[]
   */
  public $siteNames;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $termsAndConditions;

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
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string[]
   */
  public function setApproverUserProfileIds($approverUserProfileIds)
  {
    $this->approverUserProfileIds = $approverUserProfileIds;
  }
  /**
   * @return string[]
   */
  public function getApproverUserProfileIds()
  {
    return $this->approverUserProfileIds;
  }
  /**
   * @param string
   */
  public function setBuyerInvoiceId($buyerInvoiceId)
  {
    $this->buyerInvoiceId = $buyerInvoiceId;
  }
  /**
   * @return string
   */
  public function getBuyerInvoiceId()
  {
    return $this->buyerInvoiceId;
  }
  /**
   * @param string
   */
  public function setBuyerOrganizationName($buyerOrganizationName)
  {
    $this->buyerOrganizationName = $buyerOrganizationName;
  }
  /**
   * @return string
   */
  public function getBuyerOrganizationName()
  {
    return $this->buyerOrganizationName;
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
   * @param OrderContact[]
   */
  public function setContacts($contacts)
  {
    $this->contacts = $contacts;
  }
  /**
   * @return OrderContact[]
   */
  public function getContacts()
  {
    return $this->contacts;
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
   * @param LastModifiedInfo
   */
  public function setLastModifiedInfo(LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
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
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setPlanningTermId($planningTermId)
  {
    $this->planningTermId = $planningTermId;
  }
  /**
   * @return string
   */
  public function getPlanningTermId()
  {
    return $this->planningTermId;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setSellerOrderId($sellerOrderId)
  {
    $this->sellerOrderId = $sellerOrderId;
  }
  /**
   * @return string
   */
  public function getSellerOrderId()
  {
    return $this->sellerOrderId;
  }
  /**
   * @param string
   */
  public function setSellerOrganizationName($sellerOrganizationName)
  {
    $this->sellerOrganizationName = $sellerOrganizationName;
  }
  /**
   * @return string
   */
  public function getSellerOrganizationName()
  {
    return $this->sellerOrganizationName;
  }
  /**
   * @param string[]
   */
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  /**
   * @return string[]
   */
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param string[]
   */
  public function setSiteNames($siteNames)
  {
    $this->siteNames = $siteNames;
  }
  /**
   * @return string[]
   */
  public function getSiteNames()
  {
    return $this->siteNames;
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
  public function setTermsAndConditions($termsAndConditions)
  {
    $this->termsAndConditions = $termsAndConditions;
  }
  /**
   * @return string
   */
  public function getTermsAndConditions()
  {
    return $this->termsAndConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Order::class, 'Google_Service_Dfareporting_Order');
