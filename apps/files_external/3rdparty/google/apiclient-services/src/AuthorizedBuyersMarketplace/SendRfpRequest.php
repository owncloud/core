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

class SendRfpRequest extends \Google\Collection
{
  protected $collection_key = 'buyerContacts';
  protected $buyerContactsType = Contact::class;
  protected $buyerContactsDataType = 'array';
  public $client;
  public $displayName;
  protected $estimatedGrossSpendType = Money::class;
  protected $estimatedGrossSpendDataType = '';
  public $flightEndTime;
  public $flightStartTime;
  protected $geoTargetingType = CriteriaTargeting::class;
  protected $geoTargetingDataType = '';
  protected $inventorySizeTargetingType = InventorySizeTargeting::class;
  protected $inventorySizeTargetingDataType = '';
  public $note;
  protected $preferredDealTermsType = PreferredDealTerms::class;
  protected $preferredDealTermsDataType = '';
  protected $programmaticGuaranteedTermsType = ProgrammaticGuaranteedTerms::class;
  protected $programmaticGuaranteedTermsDataType = '';
  public $publisherProfile;

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
  public function setClient($client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Money
   */
  public function setEstimatedGrossSpend(Money $estimatedGrossSpend)
  {
    $this->estimatedGrossSpend = $estimatedGrossSpend;
  }
  /**
   * @return Money
   */
  public function getEstimatedGrossSpend()
  {
    return $this->estimatedGrossSpend;
  }
  public function setFlightEndTime($flightEndTime)
  {
    $this->flightEndTime = $flightEndTime;
  }
  public function getFlightEndTime()
  {
    return $this->flightEndTime;
  }
  public function setFlightStartTime($flightStartTime)
  {
    $this->flightStartTime = $flightStartTime;
  }
  public function getFlightStartTime()
  {
    return $this->flightStartTime;
  }
  /**
   * @param CriteriaTargeting
   */
  public function setGeoTargeting(CriteriaTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return CriteriaTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param InventorySizeTargeting
   */
  public function setInventorySizeTargeting(InventorySizeTargeting $inventorySizeTargeting)
  {
    $this->inventorySizeTargeting = $inventorySizeTargeting;
  }
  /**
   * @return InventorySizeTargeting
   */
  public function getInventorySizeTargeting()
  {
    return $this->inventorySizeTargeting;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  /**
   * @param PreferredDealTerms
   */
  public function setPreferredDealTerms(PreferredDealTerms $preferredDealTerms)
  {
    $this->preferredDealTerms = $preferredDealTerms;
  }
  /**
   * @return PreferredDealTerms
   */
  public function getPreferredDealTerms()
  {
    return $this->preferredDealTerms;
  }
  /**
   * @param ProgrammaticGuaranteedTerms
   */
  public function setProgrammaticGuaranteedTerms(ProgrammaticGuaranteedTerms $programmaticGuaranteedTerms)
  {
    $this->programmaticGuaranteedTerms = $programmaticGuaranteedTerms;
  }
  /**
   * @return ProgrammaticGuaranteedTerms
   */
  public function getProgrammaticGuaranteedTerms()
  {
    return $this->programmaticGuaranteedTerms;
  }
  public function setPublisherProfile($publisherProfile)
  {
    $this->publisherProfile = $publisherProfile;
  }
  public function getPublisherProfile()
  {
    return $this->publisherProfile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SendRfpRequest::class, 'Google_Service_AuthorizedBuyersMarketplace_SendRfpRequest');
