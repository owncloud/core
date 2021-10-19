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

namespace Google\Service\Dfareporting;

class BillingRateTieredRate extends \Google\Model
{
  /**
   * @var string
   */
  public $highValue;
  /**
   * @var string
   */
  public $lowValue;
  /**
   * @var string
   */
  public $rateInMicros;

  /**
   * @param string
   */
  public function setHighValue($highValue)
  {
    $this->highValue = $highValue;
  }
  /**
   * @return string
   */
  public function getHighValue()
  {
    return $this->highValue;
  }
  /**
   * @param string
   */
  public function setLowValue($lowValue)
  {
    $this->lowValue = $lowValue;
  }
  /**
   * @return string
   */
  public function getLowValue()
  {
    return $this->lowValue;
  }
  /**
   * @param string
   */
  public function setRateInMicros($rateInMicros)
  {
    $this->rateInMicros = $rateInMicros;
  }
  /**
   * @return string
   */
  public function getRateInMicros()
  {
    return $this->rateInMicros;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingRateTieredRate::class, 'Google_Service_Dfareporting_BillingRateTieredRate');
