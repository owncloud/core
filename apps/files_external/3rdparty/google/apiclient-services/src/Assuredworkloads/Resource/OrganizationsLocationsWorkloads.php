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

namespace Google\Service\Assuredworkloads\Resource;

use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1ListWorkloadsResponse;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesRequest;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesResponse;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1Workload;
use Google\Service\Assuredworkloads\GoogleLongrunningOperation;
use Google\Service\Assuredworkloads\GoogleProtobufEmpty;

/**
 * The "workloads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $assuredworkloadsService = new Google\Service\Assuredworkloads(...);
 *   $workloads = $assuredworkloadsService->workloads;
 *  </code>
 */
class OrganizationsLocationsWorkloads extends \Google\Service\Resource
{
  /**
   * Creates Assured Workload. (workloads.create)
   *
   * @param string $parent Required. The resource name of the new Workload's
   * parent. Must be of the form `organizations/{org_id}/locations/{location_id}`.
   * @param GoogleCloudAssuredworkloadsV1Workload $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalId Optional. A identifier associated with the
   * workload and underlying projects which allows for the break down of billing
   * costs for a workload. The value provided for the identifier will add a label
   * to the workload and contained projects with the identifier as the value.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudAssuredworkloadsV1Workload $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the workload. Make sure that workload's direct children are already
   * in a deleted state, otherwise the request will fail with a
   * FAILED_PRECONDITION error. (workloads.delete)
   *
   * @param string $name Required. The `name` field is used to identify the
   * workload. Format:
   * organizations/{org_id}/locations/{location_id}/workloads/{workload_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. The etag of the workload. If this is
   * provided, it must match the server's etag.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets Assured Workload associated with a CRM Node (workloads.get)
   *
   * @param string $name Required. The resource name of the Workload to fetch.
   * This is the workloads's relative path in the API, formatted as "organizations
   * /{organization_id}/locations/{location_id}/workloads/{workload_id}". For
   * example, "organizations/123/locations/us-east1/workloads/assured-workload-1".
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAssuredworkloadsV1Workload
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudAssuredworkloadsV1Workload::class);
  }
  /**
   * Lists Assured Workloads under a CRM Node.
   * (workloads.listOrganizationsLocationsWorkloads)
   *
   * @param string $parent Required. Parent Resource to list workloads from. Must
   * be of the form `organizations/{org_id}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A custom filter for filtering by properties of a
   * workload. At this time, only filtering by labels is supported.
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token returned from previous request. Page
   * token contains context from previous request. Page token needs to be passed
   * in the second and following requests.
   * @return GoogleCloudAssuredworkloadsV1ListWorkloadsResponse
   */
  public function listOrganizationsLocationsWorkloads($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudAssuredworkloadsV1ListWorkloadsResponse::class);
  }
  /**
   * Updates an existing workload. Currently allows updating of workload
   * display_name and labels. For force updates don't set etag field in the
   * Workload. Only one update operation per workload can be in progress.
   * (workloads.patch)
   *
   * @param string $name Optional. The resource name of the workload. Format:
   * organizations/{organization}/locations/{location}/workloads/{workload} Read-
   * only.
   * @param GoogleCloudAssuredworkloadsV1Workload $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * @return GoogleCloudAssuredworkloadsV1Workload
   */
  public function patch($name, GoogleCloudAssuredworkloadsV1Workload $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudAssuredworkloadsV1Workload::class);
  }
  /**
   * Restrict the list of resources allowed in the Workload environment. The
   * current list of allowed products can be found at https://cloud.google.com
   * /assured-workloads/docs/supported-products In addition to
   * assuredworkloads.workload.update permission, the user should also have
   * orgpolicy.policy.set permission on the folder resource to use this
   * functionality. (workloads.restrictAllowedResources)
   *
   * @param string $name Required. The resource name of the Workload. This is the
   * workloads's relative path in the API, formatted as "organizations/{organizati
   * on_id}/locations/{location_id}/workloads/{workload_id}". For example,
   * "organizations/123/locations/us-east1/workloads/assured-workload-1".
   * @param GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesResponse
   */
  public function restrictAllowedResources($name, GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restrictAllowedResources', [$params], GoogleCloudAssuredworkloadsV1RestrictAllowedResourcesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsLocationsWorkloads::class, 'Google_Service_Assuredworkloads_Resource_OrganizationsLocationsWorkloads');
