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

namespace Google\Service\AdExchangeBuyerII;

class Proposal extends \Google\Collection
{
  protected $collection_key = 'sellerContacts';
  protected $billedBuyerType = Buyer::class;
  protected $billedBuyerDataType = '';
  protected $buyerType = Buyer::class;
  protected $buyerDataType = '';
  protected $buyerContactsType = ContactInformation::class;
  protected $buyerContactsDataType = 'array';
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  protected $dealsType = Deal::class;
  protected $dealsDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $isRenegotiating;
  /**
   * @var bool
   */
  public $isSetupComplete;
  /**
   * @var string
   */
  public $lastUpdaterOrCommentorRole;
  protected $notesType = Note::class;
  protected $notesDataType = 'array';
  /**
   * @var string
   */
  public $originatorRole;
  /**
   * @var string
   */
  public $privateAuctionId;
  /**
   * @var string
   */
  public $proposalId;
  /**
   * @var string
   */
  public $proposalRevision;
  /**
   * @var string
   */
  public $proposalState;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  protected $sellerContactsType = ContactInformation::class;
  protected $sellerContactsDataType = 'array';
  /**
   * @var string
   */
  public $termsAndConditions;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param Buyer
   */
  public function setBilledBuyer(Buyer $billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  /**
   * @return Buyer
   */
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  /**
   * @param Buyer
   */
  public function setBuyer(Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param ContactInformation[]
   */
  public function setBuyerContacts($buyerContacts)
  {
    $this->buyerContacts = $buyerContacts;
  }
  /**
   * @return ContactInformation[]
   */
  public function getBuyerContacts()
  {
    return $this->buyerContacts;
  }
  /**
   * @param PrivateData
   */
  public function setBuyerPrivateData(PrivateData $buyerPrivateData)
  {
    $this->buyerPrivateData = $buyerPrivateData;
  }
  /**
   * @return PrivateData
   */
  public function getBuyerPrivateData()
  {
    return $this->buyerPrivateData;
  }
  /**
   * @param Deal[]
   */
  public function setDeals($deals)
  {
    $this->deals = $deals;
  }
  /**
   * @return Deal[]
   */
  public function getDeals()
  {
    return $this->deals;
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
   * @param bool
   */
  public function setIsRenegotiating($isRenegotiating)
  {
    $this->isRenegotiating = $isRenegotiating;
  }
  /**
   * @return bool
   */
  public function getIsRenegotiating()
  {
    return $this->isRenegotiating;
  }
  /**
   * @param bool
   */
  public function setIsSetupComplete($isSetupComplete)
  {
    $this->isSetupComplete = $isSetupComplete;
  }
  /**
   * @return bool
   */
  public function getIsSetupComplete()
  {
    return $this->isSetupComplete;
  }
  /**
   * @param string
   */
  public function setLastUpdaterOrCommentorRole($lastUpdaterOrCommentorRole)
  {
    $this->lastUpdaterOrCommentorRole = $lastUpdaterOrCommentorRole;
  }
  /**
   * @return string
   */
  public function getLastUpdaterOrCommentorRole()
  {
    return $this->lastUpdaterOrCommentorRole;
  }
  /**
   * @param Note[]
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return Note[]
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setOriginatorRole($originatorRole)
  {
    $this->originatorRole = $originatorRole;
  }
  /**
   * @return string
   */
  public function getOriginatorRole()
  {
    return $this->originatorRole;
  }
  /**
   * @param string
   */
  public function setPrivateAuctionId($privateAuctionId)
  {
    $this->privateAuctionId = $privateAuctionId;
  }
  /**
   * @return string
   */
  public function getPrivateAuctionId()
  {
    return $this->privateAuctionId;
  }
  /**
   * @param string
   */
  public function setProposalId($proposalId)
  {
    $this->proposalId = $proposalId;
  }
  /**
   * @return string
   */
  public function getProposalId()
  {
    return $this->proposalId;
  }
  /**
   * @param string
   */
  public function setProposalRevision($proposalRevision)
  {
    $this->proposalRevision = $proposalRevision;
  }
  /**
   * @return string
   */
  public function getProposalRevision()
  {
    return $this->proposalRevision;
  }
  /**
   * @param string
   */
  public function setProposalState($proposalState)
  {
    $this->proposalState = $proposalState;
  }
  /**
   * @return string
   */
  public function getProposalState()
  {
    return $this->proposalState;
  }
  /**
   * @param Seller
   */
  public function setSeller(Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  /**
   * @param ContactInformation[]
   */
  public function setSellerContacts($sellerContacts)
  {
    $this->sellerContacts = $sellerContacts;
  }
  /**
   * @return ContactInformation[]
   */
  public function getSellerContacts()
  {
    return $this->sellerContacts;
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proposal::class, 'Google_Service_AdExchangeBuyerII_Proposal');
