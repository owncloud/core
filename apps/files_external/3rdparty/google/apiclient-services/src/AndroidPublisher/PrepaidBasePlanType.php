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

namespace Google\Service\AndroidPublisher;

class PrepaidBasePlanType extends \Google\Model
{
  /**
   * @var string
   */
  public $billingPeriodDuration;
  /**
   * @var string
   */
  public $timeExtension;

  /**
   * @param string
   */
  public function setBillingPeriodDuration($billingPeriodDuration)
  {
    $this->billingPeriodDuration = $billingPeriodDuration;
  }
  /**
   * @return string
   */
  public function getBillingPeriodDuration()
  {
    return $this->billingPeriodDuration;
  }
  /**
   * @param string
   */
  public function setTimeExtension($timeExtension)
  {
    $this->timeExtension = $timeExtension;
  }
  /**
   * @return string
   */
  public function getTimeExtension()
  {
    return $this->timeExtension;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrepaidBasePlanType::class, 'Google_Service_AndroidPublisher_PrepaidBasePlanType');
