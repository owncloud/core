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

namespace Google\Service\AdExchangeBuyer;

class MarketplaceLabel extends \Google\Model
{
  public $accountId;
  public $createTimeMs;
  protected $deprecatedMarketplaceDealPartyType = MarketplaceDealParty::class;
  protected $deprecatedMarketplaceDealPartyDataType = '';
  public $label;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setCreateTimeMs($createTimeMs)
  {
    $this->createTimeMs = $createTimeMs;
  }
  public function getCreateTimeMs()
  {
    return $this->createTimeMs;
  }
  /**
   * @param MarketplaceDealParty
   */
  public function setDeprecatedMarketplaceDealParty(MarketplaceDealParty $deprecatedMarketplaceDealParty)
  {
    $this->deprecatedMarketplaceDealParty = $deprecatedMarketplaceDealParty;
  }
  /**
   * @return MarketplaceDealParty
   */
  public function getDeprecatedMarketplaceDealParty()
  {
    return $this->deprecatedMarketplaceDealParty;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MarketplaceLabel::class, 'Google_Service_AdExchangeBuyer_MarketplaceLabel');
