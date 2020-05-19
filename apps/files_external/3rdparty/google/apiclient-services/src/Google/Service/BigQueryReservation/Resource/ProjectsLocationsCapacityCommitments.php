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
 * The "capacityCommitments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google_Service_BigQueryReservation(...);
 *   $capacityCommitments = $bigqueryreservationService->capacityCommitments;
 *  </code>
 */
class Google_Service_BigQueryReservation_Resource_ProjectsLocationsCapacityCommitments extends Google_Service_Resource
{
  /**
   * Creates a new capacity commitment resource. (capacityCommitments.create)
   *
   * @param string $parent Required. Resource name of the parent reservation.
   * E.g.,    projects/myproject/locations/US
   * @param Google_Service_BigQueryReservation_CapacityCommitment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool enforceSingleAdminProjectPerOrg If true, fail the request if
   * another project in the organization has a capacity commitment.
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function create($parent, Google_Service_BigQueryReservation_CapacityCommitment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigQueryReservation_CapacityCommitment");
  }
  /**
   * Deletes a capacity commitment. Attempting to delete capacity commitment
   * before its commitment_end_time will fail with the error code
   * `google.rpc.Code.FAILED_PRECONDITION`. (capacityCommitments.delete)
   *
   * @param string $name Required. Resource name of the capacity commitment to
   * delete. E.g.,    projects/myproject/locations/US/capacityCommitments/123
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_BigqueryreservationEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_BigQueryReservation_BigqueryreservationEmpty");
  }
  /**
   * Returns information about the capacity commitment. (capacityCommitments.get)
   *
   * @param string $name Required. Resource name of the capacity commitment to
   * retrieve. E.g.,    projects/myproject/locations/US/capacityCommitments/123
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigQueryReservation_CapacityCommitment");
  }
  /**
   * Lists all the capacity commitments for the admin project.
   * (capacityCommitments.listProjectsLocationsCapacityCommitments)
   *
   * @param string $parent Required. Resource name of the parent reservation.
   * E.g.,    projects/myproject/locations/US
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return.
   * @return Google_Service_BigQueryReservation_ListCapacityCommitmentsResponse
   */
  public function listProjectsLocationsCapacityCommitments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryReservation_ListCapacityCommitmentsResponse");
  }
  /**
   * Merges capacity commitments of the same plan into a single commitment.
   *
   * The resulting capacity commitment has the greater commitment_end_time out of
   * the to-be-merged capacity commitments.
   *
   * Attempting to merge capacity commitments of different plan will fail with the
   * error code `google.rpc.Code.FAILED_PRECONDITION`. (capacityCommitments.merge)
   *
   * @param string $parent Parent resource that identifies admin project and
   * location e.g., projects/myproject/locations/us
   * @param Google_Service_BigQueryReservation_MergeCapacityCommitmentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function merge($parent, Google_Service_BigQueryReservation_MergeCapacityCommitmentsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('merge', array($params), "Google_Service_BigQueryReservation_CapacityCommitment");
  }
  /**
   * Updates an existing capacity commitment.
   *
   * Only `plan` and `renewal_plan` fields can be updated.
   *
   * Plan can only be changed to a plan of a longer commitment period. Attempting
   * to change to a plan with shorter commitment period will fail with the error
   * code `google.rpc.Code.FAILED_PRECONDITION`. (capacityCommitments.patch)
   *
   * @param string $name Output only. The resource name of the capacity
   * commitment, e.g., `projects/myproject/locations/US/capacityCommitments/123`
   * @param Google_Service_BigQueryReservation_CapacityCommitment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_BigQueryReservation_CapacityCommitment
   */
  public function patch($name, Google_Service_BigQueryReservation_CapacityCommitment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_BigQueryReservation_CapacityCommitment");
  }
  /**
   * Splits capacity commitment to two commitments of the same plan and
   * `commitment_end_time`.
   *
   * A common use case is to enable downgrading commitments.
   *
   * For example, in order to downgrade from 10000 slots to 8000, you might split
   * a 10000 capacity commitment into commitments of 2000 and 8000. Then, you
   * would change the plan of the first one to `FLEX` and then delete it.
   * (capacityCommitments.split)
   *
   * @param string $name Required. The resource name e.g.,:
   * projects/myproject/locations/US/capacityCommitments/123
   * @param Google_Service_BigQueryReservation_SplitCapacityCommitmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_SplitCapacityCommitmentResponse
   */
  public function split($name, Google_Service_BigQueryReservation_SplitCapacityCommitmentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('split', array($params), "Google_Service_BigQueryReservation_SplitCapacityCommitmentResponse");
  }
}
