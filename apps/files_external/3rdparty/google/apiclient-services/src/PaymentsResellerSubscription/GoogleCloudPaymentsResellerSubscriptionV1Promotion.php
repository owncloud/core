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

namespace Google\Service\PaymentsResellerSubscription;

class GoogleCloudPaymentsResellerSubscriptionV1Promotion extends \Google\Collection
{
  protected $collection_key = 'titles';
  public $applicableProducts;
  public $endTime;
  protected $freeTrialDurationType = GoogleCloudPaymentsResellerSubscriptionV1Duration::class;
  protected $freeTrialDurationDataType = '';
  protected $introductoryPricingDetailsType = GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetails::class;
  protected $introductoryPricingDetailsDataType = '';
  public $name;
  public $promotionType;
  public $regionCodes;
  public $startTime;
  protected $titlesType = GoogleTypeLocalizedText::class;
  protected $titlesDataType = 'array';

  public function setApplicableProducts($applicableProducts)
  {
    $this->applicableProducts = $applicableProducts;
  }
  public function getApplicableProducts()
  {
    return $this->applicableProducts;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function setFreeTrialDuration(GoogleCloudPaymentsResellerSubscriptionV1Duration $freeTrialDuration)
  {
    $this->freeTrialDuration = $freeTrialDuration;
  }
  /**
   * @return GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function getFreeTrialDuration()
  {
    return $this->freeTrialDuration;
  }
  /**
   * @param GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetails
   */
  public function setIntroductoryPricingDetails(GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetails $introductoryPricingDetails)
  {
    $this->introductoryPricingDetails = $introductoryPricingDetails;
  }
  /**
   * @return GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetails
   */
  public function getIntroductoryPricingDetails()
  {
    return $this->introductoryPricingDetails;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPromotionType($promotionType)
  {
    $this->promotionType = $promotionType;
  }
  public function getPromotionType()
  {
    return $this->promotionType;
  }
  public function setRegionCodes($regionCodes)
  {
    $this->regionCodes = $regionCodes;
  }
  public function getRegionCodes()
  {
    return $this->regionCodes;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param GoogleTypeLocalizedText[]
   */
  public function setTitles($titles)
  {
    $this->titles = $titles;
  }
  /**
   * @return GoogleTypeLocalizedText[]
   */
  public function getTitles()
  {
    return $this->titles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPaymentsResellerSubscriptionV1Promotion::class, 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Promotion');
