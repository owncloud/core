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

namespace Google\Service\AdExchangeBuyer;

class MarketplaceDeal extends \Google\Collection
{
  protected $collection_key = 'sharedTargetings';
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  public $creationTimeMs;
  public $creativePreApprovalPolicy;
  public $creativeSafeFrameCompatibility;
  public $dealId;
  protected $dealServingMetadataType = DealServingMetadata::class;
  protected $dealServingMetadataDataType = '';
  protected $deliveryControlType = DeliveryControl::class;
  protected $deliveryControlDataType = '';
  public $externalDealId;
  public $flightEndTimeMs;
  public $flightStartTimeMs;
  public $inventoryDescription;
  public $isRfpTemplate;
  public $isSetupComplete;
  public $kind;
  public $lastUpdateTimeMs;
  public $makegoodRequestedReason;
  public $name;
  public $productId;
  public $productRevisionNumber;
  public $programmaticCreativeSource;
  public $proposalId;
  protected $sellerContactsType = ContactInformation::class;
  protected $sellerContactsDataType = 'array';
  protected $sharedTargetingsType = SharedTargeting::class;
  protected $sharedTargetingsDataType = 'array';
  public $syndicationProduct;
  protected $termsType = DealTerms::class;
  protected $termsDataType = '';
  public $webPropertyCode;

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
  public function setCreationTimeMs($creationTimeMs)
  {
    $this->creationTimeMs = $creationTimeMs;
  }
  public function getCreationTimeMs()
  {
    return $this->creationTimeMs;
  }
  public function setCreativePreApprovalPolicy($creativePreApprovalPolicy)
  {
    $this->creativePreApprovalPolicy = $creativePreApprovalPolicy;
  }
  public function getCreativePreApprovalPolicy()
  {
    return $this->creativePreApprovalPolicy;
  }
  public function setCreativeSafeFrameCompatibility($creativeSafeFrameCompatibility)
  {
    $this->creativeSafeFrameCompatibility = $creativeSafeFrameCompatibility;
  }
  public function getCreativeSafeFrameCompatibility()
  {
    return $this->creativeSafeFrameCompatibility;
  }
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  public function getDealId()
  {
    return $this->dealId;
  }
  /**
   * @param DealServingMetadata
   */
  public function setDealServingMetadata(DealServingMetadata $dealServingMetadata)
  {
    $this->dealServingMetadata = $dealServingMetadata;
  }
  /**
   * @return DealServingMetadata
   */
  public function getDealServingMetadata()
  {
    return $this->dealServingMetadata;
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
  public function setExternalDealId($externalDealId)
  {
    $this->externalDealId = $externalDealId;
  }
  public function getExternalDealId()
  {
    return $this->externalDealId;
  }
  public function setFlightEndTimeMs($flightEndTimeMs)
  {
    $this->flightEndTimeMs = $flightEndTimeMs;
  }
  public function getFlightEndTimeMs()
  {
    return $this->flightEndTimeMs;
  }
  public function setFlightStartTimeMs($flightStartTimeMs)
  {
    $this->flightStartTimeMs = $flightStartTimeMs;
  }
  public function getFlightStartTimeMs()
  {
    return $this->flightStartTimeMs;
  }
  public function setInventoryDescription($inventoryDescription)
  {
    $this->inventoryDescription = $inventoryDescription;
  }
  public function getInventoryDescription()
  {
    return $this->inventoryDescription;
  }
  public function setIsRfpTemplate($isRfpTemplate)
  {
    $this->isRfpTemplate = $isRfpTemplate;
  }
  public function getIsRfpTemplate()
  {
    return $this->isRfpTemplate;
  }
  public function setIsSetupComplete($isSetupComplete)
  {
    $this->isSetupComplete = $isSetupComplete;
  }
  public function getIsSetupComplete()
  {
    return $this->isSetupComplete;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastUpdateTimeMs($lastUpdateTimeMs)
  {
    $this->lastUpdateTimeMs = $lastUpdateTimeMs;
  }
  public function getLastUpdateTimeMs()
  {
    return $this->lastUpdateTimeMs;
  }
  public function setMakegoodRequestedReason($makegoodRequestedReason)
  {
    $this->makegoodRequestedReason = $makegoodRequestedReason;
  }
  public function getMakegoodRequestedReason()
  {
    return $this->makegoodRequestedReason;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setProductRevisionNumber($productRevisionNumber)
  {
    $this->productRevisionNumber = $productRevisionNumber;
  }
  public function getProductRevisionNumber()
  {
    return $this->productRevisionNumber;
  }
  public function setProgrammaticCreativeSource($programmaticCreativeSource)
  {
    $this->programmaticCreativeSource = $programmaticCreativeSource;
  }
  public function getProgrammaticCreativeSource()
  {
    return $this->programmaticCreativeSource;
  }
  public function setProposalId($proposalId)
  {
    $this->proposalId = $proposalId;
  }
  public function getProposalId()
  {
    return $this->proposalId;
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
   * @param SharedTargeting[]
   */
  public function setSharedTargetings($sharedTargetings)
  {
    $this->sharedTargetings = $sharedTargetings;
  }
  /**
   * @return SharedTargeting[]
   */
  public function getSharedTargetings()
  {
    return $this->sharedTargetings;
  }
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  public function getSyndicationProduct()
  {
    return $this->syndicationProduct;
  }
  /**
   * @param DealTerms
   */
  public function setTerms(DealTerms $terms)
  {
    $this->terms = $terms;
  }
  /**
   * @return DealTerms
   */
  public function getTerms()
  {
    return $this->terms;
  }
  public function setWebPropertyCode($webPropertyCode)
  {
    $this->webPropertyCode = $webPropertyCode;
  }
  public function getWebPropertyCode()
  {
    return $this->webPropertyCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MarketplaceDeal::class, 'Google_Service_AdExchangeBuyer_MarketplaceDeal');
