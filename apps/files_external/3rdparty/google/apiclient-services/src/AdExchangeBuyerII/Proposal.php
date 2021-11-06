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
  public $displayName;
  public $isRenegotiating;
  public $isSetupComplete;
  public $lastUpdaterOrCommentorRole;
  protected $notesType = Note::class;
  protected $notesDataType = 'array';
  public $originatorRole;
  public $privateAuctionId;
  public $proposalId;
  public $proposalRevision;
  public $proposalState;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  protected $sellerContactsType = ContactInformation::class;
  protected $sellerContactsDataType = 'array';
  public $termsAndConditions;
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setIsRenegotiating($isRenegotiating)
  {
    $this->isRenegotiating = $isRenegotiating;
  }
  public function getIsRenegotiating()
  {
    return $this->isRenegotiating;
  }
  public function setIsSetupComplete($isSetupComplete)
  {
    $this->isSetupComplete = $isSetupComplete;
  }
  public function getIsSetupComplete()
  {
    return $this->isSetupComplete;
  }
  public function setLastUpdaterOrCommentorRole($lastUpdaterOrCommentorRole)
  {
    $this->lastUpdaterOrCommentorRole = $lastUpdaterOrCommentorRole;
  }
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
  public function setOriginatorRole($originatorRole)
  {
    $this->originatorRole = $originatorRole;
  }
  public function getOriginatorRole()
  {
    return $this->originatorRole;
  }
  public function setPrivateAuctionId($privateAuctionId)
  {
    $this->privateAuctionId = $privateAuctionId;
  }
  public function getPrivateAuctionId()
  {
    return $this->privateAuctionId;
  }
  public function setProposalId($proposalId)
  {
    $this->proposalId = $proposalId;
  }
  public function getProposalId()
  {
    return $this->proposalId;
  }
  public function setProposalRevision($proposalRevision)
  {
    $this->proposalRevision = $proposalRevision;
  }
  public function getProposalRevision()
  {
    return $this->proposalRevision;
  }
  public function setProposalState($proposalState)
  {
    $this->proposalState = $proposalState;
  }
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
  public function setTermsAndConditions($termsAndConditions)
  {
    $this->termsAndConditions = $termsAndConditions;
  }
  public function getTermsAndConditions()
  {
    return $this->termsAndConditions;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proposal::class, 'Google_Service_AdExchangeBuyerII_Proposal');
