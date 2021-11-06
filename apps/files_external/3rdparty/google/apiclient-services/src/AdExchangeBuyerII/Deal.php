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

class Deal extends \Google\Collection
{
  protected $collection_key = 'targetingCriterion';
  public $availableEndTime;
  public $availableStartTime;
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  public $createProductId;
  public $createProductRevision;
  public $createTime;
  public $creativePreApprovalPolicy;
  protected $creativeRestrictionsType = CreativeRestrictions::class;
  protected $creativeRestrictionsDataType = '';
  public $creativeSafeFrameCompatibility;
  public $dealId;
  protected $dealServingMetadataType = DealServingMetadata::class;
  protected $dealServingMetadataDataType = '';
  protected $dealTermsType = DealTerms::class;
  protected $dealTermsDataType = '';
  protected $deliveryControlType = DeliveryControl::class;
  protected $deliveryControlDataType = '';
  public $description;
  public $displayName;
  public $externalDealId;
  public $isSetupComplete;
  public $programmaticCreativeSource;
  public $proposalId;
  protected $sellerContactsType = ContactInformation::class;
  protected $sellerContactsDataType = 'array';
  public $syndicationProduct;
  protected $targetingType = MarketplaceTargeting::class;
  protected $targetingDataType = '';
  protected $targetingCriterionType = TargetingCriteria::class;
  protected $targetingCriterionDataType = 'array';
  public $updateTime;
  public $webPropertyCode;

  public function setAvailableEndTime($availableEndTime)
  {
    $this->availableEndTime = $availableEndTime;
  }
  public function getAvailableEndTime()
  {
    return $this->availableEndTime;
  }
  public function setAvailableStartTime($availableStartTime)
  {
    $this->availableStartTime = $availableStartTime;
  }
  public function getAvailableStartTime()
  {
    return $this->availableStartTime;
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
  public function setCreateProductId($createProductId)
  {
    $this->createProductId = $createProductId;
  }
  public function getCreateProductId()
  {
    return $this->createProductId;
  }
  public function setCreateProductRevision($createProductRevision)
  {
    $this->createProductRevision = $createProductRevision;
  }
  public function getCreateProductRevision()
  {
    return $this->createProductRevision;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreativePreApprovalPolicy($creativePreApprovalPolicy)
  {
    $this->creativePreApprovalPolicy = $creativePreApprovalPolicy;
  }
  public function getCreativePreApprovalPolicy()
  {
    return $this->creativePreApprovalPolicy;
  }
  /**
   * @param CreativeRestrictions
   */
  public function setCreativeRestrictions(CreativeRestrictions $creativeRestrictions)
  {
    $this->creativeRestrictions = $creativeRestrictions;
  }
  /**
   * @return CreativeRestrictions
   */
  public function getCreativeRestrictions()
  {
    return $this->creativeRestrictions;
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
   * @param DealTerms
   */
  public function setDealTerms(DealTerms $dealTerms)
  {
    $this->dealTerms = $dealTerms;
  }
  /**
   * @return DealTerms
   */
  public function getDealTerms()
  {
    return $this->dealTerms;
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
  public function setExternalDealId($externalDealId)
  {
    $this->externalDealId = $externalDealId;
  }
  public function getExternalDealId()
  {
    return $this->externalDealId;
  }
  public function setIsSetupComplete($isSetupComplete)
  {
    $this->isSetupComplete = $isSetupComplete;
  }
  public function getIsSetupComplete()
  {
    return $this->isSetupComplete;
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
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  public function getSyndicationProduct()
  {
    return $this->syndicationProduct;
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
   * @param TargetingCriteria[]
   */
  public function setTargetingCriterion($targetingCriterion)
  {
    $this->targetingCriterion = $targetingCriterion;
  }
  /**
   * @return TargetingCriteria[]
   */
  public function getTargetingCriterion()
  {
    return $this->targetingCriterion;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
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
class_alias(Deal::class, 'Google_Service_AdExchangeBuyerII_Deal');
