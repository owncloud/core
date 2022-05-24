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

class GoogleCloudPaymentsResellerSubscriptionV1SubscriptionPromotionSpec extends \Google\Model
{
  protected $freeTrialDurationType = GoogleCloudPaymentsResellerSubscriptionV1Duration::class;
  protected $freeTrialDurationDataType = '';
  protected $introductoryPricingDetailsType = GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetails::class;
  protected $introductoryPricingDetailsDataType = '';
  /**
   * @var string
   */
  public $promotion;
  /**
   * @var string
   */
  public $type;

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
  /**
   * @param string
   */
  public function setPromotion($promotion)
  {
    $this->promotion = $promotion;
  }
  /**
   * @return string
   */
  public function getPromotion()
  {
    return $this->promotion;
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
class_alias(GoogleCloudPaymentsResellerSubscriptionV1SubscriptionPromotionSpec::class, 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1SubscriptionPromotionSpec');
