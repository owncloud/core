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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1DeveloperSubscription;
use Google\Service\Apigee\GoogleCloudApigeeV1ExpireDeveloperSubscriptionRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1ListDeveloperSubscriptionsResponse;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $subscriptions = $apigeeService->subscriptions;
 *  </code>
 */
class OrganizationsDevelopersSubscriptions extends \Google\Service\Resource
{
  /**
   * Creates a subscription to an API product.  (subscriptions.create)
   *
   * @param string $parent Required. Email address of the developer that is
   * purchasing a subscription to the API product. Use the following structure in
   * your request: `organizations/{org}/developers/{developer_email}`
   * @param GoogleCloudApigeeV1DeveloperSubscription $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperSubscription
   */
  public function create($parent, GoogleCloudApigeeV1DeveloperSubscription $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1DeveloperSubscription::class);
  }
  /**
   * Expires an API product subscription immediately. (subscriptions.expire)
   *
   * @param string $name Required. Name of the API product subscription. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/subscriptions/{subscription}`
   * @param GoogleCloudApigeeV1ExpireDeveloperSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperSubscription
   */
  public function expire($name, GoogleCloudApigeeV1ExpireDeveloperSubscriptionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('expire', [$params], GoogleCloudApigeeV1DeveloperSubscription::class);
  }
  /**
   * Gets details for an API product subscription. (subscriptions.get)
   *
   * @param string $name Required. Name of the API product subscription. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/subscriptions/{subscription}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperSubscription
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1DeveloperSubscription::class);
  }
  /**
   * Lists all API product subscriptions for a developer.
   * (subscriptions.listOrganizationsDevelopersSubscriptions)
   *
   * @param string $parent Required. Email address of the developer. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int count Number of API product subscriptions to return in the API
   * call. Use with `startKey` to provide more targeted filtering. Defaults to
   * 100. The maximum limit is 1000.
   * @opt_param string startKey Name of the API product subscription from which to
   * start displaying the list of subscriptions. If omitted, the list starts from
   * the first item. For example, to view the API product subscriptions from
   * 51-150, set the value of `startKey` to the name of the 51st subscription and
   * set the value of `count` to 100.
   * @return GoogleCloudApigeeV1ListDeveloperSubscriptionsResponse
   */
  public function listOrganizationsDevelopersSubscriptions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListDeveloperSubscriptionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDevelopersSubscriptions::class, 'Google_Service_Apigee_Resource_OrganizationsDevelopersSubscriptions');
