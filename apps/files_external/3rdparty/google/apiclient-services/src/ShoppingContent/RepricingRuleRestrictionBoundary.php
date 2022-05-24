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

namespace Google\Service\ShoppingContent;

class RepricingRuleRestrictionBoundary extends \Google\Model
{
  /**
   * @var int
   */
  public $percentageDelta;
  /**
   * @var string
   */
  public $priceDelta;

  /**
   * @param int
   */
  public function setPercentageDelta($percentageDelta)
  {
    $this->percentageDelta = $percentageDelta;
  }
  /**
   * @return int
   */
  public function getPercentageDelta()
  {
    return $this->percentageDelta;
  }
  /**
   * @param string
   */
  public function setPriceDelta($priceDelta)
  {
    $this->priceDelta = $priceDelta;
  }
  /**
   * @return string
   */
  public function getPriceDelta()
  {
    return $this->priceDelta;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepricingRuleRestrictionBoundary::class, 'Google_Service_ShoppingContent_RepricingRuleRestrictionBoundary');
