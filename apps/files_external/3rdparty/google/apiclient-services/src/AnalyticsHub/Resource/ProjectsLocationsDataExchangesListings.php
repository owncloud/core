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

namespace Google\Service\AnalyticsHub\Resource;

use Google\Service\AnalyticsHub\AnalyticshubEmpty;
use Google\Service\AnalyticsHub\GetIamPolicyRequest;
use Google\Service\AnalyticsHub\ListListingsResponse;
use Google\Service\AnalyticsHub\Listing;
use Google\Service\AnalyticsHub\Policy;
use Google\Service\AnalyticsHub\SetIamPolicyRequest;
use Google\Service\AnalyticsHub\SubscribeListingRequest;
use Google\Service\AnalyticsHub\SubscribeListingResponse;
use Google\Service\AnalyticsHub\TestIamPermissionsRequest;
use Google\Service\AnalyticsHub\TestIamPermissionsResponse;

/**
 * The "listings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticshubService = new Google\Service\AnalyticsHub(...);
 *   $listings = $analyticshubService->listings;
 *  </code>
 */
class ProjectsLocationsDataExchangesListings extends \Google\Service\Resource
{
  /**
   * Creates a new listing. (listings.create)
   *
   * @param string $parent Required. The parent resource path of the listing. e.g.
   * `projects/myproject/locations/US/dataExchanges/123`.
   * @param Listing $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string listingId Required. The ID of the listing to create. Must
   * contain only Unicode letters, numbers (0-9), underscores (_). Should not use
   * characters that require URL-escaping, or characters outside of ASCII, spaces.
   * Max length: 100 bytes.
   * @return Listing
   */
  public function create($parent, Listing $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Listing::class);
  }
  /**
   * Deletes a listing. (listings.delete)
   *
   * @param string $name Required. Resource name of the listing to delete. e.g.
   * `projects/myproject/locations/US/dataExchanges/123/listings/456`.
   * @param array $optParams Optional parameters.
   * @return AnalyticshubEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AnalyticshubEmpty::class);
  }
  /**
   * Gets the details of a listing. (listings.get)
   *
   * @param string $name Required. The resource name of the listing. e.g.
   * `projects/myproject/locations/US/dataExchanges/123/listings/456`.
   * @param array $optParams Optional parameters.
   * @return Listing
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Listing::class);
  }
  /**
   * Gets the IAM policy. (listings.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists all listings in a given project and location.
   * (listings.listProjectsLocationsDataExchangesListings)
   *
   * @param string $parent Required. The parent resource path of the listing. e.g.
   * `projects/myproject/locations/US/dataExchanges/123`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response page. Leverage the page tokens to iterate through the entire
   * collection.
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results.
   * @return ListListingsResponse
   */
  public function listProjectsLocationsDataExchangesListings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListListingsResponse::class);
  }
  /**
   * Updates an existing listing. (listings.patch)
   *
   * @param string $name Output only. The resource name of the listing. e.g.
   * `projects/myproject/locations/US/dataExchanges/123/listings/456`
   * @param Listing $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Field mask specifies the fields to
   * update in the listing resource. The fields specified in the `updateMask` are
   * relative to the resource and are not a full request.
   * @return Listing
   */
  public function patch($name, Listing $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Listing::class);
  }
  /**
   * Sets the IAM policy. (listings.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Subscribes to a listing. Currently, with Analytics Hub, you can create
   * listings that reference only BigQuery datasets. Upon subscription to a
   * listing for a BigQuery dataset, Analytics Hub creates a linked dataset in the
   * subscriber's project. (listings.subscribe)
   *
   * @param string $name Required. Resource name of the listing that you want to
   * subscribe to. e.g.
   * `projects/myproject/locations/US/dataExchanges/123/listings/456`.
   * @param SubscribeListingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SubscribeListingResponse
   */
  public function subscribe($name, SubscribeListingRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('subscribe', [$params], SubscribeListingResponse::class);
  }
  /**
   * Returns the permissions that a caller has. (listings.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDataExchangesListings::class, 'Google_Service_AnalyticsHub_Resource_ProjectsLocationsDataExchangesListings');
