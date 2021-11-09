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

namespace Google\Service\AuthorizedBuyersMarketplace;

class Proposal extends \Google\Collection
{
  protected $collection_key = 'sellerContacts';
  public $billedBuyer;
  public $buyer;
  protected $buyerContactsType = Contact::class;
  protected $buyerContactsDataType = 'array';
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  public $client;
  public $dealType;
  public $displayName;
  public $isRenegotiating;
  public $lastUpdaterOrCommentorRole;
  public $name;
  protected $notesType = Note::class;
  protected $notesDataType = 'array';
  public $originatorRole;
  public $pausingConsented;
  public $proposalRevision;
  public $publisherProfile;
  protected $sellerContactsType = Contact::class;
  protected $sellerContactsDataType = 'array';
  public $state;
  public $termsAndConditions;
  public $updateTime;

  public function setBilledBuyer($billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  public function setBuyer($buyer)
  {
    $this->buyer = $buyer;
  }
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param Contact[]
   */
  public function setBuyerContacts($buyerContacts)
  {
    $this->buyerContacts = $buyerContacts;
  }
  /**
   * @return Contact[]
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
  public function setClient($client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setDealType($dealType)
  {
    $this->dealType = $dealType;
  }
  public function getDealType()
  {
    return $this->dealType;
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
  public function setLastUpdaterOrCommentorRole($lastUpdaterOrCommentorRole)
  {
    $this->lastUpdaterOrCommentorRole = $lastUpdaterOrCommentorRole;
  }
  public function getLastUpdaterOrCommentorRole()
  {
    return $this->lastUpdaterOrCommentorRole;
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
  public function setPausingConsented($pausingConsented)
  {
    $this->pausingConsented = $pausingConsented;
  }
  public function getPausingConsented()
  {
    return $this->pausingConsented;
  }
  public function setProposalRevision($proposalRevision)
  {
    $this->proposalRevision = $proposalRevision;
  }
  public function getProposalRevision()
  {
    return $this->proposalRevision;
  }
  public function setPublisherProfile($publisherProfile)
  {
    $this->publisherProfile = $publisherProfile;
  }
  public function getPublisherProfile()
  {
    return $this->publisherProfile;
  }
  /**
   * @param Contact[]
   */
  public function setSellerContacts($sellerContacts)
  {
    $this->sellerContacts = $sellerContacts;
  }
  /**
   * @return Contact[]
   */
  public function getSellerContacts()
  {
    return $this->sellerContacts;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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
class_alias(Proposal::class, 'Google_Service_AuthorizedBuyersMarketplace_Proposal');
