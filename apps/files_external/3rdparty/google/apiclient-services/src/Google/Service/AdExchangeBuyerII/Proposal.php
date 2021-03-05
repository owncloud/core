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

class Google_Service_AdExchangeBuyerII_Proposal extends Google_Collection
{
  protected $collection_key = 'sellerContacts';
  protected $billedBuyerType = 'Google_Service_AdExchangeBuyerII_Buyer';
  protected $billedBuyerDataType = '';
  protected $buyerType = 'Google_Service_AdExchangeBuyerII_Buyer';
  protected $buyerDataType = '';
  protected $buyerContactsType = 'Google_Service_AdExchangeBuyerII_ContactInformation';
  protected $buyerContactsDataType = 'array';
  protected $buyerPrivateDataType = 'Google_Service_AdExchangeBuyerII_PrivateData';
  protected $buyerPrivateDataDataType = '';
  protected $dealsType = 'Google_Service_AdExchangeBuyerII_Deal';
  protected $dealsDataType = 'array';
  public $displayName;
  public $isRenegotiating;
  public $isSetupComplete;
  public $lastUpdaterOrCommentorRole;
  protected $notesType = 'Google_Service_AdExchangeBuyerII_Note';
  protected $notesDataType = 'array';
  public $originatorRole;
  public $privateAuctionId;
  public $proposalId;
  public $proposalRevision;
  public $proposalState;
  protected $sellerType = 'Google_Service_AdExchangeBuyerII_Seller';
  protected $sellerDataType = '';
  protected $sellerContactsType = 'Google_Service_AdExchangeBuyerII_ContactInformation';
  protected $sellerContactsDataType = 'array';
  public $termsAndConditions;
  public $updateTime;

  /**
   * @param Google_Service_AdExchangeBuyerII_Buyer
   */
  public function setBilledBuyer(Google_Service_AdExchangeBuyerII_Buyer $billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Buyer
   */
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Buyer
   */
  public function setBuyer(Google_Service_AdExchangeBuyerII_Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_ContactInformation[]
   */
  public function setBuyerContacts($buyerContacts)
  {
    $this->buyerContacts = $buyerContacts;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_ContactInformation[]
   */
  public function getBuyerContacts()
  {
    return $this->buyerContacts;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_PrivateData
   */
  public function setBuyerPrivateData(Google_Service_AdExchangeBuyerII_PrivateData $buyerPrivateData)
  {
    $this->buyerPrivateData = $buyerPrivateData;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_PrivateData
   */
  public function getBuyerPrivateData()
  {
    return $this->buyerPrivateData;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Deal[]
   */
  public function setDeals($deals)
  {
    $this->deals = $deals;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Deal[]
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
   * @param Google_Service_AdExchangeBuyerII_Note[]
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Note[]
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
   * @param Google_Service_AdExchangeBuyerII_Seller
   */
  public function setSeller(Google_Service_AdExchangeBuyerII_Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_ContactInformation[]
   */
  public function setSellerContacts($sellerContacts)
  {
    $this->sellerContacts = $sellerContacts;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_ContactInformation[]
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
