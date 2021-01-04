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

class Google_Service_AdExchangeBuyerII_Deal extends Google_Collection
{
  protected $collection_key = 'targetingCriterion';
  public $availableEndTime;
  public $availableStartTime;
  protected $buyerPrivateDataType = 'Google_Service_AdExchangeBuyerII_PrivateData';
  protected $buyerPrivateDataDataType = '';
  public $createProductId;
  public $createProductRevision;
  public $createTime;
  public $creativePreApprovalPolicy;
  protected $creativeRestrictionsType = 'Google_Service_AdExchangeBuyerII_CreativeRestrictions';
  protected $creativeRestrictionsDataType = '';
  public $creativeSafeFrameCompatibility;
  public $dealId;
  protected $dealServingMetadataType = 'Google_Service_AdExchangeBuyerII_DealServingMetadata';
  protected $dealServingMetadataDataType = '';
  protected $dealTermsType = 'Google_Service_AdExchangeBuyerII_DealTerms';
  protected $dealTermsDataType = '';
  protected $deliveryControlType = 'Google_Service_AdExchangeBuyerII_DeliveryControl';
  protected $deliveryControlDataType = '';
  public $description;
  public $displayName;
  public $externalDealId;
  public $isSetupComplete;
  public $programmaticCreativeSource;
  public $proposalId;
  protected $sellerContactsType = 'Google_Service_AdExchangeBuyerII_ContactInformation';
  protected $sellerContactsDataType = 'array';
  public $syndicationProduct;
  protected $targetingType = 'Google_Service_AdExchangeBuyerII_MarketplaceTargeting';
  protected $targetingDataType = '';
  protected $targetingCriterionType = 'Google_Service_AdExchangeBuyerII_TargetingCriteria';
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
   * @param Google_Service_AdExchangeBuyerII_CreativeRestrictions
   */
  public function setCreativeRestrictions(Google_Service_AdExchangeBuyerII_CreativeRestrictions $creativeRestrictions)
  {
    $this->creativeRestrictions = $creativeRestrictions;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CreativeRestrictions
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
   * @param Google_Service_AdExchangeBuyerII_DealServingMetadata
   */
  public function setDealServingMetadata(Google_Service_AdExchangeBuyerII_DealServingMetadata $dealServingMetadata)
  {
    $this->dealServingMetadata = $dealServingMetadata;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_DealServingMetadata
   */
  public function getDealServingMetadata()
  {
    return $this->dealServingMetadata;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_DealTerms
   */
  public function setDealTerms(Google_Service_AdExchangeBuyerII_DealTerms $dealTerms)
  {
    $this->dealTerms = $dealTerms;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_DealTerms
   */
  public function getDealTerms()
  {
    return $this->dealTerms;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_DeliveryControl
   */
  public function setDeliveryControl(Google_Service_AdExchangeBuyerII_DeliveryControl $deliveryControl)
  {
    $this->deliveryControl = $deliveryControl;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_DeliveryControl
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
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  public function getSyndicationProduct()
  {
    return $this->syndicationProduct;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_MarketplaceTargeting
   */
  public function setTargeting(Google_Service_AdExchangeBuyerII_MarketplaceTargeting $targeting)
  {
    $this->targeting = $targeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MarketplaceTargeting
   */
  public function getTargeting()
  {
    return $this->targeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_TargetingCriteria[]
   */
  public function setTargetingCriterion($targetingCriterion)
  {
    $this->targetingCriterion = $targetingCriterion;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_TargetingCriteria[]
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
