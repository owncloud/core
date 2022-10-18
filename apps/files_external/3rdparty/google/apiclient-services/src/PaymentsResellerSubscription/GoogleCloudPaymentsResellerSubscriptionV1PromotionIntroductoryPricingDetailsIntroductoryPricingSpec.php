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

class GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetailsIntroductoryPricingSpec extends \Google\Model
{
  protected $discountAmountType = GoogleCloudPaymentsResellerSubscriptionV1Amount::class;
  protected $discountAmountDataType = '';
  /**
   * @var string
   */
  public $discountRatioMicros;
  /**
   * @var int
   */
  public $recurrenceCount;
  /**
   * @var string
   */
  public $regionCode;

  /**
   * @param GoogleCloudPaymentsResellerSubscriptionV1Amount
   */
  public function setDiscountAmount(GoogleCloudPaymentsResellerSubscriptionV1Amount $discountAmount)
  {
    $this->discountAmount = $discountAmount;
  }
  /**
   * @return GoogleCloudPaymentsResellerSubscriptionV1Amount
   */
  public function getDiscountAmount()
  {
    return $this->discountAmount;
  }
  /**
   * @param string
   */
  public function setDiscountRatioMicros($discountRatioMicros)
  {
    $this->discountRatioMicros = $discountRatioMicros;
  }
  /**
   * @return string
   */
  public function getDiscountRatioMicros()
  {
    return $this->discountRatioMicros;
  }
  /**
   * @param int
   */
  public function setRecurrenceCount($recurrenceCount)
  {
    $this->recurrenceCount = $recurrenceCount;
  }
  /**
   * @return int
   */
  public function getRecurrenceCount()
  {
    return $this->recurrenceCount;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetailsIntroductoryPricingSpec::class, 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1PromotionIntroductoryPricingDetailsIntroductoryPricingSpec');
