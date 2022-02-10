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
  /**
   * @var string
   */
  public $client;
  /**
   * @var string
   */
  public $displayName;
  protected $estimatedGrossSpendType = Money::class;
  protected $estimatedGrossSpendDataType = '';
  /**
   * @var string
   */
  public $flightEndTime;
  /**
   * @var string
   */
  public $flightStartTime;
  protected $geoTargetingType = CriteriaTargeting::class;
  protected $geoTargetingDataType = '';
  protected $inventorySizeTargetingType = InventorySizeTargeting::class;
  protected $inventorySizeTargetingDataType = '';
  /**
   * @var string
   */
  public $note;
  protected $preferredDealTermsType = PreferredDealTerms::class;
  protected $preferredDealTermsDataType = '';
  protected $programmaticGuaranteedTermsType = ProgrammaticGuaranteedTerms::class;
  protected $programmaticGuaranteedTermsDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setFlightEndTime($flightEndTime)
  {
    $this->flightEndTime = $flightEndTime;
  }
  /**
   * @return string
   */
  public function getFlightEndTime()
  {
    return $this->flightEndTime;
  }
  /**
   * @param string
   */
  public function setFlightStartTime($flightStartTime)
  {
    $this->flightStartTime = $flightStartTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setNote($note)
  {
    $this->note = $note;
  }
  /**
   * @return string
   */
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SendRfpRequest::class, 'Google_Service_AuthorizedBuyersMarketplace_SendRfpRequest');
