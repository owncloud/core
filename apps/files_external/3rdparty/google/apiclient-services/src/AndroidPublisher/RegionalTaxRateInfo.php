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

class RegionalTaxRateInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $eligibleForStreamingServiceTaxRate;
  /**
   * @var string
   */
  public $taxTier;

  /**
   * @param bool
   */
  public function setEligibleForStreamingServiceTaxRate($eligibleForStreamingServiceTaxRate)
  {
    $this->eligibleForStreamingServiceTaxRate = $eligibleForStreamingServiceTaxRate;
  }
  /**
   * @return bool
   */
  public function getEligibleForStreamingServiceTaxRate()
  {
    return $this->eligibleForStreamingServiceTaxRate;
  }
  /**
   * @param string
   */
  public function setTaxTier($taxTier)
  {
    $this->taxTier = $taxTier;
  }
  /**
   * @return string
   */
  public function getTaxTier()
  {
    return $this->taxTier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionalTaxRateInfo::class, 'Google_Service_AndroidPublisher_RegionalTaxRateInfo');
