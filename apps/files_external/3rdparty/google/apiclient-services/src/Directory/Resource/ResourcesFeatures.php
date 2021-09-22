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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\Feature;
use Google\Service\Directory\FeatureRename;
use Google\Service\Directory\Features;

/**
 * The "features" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $features = $adminService->features;
 *  </code>
 */
class ResourcesFeatures extends \Google\Service\Resource
{
  /**
   * Deletes a feature. (features.delete)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $featureKey The unique ID of the feature to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $featureKey, $optParams = [])
  {
    $params = ['customer' => $customer, 'featureKey' => $featureKey];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a feature. (features.get)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $featureKey The unique ID of the feature to retrieve.
   * @param array $optParams Optional parameters.
   * @return Feature
   */
  public function get($customer, $featureKey, $optParams = [])
  {
    $params = ['customer' => $customer, 'featureKey' => $featureKey];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Feature::class);
  }
  /**
   * Inserts a feature. (features.insert)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param Feature $postBody
   * @param array $optParams Optional parameters.
   * @return Feature
   */
  public function insert($customer, Feature $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Feature::class);
  }
  /**
   * Retrieves a list of features for an account. (features.listResourcesFeatures)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @return Features
   */
  public function listResourcesFeatures($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Features::class);
  }
  /**
   * Patches a feature. (features.patch)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $featureKey The unique ID of the feature to update.
   * @param Feature $postBody
   * @param array $optParams Optional parameters.
   * @return Feature
   */
  public function patch($customer, $featureKey, Feature $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'featureKey' => $featureKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Feature::class);
  }
  /**
   * Renames a feature. (features.rename)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $oldName The unique ID of the feature to rename.
   * @param FeatureRename $postBody
   * @param array $optParams Optional parameters.
   */
  public function rename($customer, $oldName, FeatureRename $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'oldName' => $oldName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rename', [$params]);
  }
  /**
   * Updates a feature. (features.update)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $featureKey The unique ID of the feature to update.
   * @param Feature $postBody
   * @param array $optParams Optional parameters.
   * @return Feature
   */
  public function update($customer, $featureKey, Feature $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'featureKey' => $featureKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Feature::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcesFeatures::class, 'Google_Service_Directory_Resource_ResourcesFeatures');
