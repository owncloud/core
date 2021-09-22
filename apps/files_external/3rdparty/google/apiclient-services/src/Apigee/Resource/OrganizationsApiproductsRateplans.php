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

use Google\Service\Apigee\GoogleCloudApigeeV1ListRatePlansResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1RatePlan;

/**
 * The "rateplans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $rateplans = $apigeeService->rateplans;
 *  </code>
 */
class OrganizationsApiproductsRateplans extends \Google\Service\Resource
{
  /**
   * Create a rate plan that is associated with an API product in an organization.
   * Using rate plans, API product owners can monetize their API products by
   * configuring one or more of the following: - Billing frequency - Initial setup
   * fees for using an API product - Payment funding model (postpaid only) - Fixed
   * recurring or consumption-based charges for using an API product - Revenue
   * sharing with developer partners An API product can have multiple rate plans
   * associated with it but *only one* rate plan can be active at any point of
   * time. **Note: From the developer's perspective, they purchase API products
   * not rate plans. (rateplans.create)
   *
   * @param string $parent Required. Name of the API product that is associated
   * with the rate plan. Use the following structure in your request:
   * `organizations/{org}/apiproducts/{apiproduct}`
   * @param GoogleCloudApigeeV1RatePlan $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1RatePlan
   */
  public function create($parent, GoogleCloudApigeeV1RatePlan $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1RatePlan::class);
  }
  /**
   * Deletes a rate plan. (rateplans.delete)
   *
   * @param string $name Required. ID of the rate plan. Use the following
   * structure in your request:
   * `organizations/{org}/apiproducts/{apiproduct}/rateplans/{rateplan}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1RatePlan
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1RatePlan::class);
  }
  /**
   * Gets the details of a rate plan. (rateplans.get)
   *
   * @param string $name Required. Name of the rate plan. Use the following
   * structure in your request:
   * `organizations/{org}/apiproducts/{apiproduct}/rateplans/{rateplan}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1RatePlan
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1RatePlan::class);
  }
  /**
   * Lists all the rate plans for an API product.
   * (rateplans.listOrganizationsApiproductsRateplans)
   *
   * @param string $parent Required. Name of the API product. Use the following
   * structure in your request: `organizations/{org}/apiproducts/{apiproduct}` Use
   * `organizations/{org}/apiproducts/-` to return rate plans for all API products
   * within the organization.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int count Number of rate plans to return in the API call. Use with
   * the `startKey` parameter to provide more targeted filtering. The maximum
   * limit is 1000. Defaults to 100.
   * @opt_param bool expand Flag that specifies whether to expand the results. Set
   * to `true` to get expanded details about each API. Defaults to `false`.
   * @opt_param string orderBy Name of the attribute used for sorting. Valid
   * values include: * `name`: Name of the rate plan. * `state`: State of the rate
   * plan (`DRAFT`, `PUBLISHED`). * `startTime`: Time when the rate plan becomes
   * active. * `endTime`: Time when the rate plan expires. **Note**: Not supported
   * by Apigee at this time.
   * @opt_param string startKey Name of the rate plan from which to start
   * displaying the list of rate plans. If omitted, the list starts from the first
   * item. For example, to view the rate plans from 51-150, set the value of
   * `startKey` to the name of the 51st rate plan and set the value of `count` to
   * 100.
   * @opt_param string state State of the rate plans (`DRAFT`, `PUBLISHED`) that
   * you want to display.
   * @return GoogleCloudApigeeV1ListRatePlansResponse
   */
  public function listOrganizationsApiproductsRateplans($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListRatePlansResponse::class);
  }
  /**
   * Updates an existing rate plan. (rateplans.update)
   *
   * @param string $name Required. Name of the rate plan. Use the following
   * structure in your request:
   * `organizations/{org}/apiproducts/{apiproduct}/rateplans/{rateplan}`
   * @param GoogleCloudApigeeV1RatePlan $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1RatePlan
   */
  public function update($name, GoogleCloudApigeeV1RatePlan $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1RatePlan::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsApiproductsRateplans::class, 'Google_Service_Apigee_Resource_OrganizationsApiproductsRateplans');
