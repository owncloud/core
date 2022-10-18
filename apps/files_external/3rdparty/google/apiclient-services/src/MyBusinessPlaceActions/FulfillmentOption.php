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

namespace Google\Service\MyBusinessPlaceActions;

class FulfillmentOption extends \Google\Collection
{
  protected $collection_key = 'availableDay';
  protected $availableDayType = AvailableDay::class;
  protected $availableDayDataType = 'array';
  protected $feeDetailsType = FeeDetails::class;
  protected $feeDetailsDataType = '';
  /**
   * @var string
   */
  public $fulfillmentType;
  protected $minimumOrderType = Money::class;
  protected $minimumOrderDataType = '';

  /**
   * @param AvailableDay[]
   */
  public function setAvailableDay($availableDay)
  {
    $this->availableDay = $availableDay;
  }
  /**
   * @return AvailableDay[]
   */
  public function getAvailableDay()
  {
    return $this->availableDay;
  }
  /**
   * @param FeeDetails
   */
  public function setFeeDetails(FeeDetails $feeDetails)
  {
    $this->feeDetails = $feeDetails;
  }
  /**
   * @return FeeDetails
   */
  public function getFeeDetails()
  {
    return $this->feeDetails;
  }
  /**
   * @param string
   */
  public function setFulfillmentType($fulfillmentType)
  {
    $this->fulfillmentType = $fulfillmentType;
  }
  /**
   * @return string
   */
  public function getFulfillmentType()
  {
    return $this->fulfillmentType;
  }
  /**
   * @param Money
   */
  public function setMinimumOrder(Money $minimumOrder)
  {
    $this->minimumOrder = $minimumOrder;
  }
  /**
   * @return Money
   */
  public function getMinimumOrder()
  {
    return $this->minimumOrder;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FulfillmentOption::class, 'Google_Service_MyBusinessPlaceActions_FulfillmentOption');
