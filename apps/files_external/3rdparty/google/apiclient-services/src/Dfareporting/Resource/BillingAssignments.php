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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\BillingAssignment;
use Google\Service\Dfareporting\BillingAssignmentsListResponse;

/**
 * The "billingAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $billingAssignments = $dfareportingService->billingAssignments;
 *  </code>
 */
class BillingAssignments extends \Google\Service\Resource
{
  /**
   * Inserts a new billing assignment and returns the new assignment. Only one of
   * advertiser_id or campaign_id is support per request. If the new assignment
   * has no effect (assigning a campaign to the parent advertiser billing profile
   * or assigning an advertiser to the account billing profile), no assignment
   * will be returned. (billingAssignments.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $billingProfileId Billing profile ID of this billing
   * assignment.
   * @param BillingAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return BillingAssignment
   */
  public function insert($profileId, $billingProfileId, BillingAssignment $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'billingProfileId' => $billingProfileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], BillingAssignment::class);
  }
  /**
   * Retrieves a list of billing assignments.
   * (billingAssignments.listBillingAssignments)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $billingProfileId Billing profile ID of this billing
   * assignment.
   * @param array $optParams Optional parameters.
   * @return BillingAssignmentsListResponse
   */
  public function listBillingAssignments($profileId, $billingProfileId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'billingProfileId' => $billingProfileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BillingAssignmentsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingAssignments::class, 'Google_Service_Dfareporting_Resource_BillingAssignments');
