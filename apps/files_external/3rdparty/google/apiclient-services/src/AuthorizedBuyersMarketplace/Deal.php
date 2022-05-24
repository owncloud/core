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
  /**
   * @var string
   */
  public $billedBuyer;
  /**
   * @var string
   */
  public $buyer;
  /**
   * @var string
   */
  public $client;
  /**
   * @var string
   */
  public $createTime;
  protected $creativeRequirementsType = CreativeRequirements::class;
  protected $creativeRequirementsDataType = '';
  /**
   * @var string
   */
  public $dealType;
  protected $deliveryControlType = DeliveryControl::class;
  protected $deliveryControlDataType = '';
  /**
   * @var string
   */
  public $description;
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
  /**
   * @var string
   */
  public $name;
  protected $preferredDealTermsType = PreferredDealTerms::class;
  protected $preferredDealTermsDataType = '';
  protected $privateAuctionTermsType = PrivateAuctionTerms::class;
  protected $privateAuctionTermsDataType = '';
  protected $programmaticGuaranteedTermsType = ProgrammaticGuaranteedTerms::class;
  protected $programmaticGuaranteedTermsDataType = '';
  /**
   * @var string
   */
  public $proposalRevision;
  /**
   * @var string
   */
  public $publisherProfile;
  protected $sellerTimeZoneType = TimeZone::class;
  protected $sellerTimeZoneDataType = '';
  protected $targetingType = MarketplaceTargeting::class;
  protected $targetingDataType = '';
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
class_alias(Deal::class, 'Google_Service_AuthorizedBuyersMarketplace_Deal');
