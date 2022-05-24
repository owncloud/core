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

namespace Google\Service\Doubleclicksearch;

class Conversion extends \Google\Collection
{
  protected $collection_key = 'customMetric';
  /**
   * @var string
   */
  public $adGroupId;
  /**
   * @var string
   */
  public $adId;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $agencyId;
  /**
   * @var string
   */
  public $attributionModel;
  /**
   * @var string
   */
  public $campaignId;
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $clickId;
  /**
   * @var string
   */
  public $conversionId;
  /**
   * @var string
   */
  public $conversionModifiedTimestamp;
  /**
   * @var string
   */
  public $conversionTimestamp;
  /**
   * @var string
   */
  public $countMillis;
  /**
   * @var string
   */
  public $criterionId;
  /**
   * @var string
   */
  public $currencyCode;
  protected $customDimensionType = CustomDimension::class;
  protected $customDimensionDataType = 'array';
  protected $customMetricType = CustomMetric::class;
  protected $customMetricDataType = 'array';
  /**
   * @var string
   */
  public $deviceType;
  /**
   * @var string
   */
  public $dsConversionId;
  /**
   * @var string
   */
  public $engineAccountId;
  /**
   * @var string
   */
  public $floodlightOrderId;
  /**
   * @var string
   */
  public $inventoryAccountId;
  /**
   * @var string
   */
  public $productCountry;
  /**
   * @var string
   */
  public $productGroupId;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string
   */
  public $productLanguage;
  /**
   * @var string
   */
  public $quantityMillis;
  /**
   * @var string
   */
  public $revenueMicros;
  /**
   * @var string
   */
  public $segmentationId;
  /**
   * @var string
   */
  public $segmentationName;
  /**
   * @var string
   */
  public $segmentationType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $storeId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAdGroupId($adGroupId)
  {
    $this->adGroupId = $adGroupId;
  }
  /**
   * @return string
   */
  public function getAdGroupId()
  {
    return $this->adGroupId;
  }
  /**
   * @param string
   */
  public function setAdId($adId)
  {
    $this->adId = $adId;
  }
  /**
   * @return string
   */
  public function getAdId()
  {
    return $this->adId;
  }
  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  /**
   * @return string
   */
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  /**
   * @param string
   */
  public function setAttributionModel($attributionModel)
  {
    $this->attributionModel = $attributionModel;
  }
  /**
   * @return string
   */
  public function getAttributionModel()
  {
    return $this->attributionModel;
  }
  /**
   * @param string
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  /**
   * @return string
   */
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param string
   */
  public function setClickId($clickId)
  {
    $this->clickId = $clickId;
  }
  /**
   * @return string
   */
  public function getClickId()
  {
    return $this->clickId;
  }
  /**
   * @param string
   */
  public function setConversionId($conversionId)
  {
    $this->conversionId = $conversionId;
  }
  /**
   * @return string
   */
  public function getConversionId()
  {
    return $this->conversionId;
  }
  /**
   * @param string
   */
  public function setConversionModifiedTimestamp($conversionModifiedTimestamp)
  {
    $this->conversionModifiedTimestamp = $conversionModifiedTimestamp;
  }
  /**
   * @return string
   */
  public function getConversionModifiedTimestamp()
  {
    return $this->conversionModifiedTimestamp;
  }
  /**
   * @param string
   */
  public function setConversionTimestamp($conversionTimestamp)
  {
    $this->conversionTimestamp = $conversionTimestamp;
  }
  /**
   * @return string
   */
  public function getConversionTimestamp()
  {
    return $this->conversionTimestamp;
  }
  /**
   * @param string
   */
  public function setCountMillis($countMillis)
  {
    $this->countMillis = $countMillis;
  }
  /**
   * @return string
   */
  public function getCountMillis()
  {
    return $this->countMillis;
  }
  /**
   * @param string
   */
  public function setCriterionId($criterionId)
  {
    $this->criterionId = $criterionId;
  }
  /**
   * @return string
   */
  public function getCriterionId()
  {
    return $this->criterionId;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param CustomDimension[]
   */
  public function setCustomDimension($customDimension)
  {
    $this->customDimension = $customDimension;
  }
  /**
   * @return CustomDimension[]
   */
  public function getCustomDimension()
  {
    return $this->customDimension;
  }
  /**
   * @param CustomMetric[]
   */
  public function setCustomMetric($customMetric)
  {
    $this->customMetric = $customMetric;
  }
  /**
   * @return CustomMetric[]
   */
  public function getCustomMetric()
  {
    return $this->customMetric;
  }
  /**
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param string
   */
  public function setDsConversionId($dsConversionId)
  {
    $this->dsConversionId = $dsConversionId;
  }
  /**
   * @return string
   */
  public function getDsConversionId()
  {
    return $this->dsConversionId;
  }
  /**
   * @param string
   */
  public function setEngineAccountId($engineAccountId)
  {
    $this->engineAccountId = $engineAccountId;
  }
  /**
   * @return string
   */
  public function getEngineAccountId()
  {
    return $this->engineAccountId;
  }
  /**
   * @param string
   */
  public function setFloodlightOrderId($floodlightOrderId)
  {
    $this->floodlightOrderId = $floodlightOrderId;
  }
  /**
   * @return string
   */
  public function getFloodlightOrderId()
  {
    return $this->floodlightOrderId;
  }
  /**
   * @param string
   */
  public function setInventoryAccountId($inventoryAccountId)
  {
    $this->inventoryAccountId = $inventoryAccountId;
  }
  /**
   * @return string
   */
  public function getInventoryAccountId()
  {
    return $this->inventoryAccountId;
  }
  /**
   * @param string
   */
  public function setProductCountry($productCountry)
  {
    $this->productCountry = $productCountry;
  }
  /**
   * @return string
   */
  public function getProductCountry()
  {
    return $this->productCountry;
  }
  /**
   * @param string
   */
  public function setProductGroupId($productGroupId)
  {
    $this->productGroupId = $productGroupId;
  }
  /**
   * @return string
   */
  public function getProductGroupId()
  {
    return $this->productGroupId;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string
   */
  public function setProductLanguage($productLanguage)
  {
    $this->productLanguage = $productLanguage;
  }
  /**
   * @return string
   */
  public function getProductLanguage()
  {
    return $this->productLanguage;
  }
  /**
   * @param string
   */
  public function setQuantityMillis($quantityMillis)
  {
    $this->quantityMillis = $quantityMillis;
  }
  /**
   * @return string
   */
  public function getQuantityMillis()
  {
    return $this->quantityMillis;
  }
  /**
   * @param string
   */
  public function setRevenueMicros($revenueMicros)
  {
    $this->revenueMicros = $revenueMicros;
  }
  /**
   * @return string
   */
  public function getRevenueMicros()
  {
    return $this->revenueMicros;
  }
  /**
   * @param string
   */
  public function setSegmentationId($segmentationId)
  {
    $this->segmentationId = $segmentationId;
  }
  /**
   * @return string
   */
  public function getSegmentationId()
  {
    return $this->segmentationId;
  }
  /**
   * @param string
   */
  public function setSegmentationName($segmentationName)
  {
    $this->segmentationName = $segmentationName;
  }
  /**
   * @return string
   */
  public function getSegmentationName()
  {
    return $this->segmentationName;
  }
  /**
   * @param string
   */
  public function setSegmentationType($segmentationType)
  {
    $this->segmentationType = $segmentationType;
  }
  /**
   * @return string
   */
  public function getSegmentationType()
  {
    return $this->segmentationType;
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
  public function setStoreId($storeId)
  {
    $this->storeId = $storeId;
  }
  /**
   * @return string
   */
  public function getStoreId()
  {
    return $this->storeId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Conversion::class, 'Google_Service_Doubleclicksearch_Conversion');
