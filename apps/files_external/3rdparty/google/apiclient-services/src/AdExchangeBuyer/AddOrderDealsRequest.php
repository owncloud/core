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

class AddOrderDealsRequest extends \Google\Collection
{
  protected $collection_key = 'deals';
  protected $dealsType = MarketplaceDeal::class;
  protected $dealsDataType = 'array';
  public $proposalRevisionNumber;
  public $updateAction;

  /**
   * @param MarketplaceDeal[]
   */
  public function setDeals($deals)
  {
    $this->deals = $deals;
  }
  /**
   * @return MarketplaceDeal[]
   */
  public function getDeals()
  {
    return $this->deals;
  }
  public function setProposalRevisionNumber($proposalRevisionNumber)
  {
    $this->proposalRevisionNumber = $proposalRevisionNumber;
  }
  public function getProposalRevisionNumber()
  {
    return $this->proposalRevisionNumber;
  }
  public function setUpdateAction($updateAction)
  {
    $this->updateAction = $updateAction;
  }
  public function getUpdateAction()
  {
    return $this->updateAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddOrderDealsRequest::class, 'Google_Service_AdExchangeBuyer_AddOrderDealsRequest');
