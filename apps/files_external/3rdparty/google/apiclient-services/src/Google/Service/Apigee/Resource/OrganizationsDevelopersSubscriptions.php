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

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $subscriptions = $apigeeService->subscriptions;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsDevelopersSubscriptions extends Google_Service_Resource
{
  /**
   * Creates a subscription to an API product.  (subscriptions.create)
   *
   * @param string $parent Required. Email address of the developer that is
   * purchasing a subscription to the API product. Use the following structure in
   * your request: `organizations/{org}/developers/{developer_email}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription");
  }
  /**
   * Expires an API product subscription immediately. (subscriptions.expire)
   *
   * @param string $name Required. Name of the API product subscription. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/subscriptions/{subscription}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ExpireDeveloperSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription
   */
  public function expire($name, Google_Service_Apigee_GoogleCloudApigeeV1ExpireDeveloperSubscriptionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('expire', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription");
  }
  /**
   * Gets details for an API product subscription. (subscriptions.get)
   *
   * @param string $name Required. Name of the API product subscription. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/subscriptions/{subscription}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperSubscription");
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
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListDeveloperSubscriptionsResponse
   */
  public function listOrganizationsDevelopersSubscriptions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListDeveloperSubscriptionsResponse");
  }
}
