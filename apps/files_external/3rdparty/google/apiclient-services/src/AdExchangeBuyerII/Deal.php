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
  /**
   * @var string
   */
  public $availableEndTime;
  /**
   * @var string
   */
  public $availableStartTime;
  protected $buyerPrivateDataType = PrivateData::class;
  protected $buyerPrivateDataDataType = '';
  /**
   * @var string
   */
  public $createProductId;
  /**
   * @var string
   */
  public $createProductRevision;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creativePreApprovalPolicy;
  protected $creativeRestrictionsType = CreativeRestrictions::class;
  protected $creativeRestrictionsDataType = '';
  /**
   * @var string
   */
  public $creativeSafeFrameCompatibility;
  /**
   * @var string
   */
  public $dealId;
  protected $dealServingMetadataType = DealServingMetadata::class;
  protected $dealServingMetadataDataType = '';
  protected $dealTermsType = DealTerms::class;
  protected $dealTermsDataType = '';
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
  /**
   * @var string
   */
  public $externalDealId;
  /**
   * @var bool
   */
  public $isSetupComplete;
  /**
   * @var string
   */
  public $programmaticCreativeSource;
  /**
   * @var string
   */
  public $proposalId;
  protected $sellerContactsType = ContactInformation::class;
  protected $sellerContactsDataType = 'array';
  /**
   * @var string
   */
  public $syndicationProduct;
  protected $targetingType = MarketplaceTargeting::class;
  protected $targetingDataType = '';
  protected $targetingCriterionType = TargetingCriteria::class;
  protected $targetingCriterionDataType = 'array';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $webPropertyCode;

  /**
   * @param string
   */
  public function setAvailableEndTime($availableEndTime)
  {
    $this->availableEndTime = $availableEndTime;
  }
  /**
   * @return string
   */
  public function getAvailableEndTime()
  {
    return $this->availableEndTime;
  }
  /**
   * @param string
   */
  public function setAvailableStartTime($availableStartTime)
  {
    $this->availableStartTime = $availableStartTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setCreateProductId($createProductId)
  {
    $this->createProductId = $createProductId;
  }
  /**
   * @return string
   */
  public function getCreateProductId()
  {
    return $this->createProductId;
  }
  /**
   * @param string
   */
  public function setCreateProductRevision($createProductRevision)
  {
    $this->createProductRevision = $createProductRevision;
  }
  /**
   * @return string
   */
  public function getCreateProductRevision()
  {
    return $this->createProductRevision;
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
   * @param string
   */
  public function setCreativePreApprovalPolicy($creativePreApprovalPolicy)
  {
    $this->creativePreApprovalPolicy = $creativePreApprovalPolicy;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setCreativeSafeFrameCompatibility($creativeSafeFrameCompatibility)
  {
    $this->creativeSafeFrameCompatibility = $creativeSafeFrameCompatibility;
  }
  /**
   * @return string
   */
  public function getCreativeSafeFrameCompatibility()
  {
    return $this->creativeSafeFrameCompatibility;
  }
  /**
   * @param string
   */
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setExternalDealId($externalDealId)
  {
    $this->externalDealId = $externalDealId;
  }
  /**
   * @return string
   */
  public function getExternalDealId()
  {
    return $this->externalDealId;
  }
  /**
   * @param bool
   */
  public function setIsSetupComplete($isSetupComplete)
  {
    $this->isSetupComplete = $isSetupComplete;
  }
  /**
   * @return bool
   */
  public function getIsSetupComplete()
  {
    return $this->isSetupComplete;
  }
  /**
   * @param string
   */
  public function setProgrammaticCreativeSource($programmaticCreativeSource)
  {
    $this->programmaticCreativeSource = $programmaticCreativeSource;
  }
  /**
   * @return string
   */
  public function getProgrammaticCreativeSource()
  {
    return $this->programmaticCreativeSource;
  }
  /**
   * @param string
   */
  public function setProposalId($proposalId)
  {
    $this->proposalId = $proposalId;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setWebPropertyCode($webPropertyCode)
  {
    $this->webPropertyCode = $webPropertyCode;
  }
  /**
   * @return string
   */
  public function getWebPropertyCode()
  {
    return $this->webPropertyCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Deal::class, 'Google_Service_AdExchangeBuyerII_Deal');
