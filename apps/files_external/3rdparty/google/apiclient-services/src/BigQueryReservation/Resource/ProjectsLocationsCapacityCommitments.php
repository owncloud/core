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

namespace Google\Service\BigQueryReservation\Resource;

use Google\Service\BigQueryReservation\BigqueryreservationEmpty;
use Google\Service\BigQueryReservation\CapacityCommitment;
use Google\Service\BigQueryReservation\ListCapacityCommitmentsResponse;
use Google\Service\BigQueryReservation\MergeCapacityCommitmentsRequest;
use Google\Service\BigQueryReservation\SplitCapacityCommitmentRequest;
use Google\Service\BigQueryReservation\SplitCapacityCommitmentResponse;

/**
 * The "capacityCommitments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google\Service\BigQueryReservation(...);
 *   $capacityCommitments = $bigqueryreservationService->capacityCommitments;
 *  </code>
 */
class ProjectsLocationsCapacityCommitments extends \Google\Service\Resource
{
  /**
   * Creates a new capacity commitment resource. (capacityCommitments.create)
   *
   * @param string $parent Required. Resource name of the parent reservation.
   * E.g., `projects/myproject/locations/US`
   * @param CapacityCommitment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string capacityCommitmentId The optional capacity commitment ID.
   * Capacity commitment name will be generated automatically if this field is
   * empty. This field must only contain lower case alphanumeric characters or
   * dashes. The first and last character cannot be a dash. Max length is 64
   * characters. NOTE: this ID won't be kept if the capacity commitment is split
   * or merged.
   * @opt_param bool enforceSingleAdminProjectPerOrg If true, fail the request if
   * another project in the organization has a capacity commitment.
   * @return CapacityCommitment
   */
  public function create($parent, CapacityCommitment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], CapacityCommitment::class);
  }
  /**
   * Deletes a capacity commitment. Attempting to delete capacity commitment
   * before its commitment_end_time will fail with the error code
   * `google.rpc.Code.FAILED_PRECONDITION`. (capacityCommitments.delete)
   *
   * @param string $name Required. Resource name of the capacity commitment to
   * delete. E.g., `projects/myproject/locations/US/capacityCommitments/123`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Can be used to force delete commitments even if
   * assignments exist. Deleting commitments with assignments may cause queries to
   * fail if they no longer have access to slots.
   * @return BigqueryreservationEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigqueryreservationEmpty::class);
  }
  /**
   * Returns information about the capacity commitment. (capacityCommitments.get)
   *
   * @param string $name Required. Resource name of the capacity commitment to
   * retrieve. E.g., `projects/myproject/locations/US/capacityCommitments/123`
   * @param array $optParams Optional parameters.
   * @return CapacityCommitment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CapacityCommitment::class);
  }
  /**
   * Lists all the capacity commitments for the admin project.
   * (capacityCommitments.listProjectsLocationsCapacityCommitments)
   *
   * @param string $parent Required. Resource name of the parent reservation.
   * E.g., `projects/myproject/locations/US`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListCapacityCommitmentsResponse
   */
  public function listProjectsLocationsCapacityCommitments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCapacityCommitmentsResponse::class);
  }
  /**
   * Merges capacity commitments of the same plan into a single commitment. The
   * resulting capacity commitment has the greater commitment_end_time out of the
   * to-be-merged capacity commitments. Attempting to merge capacity commitments
   * of different plan will fail with the error code
   * `google.rpc.Code.FAILED_PRECONDITION`. (capacityCommitments.merge)
   *
   * @param string $parent Parent resource that identifies admin project and
   * location e.g., `projects/myproject/locations/us`
   * @param MergeCapacityCommitmentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CapacityCommitment
   */
  public function merge($parent, MergeCapacityCommitmentsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('merge', [$params], CapacityCommitment::class);
  }
  /**
   * Updates an existing capacity commitment. Only `plan` and `renewal_plan`
   * fields can be updated. Plan can only be changed to a plan of a longer
   * commitment period. Attempting to change to a plan with shorter commitment
   * period will fail with the error code `google.rpc.Code.FAILED_PRECONDITION`.
   * (capacityCommitments.patch)
   *
   * @param string $name Output only. The resource name of the capacity
   * commitment, e.g., `projects/myproject/locations/US/capacityCommitments/123`
   * The commitment_id must only contain lower case alphanumeric characters or
   * dashes. It must start with a letter and must not end with a dash. Its maximum
   * length is 64 characters.
   * @param CapacityCommitment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return CapacityCommitment
   */
  public function patch($name, CapacityCommitment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CapacityCommitment::class);
  }
  /**
   * Splits capacity commitment to two commitments of the same plan and
   * `commitment_end_time`. A common use case is to enable downgrading
   * commitments. For example, in order to downgrade from 10000 slots to 8000, you
   * might split a 10000 capacity commitment into commitments of 2000 and 8000.
   * Then, you delete the first one after the commitment end time passes.
   * (capacityCommitments.split)
   *
   * @param string $name Required. The resource name e.g.,:
   * `projects/myproject/locations/US/capacityCommitments/123`
   * @param SplitCapacityCommitmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SplitCapacityCommitmentResponse
   */
  public function split($name, SplitCapacityCommitmentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('split', [$params], SplitCapacityCommitmentResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCapacityCommitments::class, 'Google_Service_BigQueryReservation_Resource_ProjectsLocationsCapacityCommitments');
