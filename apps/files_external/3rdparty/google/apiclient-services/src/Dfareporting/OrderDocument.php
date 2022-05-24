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

class OrderDocument extends \Google\Collection
{
  protected $collection_key = 'lastSentRecipients';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $amendedOrderDocumentId;
  /**
   * @var string[]
   */
  public $approvedByUserProfileIds;
  /**
   * @var bool
   */
  public $cancelled;
  protected $createdInfoType = LastModifiedInfo::class;
  protected $createdInfoDataType = '';
  /**
   * @var string
   */
  public $effectiveDate;
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
  public $lastSentRecipients;
  /**
   * @var string
   */
  public $lastSentTime;
  /**
   * @var string
   */
  public $orderId;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var bool
   */
  public $signed;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

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
   * @param string
   */
  public function setAmendedOrderDocumentId($amendedOrderDocumentId)
  {
    $this->amendedOrderDocumentId = $amendedOrderDocumentId;
  }
  /**
   * @return string
   */
  public function getAmendedOrderDocumentId()
  {
    return $this->amendedOrderDocumentId;
  }
  /**
   * @param string[]
   */
  public function setApprovedByUserProfileIds($approvedByUserProfileIds)
  {
    $this->approvedByUserProfileIds = $approvedByUserProfileIds;
  }
  /**
   * @return string[]
   */
  public function getApprovedByUserProfileIds()
  {
    return $this->approvedByUserProfileIds;
  }
  /**
   * @param bool
   */
  public function setCancelled($cancelled)
  {
    $this->cancelled = $cancelled;
  }
  /**
   * @return bool
   */
  public function getCancelled()
  {
    return $this->cancelled;
  }
  /**
   * @param LastModifiedInfo
   */
  public function setCreatedInfo(LastModifiedInfo $createdInfo)
  {
    $this->createdInfo = $createdInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getCreatedInfo()
  {
    return $this->createdInfo;
  }
  /**
   * @param string
   */
  public function setEffectiveDate($effectiveDate)
  {
    $this->effectiveDate = $effectiveDate;
  }
  /**
   * @return string
   */
  public function getEffectiveDate()
  {
    return $this->effectiveDate;
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
  public function setLastSentRecipients($lastSentRecipients)
  {
    $this->lastSentRecipients = $lastSentRecipients;
  }
  /**
   * @return string[]
   */
  public function getLastSentRecipients()
  {
    return $this->lastSentRecipients;
  }
  /**
   * @param string
   */
  public function setLastSentTime($lastSentTime)
  {
    $this->lastSentTime = $lastSentTime;
  }
  /**
   * @return string
   */
  public function getLastSentTime()
  {
    return $this->lastSentTime;
  }
  /**
   * @param string
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
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
   * @param bool
   */
  public function setSigned($signed)
  {
    $this->signed = $signed;
  }
  /**
   * @return bool
   */
  public function getSigned()
  {
    return $this->signed;
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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderDocument::class, 'Google_Service_Dfareporting_OrderDocument');
