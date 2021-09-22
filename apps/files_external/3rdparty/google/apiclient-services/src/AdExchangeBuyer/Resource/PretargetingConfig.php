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

use Google\Service\AdExchangeBuyer\PretargetingConfig as PretargetingConfigModel;
use Google\Service\AdExchangeBuyer\PretargetingConfigList;

/**
 * The "pretargetingConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $pretargetingConfig = $adexchangebuyerService->pretargetingConfig;
 *  </code>
 */
class PretargetingConfig extends \Google\Service\Resource
{
  /**
   * Deletes an existing pretargeting config. (pretargetingConfig.delete)
   *
   * @param string $accountId The account id to delete the pretargeting config
   * for.
   * @param string $configId The specific id of the configuration to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $configId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'configId' => $configId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a specific pretargeting configuration (pretargetingConfig.get)
   *
   * @param string $accountId The account id to get the pretargeting config for.
   * @param string $configId The specific id of the configuration to retrieve.
   * @param array $optParams Optional parameters.
   * @return PretargetingConfigModel
   */
  public function get($accountId, $configId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'configId' => $configId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PretargetingConfigModel::class);
  }
  /**
   * Inserts a new pretargeting configuration. (pretargetingConfig.insert)
   *
   * @param string $accountId The account id to insert the pretargeting config
   * for.
   * @param PretargetingConfigModel $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfigModel
   */
  public function insert($accountId, PretargetingConfigModel $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], PretargetingConfigModel::class);
  }
  /**
   * Retrieves a list of the authenticated user's pretargeting configurations.
   * (pretargetingConfig.listPretargetingConfig)
   *
   * @param string $accountId The account id to get the pretargeting configs for.
   * @param array $optParams Optional parameters.
   * @return PretargetingConfigList
   */
  public function listPretargetingConfig($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PretargetingConfigList::class);
  }
  /**
   * Updates an existing pretargeting config. This method supports patch
   * semantics. (pretargetingConfig.patch)
   *
   * @param string $accountId The account id to update the pretargeting config
   * for.
   * @param string $configId The specific id of the configuration to update.
   * @param PretargetingConfigModel $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfigModel
   */
  public function patch($accountId, $configId, PretargetingConfigModel $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'configId' => $configId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PretargetingConfigModel::class);
  }
  /**
   * Updates an existing pretargeting config. (pretargetingConfig.update)
   *
   * @param string $accountId The account id to update the pretargeting config
   * for.
   * @param string $configId The specific id of the configuration to update.
   * @param PretargetingConfigModel $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfigModel
   */
  public function update($accountId, $configId, PretargetingConfigModel $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'configId' => $configId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], PretargetingConfigModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PretargetingConfig::class, 'Google_Service_AdExchangeBuyer_Resource_PretargetingConfig');
