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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingModelsMediaRentalInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $activatePeriodSec;
  /**
   * @var string
   */
  public $grantPeriodSec;
  /**
   * @var string
   */
  public $purchaseTimestampSec;
  /**
   * @var string
   */
  public $validUntilTimestampSec;

  /**
   * @param string
   */
  public function setActivatePeriodSec($activatePeriodSec)
  {
    $this->activatePeriodSec = $activatePeriodSec;
  }
  /**
   * @return string
   */
  public function getActivatePeriodSec()
  {
    return $this->activatePeriodSec;
  }
  /**
   * @param string
   */
  public function setGrantPeriodSec($grantPeriodSec)
  {
    $this->grantPeriodSec = $grantPeriodSec;
  }
  /**
   * @return string
   */
  public function getGrantPeriodSec()
  {
    return $this->grantPeriodSec;
  }
  /**
   * @param string
   */
  public function setPurchaseTimestampSec($purchaseTimestampSec)
  {
    $this->purchaseTimestampSec = $purchaseTimestampSec;
  }
  /**
   * @return string
   */
  public function getPurchaseTimestampSec()
  {
    return $this->purchaseTimestampSec;
  }
  /**
   * @param string
   */
  public function setValidUntilTimestampSec($validUntilTimestampSec)
  {
    $this->validUntilTimestampSec = $validUntilTimestampSec;
  }
  /**
   * @return string
   */
  public function getValidUntilTimestampSec()
  {
    return $this->validUntilTimestampSec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaRentalInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaRentalInfo');
