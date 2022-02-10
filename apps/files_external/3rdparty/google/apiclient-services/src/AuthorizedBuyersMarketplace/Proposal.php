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
  /**
   * @var string
   */
  public $billedBuyer;
  /**
   * @var string
   */
  public $buyer;
  protected $buyerContactsType = Contact::class;
  protected $buyerContactsDataType = 'array';
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  /**
   * @var string
   */
  public $client;
  /**
   * @var string
   */
  public $dealType;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $isRenegotiating;
  /**
   * @var string
   */
  public $lastUpdaterOrCommentorRole;
  /**
   * @var string
   */
  public $name;
  protected $notesType = Note::class;
  protected $notesDataType = 'array';
  /**
   * @var string
   */
  public $originatorRole;
  /**
   * @var bool
   */
  public $pausingConsented;
  /**
   * @var string
   */
  public $proposalRevision;
  /**
   * @var string
   */
  public $publisherProfile;
  protected $sellerContactsType = Contact::class;
  protected $sellerContactsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $termsAndConditions;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setBilledBuyer($billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  /**
   * @return string
   */
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  /**
   * @param string
   */
  public function setBuyer($buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setClient($client)
  {
    $this->client = $client;
  }
  /**
   * @return string
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param string
   */
  public function setDealType($dealType)
  {
    $this->dealType = $dealType;
  }
  /**
   * @return string
   */
  public function getDealType()
  {
    return $this->dealType;
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
   * @param bool
   */
  public function setPausingConsented($pausingConsented)
  {
    $this->pausingConsented = $pausingConsented;
  }
  /**
   * @return bool
   */
  public function getPausingConsented()
  {
    return $this->pausingConsented;
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
  public function setPublisherProfile($publisherProfile)
  {
    $this->publisherProfile = $publisherProfile;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
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
class_alias(Proposal::class, 'Google_Service_AuthorizedBuyersMarketplace_Proposal');
