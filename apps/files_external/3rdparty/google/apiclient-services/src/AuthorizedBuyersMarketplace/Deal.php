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

class Deal extends \Google\Model
{
  public $billedBuyer;
  public $buyer;
  public $client;
  public $createTime;
  protected $creativeRequirementsType = CreativeRequirements::class;
  protected $creativeRequirementsDataType = '';
  public $dealType;
  protected $deliveryControlType = DeliveryControl::class;
  protected $deliveryControlDataType = '';
  public $description;
  public $displayName;
  protected $estimatedGrossSpendType = Money::class;
  protected $estimatedGrossSpendDataType = '';
  public $flightEndTime;
  public $flightStartTime;
  public $name;
  protected $preferredDealTermsType = PreferredDealTerms::class;
  protected $preferredDealTermsDataType = '';
  protected $privateAuctionTermsType = PrivateAuctionTerms::class;
  protected $privateAuctionTermsDataType = '';
  protected $programmaticGuaranteedTermsType = ProgrammaticGuaranteedTerms::class;
  protected $programmaticGuaranteedTermsDataType = '';
  public $proposalRevision;
  public $publisherProfile;
  protected $sellerTimeZoneType = TimeZone::class;
  protected $sellerTimeZoneDataType = '';
  protected $targetingType = MarketplaceTargeting::class;
  protected $targetingDataType = '';
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
  public function setClient($client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param CreativeRequirements
   */
  public function setCreativeRequirements(CreativeRequirements $creativeRequirements)
  {
    $this->creativeRequirements = $creativeRequirements;
  }
  /**
   * @return CreativeRequirements
   */
  public function getCreativeRequirements()
  {
    return $this->creativeRequirements;
  }
  public function setDealType($dealType)
  {
    $this->dealType = $dealType;
  }
  public function getDealType()
  {
    return $this->dealType;
  }
  /**
   * @param DeliveryControl
   */
  public function setDeliveryControl(DeliveryControl $deliveryControl)
  {
    $this->deliveryControl = $deliveryControl;
  }
  /**
   * @return DeliveryControl
   */
  public function getDeliveryControl()
  {
    return $this->deliveryControl;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
   * @param PrivateAuctionTerms
   */
  public function setPrivateAuctionTerms(PrivateAuctionTerms $privateAuctionTerms)
  {
    $this->privateAuctionTerms = $privateAuctionTerms;
  }
  /**
   * @return PrivateAuctionTerms
   */
  public function getPrivateAuctionTerms()
  {
    return $this->privateAuctionTerms;
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
   * @param TimeZone
   */
  public function setSellerTimeZone(TimeZone $sellerTimeZone)
  {
    $this->sellerTimeZone = $sellerTimeZone;
  }
  /**
   * @return TimeZone
   */
  public function getSellerTimeZone()
  {
    return $this->sellerTimeZone;
  }
  /**
   * @param MarketplaceTargeting
   */
  public function setTargeting(MarketplaceTargeting $targeting)
  {
    $this->targeting = $targeting;
  }
  /**
   * @return MarketplaceTargeting
   */
  public function getTargeting()
  {
    return $this->targeting;
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
class_alias(Deal::class, 'Google_Service_AuthorizedBuyersMarketplace_Deal');
