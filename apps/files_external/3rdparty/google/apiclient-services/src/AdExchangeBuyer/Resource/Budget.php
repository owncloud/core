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

namespace Google\Service\AdExchangeBuyer\Resource;

use Google\Service\AdExchangeBuyer\Budget as BudgetModel;

/**
 * The "budget" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $budget = $adexchangebuyerService->budget;
 *  </code>
 */
class Budget extends \Google\Service\Resource
{
  /**
   * Returns the budget information for the adgroup specified by the accountId and
   * billingId. (budget.get)
   *
   * @param string $accountId The account id to get the budget information for.
   * @param string $billingId The billing id to get the budget information for.
   * @param array $optParams Optional parameters.
   * @return BudgetModel
   */
  public function get($accountId, $billingId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'billingId' => $billingId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BudgetModel::class);
  }
  /**
   * Updates the budget amount for the budget of the adgroup specified by the
   * accountId and billingId, with the budget amount in the request. This method
   * supports patch semantics. (budget.patch)
   *
   * @param string $accountId The account id associated with the budget being
   * updated.
   * @param string $billingId The billing id associated with the budget being
   * updated.
   * @param BudgetModel $postBody
   * @param array $optParams Optional parameters.
   * @return BudgetModel
   */
  public function patch($accountId, $billingId, BudgetModel $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'billingId' => $billingId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], BudgetModel::class);
  }
  /**
   * Updates the budget amount for the budget of the adgroup specified by the
   * accountId and billingId, with the budget amount in the request.
   * (budget.update)
   *
   * @param string $accountId The account id associated with the budget being
   * updated.
   * @param string $billingId The billing id associated with the budget being
   * updated.
   * @param BudgetModel $postBody
   * @param array $optParams Optional parameters.
   * @return BudgetModel
   */
  public function update($accountId, $billingId, BudgetModel $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'billingId' => $billingId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], BudgetModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Budget::class, 'Google_Service_AdExchangeBuyer_Resource_Budget');
