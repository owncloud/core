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

use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1AcknowledgeViolationRequest;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1AcknowledgeViolationResponse;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1ListViolationsResponse;
use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1Violation;

/**
 * The "violations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $assuredworkloadsService = new Google\Service\Assuredworkloads(...);
 *   $violations = $assuredworkloadsService->violations;
 *  </code>
 */
class OrganizationsLocationsWorkloadsViolations extends \Google\Service\Resource
{
  /**
   * Acknowledges an existing violation. By acknowledging a violation, users
   * acknowledge the existence of a compliance violation in their workload and
   * decide to ignore it due to a valid business justification. Acknowledgement is
   * a permanent operation and it cannot be reverted. (violations.acknowledge)
   *
   * @param string $name Required. The resource name of the Violation to
   * acknowledge. Format: organizations/{organization}/locations/{location}/worklo
   * ads/{workload}/violations/{violation}
   * @param GoogleCloudAssuredworkloadsV1AcknowledgeViolationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAssuredworkloadsV1AcknowledgeViolationResponse
   */
  public function acknowledge($name, GoogleCloudAssuredworkloadsV1AcknowledgeViolationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', [$params], GoogleCloudAssuredworkloadsV1AcknowledgeViolationResponse::class);
  }
  /**
   * Retrieves Assured Workload Violation based on ID. (violations.get)
   *
   * @param string $name Required. The resource name of the Violation to fetch
   * (ie. Violation.name). Format: organizations/{organization}/locations/{locatio
   * n}/workloads/{workload}/violations/{violation}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAssuredworkloadsV1Violation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudAssuredworkloadsV1Violation::class);
  }
  /**
   * Lists the Violations in the AssuredWorkload Environment. Callers may also
   * choose to read across multiple Workloads as per
   * [AIP-159](https://google.aip.dev/159) by using '-' (the hyphen or dash
   * character) as a wildcard character instead of workload-id in the parent.
   * Format `organizations/{org_id}/locations/{location}/workloads/-`
   * (violations.listOrganizationsLocationsWorkloadsViolations)
   *
   * @param string $parent Required. The Workload name. Format
   * `organizations/{org_id}/locations/{location}/workloads/{workload}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A custom filter for filtering by the
   * Violations properties.
   * @opt_param string interval.endTime The end of the time window.
   * @opt_param string interval.startTime The start of the time window.
   * @opt_param int pageSize Optional. Page size.
   * @opt_param string pageToken Optional. Page token returned from previous
   * request.
   * @return GoogleCloudAssuredworkloadsV1ListViolationsResponse
   */
  public function listOrganizationsLocationsWorkloadsViolations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudAssuredworkloadsV1ListViolationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsLocationsWorkloadsViolations::class, 'Google_Service_Assuredworkloads_Resource_OrganizationsLocationsWorkloadsViolations');
