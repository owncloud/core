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

namespace Google\Service\AccessApproval\Resource;

use Google\Service\AccessApproval\ApprovalRequest;
use Google\Service\AccessApproval\ApproveApprovalRequestMessage;
use Google\Service\AccessApproval\DismissApprovalRequestMessage;
use Google\Service\AccessApproval\InvalidateApprovalRequestMessage;
use Google\Service\AccessApproval\ListApprovalRequestsResponse;

/**
 * The "approvalRequests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accessapprovalService = new Google\Service\AccessApproval(...);
 *   $approvalRequests = $accessapprovalService->approvalRequests;
 *  </code>
 */
class OrganizationsApprovalRequests extends \Google\Service\Resource
{
  /**
   * Approves a request and returns the updated ApprovalRequest. Returns NOT_FOUND
   * if the request does not exist. Returns FAILED_PRECONDITION if the request
   * exists but is not in a pending state. (approvalRequests.approve)
   *
   * @param string $name Name of the approval request to approve.
   * @param ApproveApprovalRequestMessage $postBody
   * @param array $optParams Optional parameters.
   * @return ApprovalRequest
   */
  public function approve($name, ApproveApprovalRequestMessage $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('approve', [$params], ApprovalRequest::class);
  }
  /**
   * Dismisses a request. Returns the updated ApprovalRequest. NOTE: This does not
   * deny access to the resource if another request has been made and approved. It
   * is equivalent in effect to ignoring the request altogether. Returns NOT_FOUND
   * if the request does not exist. Returns FAILED_PRECONDITION if the request
   * exists but is not in a pending state. (approvalRequests.dismiss)
   *
   * @param string $name Name of the ApprovalRequest to dismiss.
   * @param DismissApprovalRequestMessage $postBody
   * @param array $optParams Optional parameters.
   * @return ApprovalRequest
   */
  public function dismiss($name, DismissApprovalRequestMessage $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('dismiss', [$params], ApprovalRequest::class);
  }
  /**
   * Gets an approval request. Returns NOT_FOUND if the request does not exist.
   * (approvalRequests.get)
   *
   * @param string $name The name of the approval request to retrieve. Format:
   * "{projects|folders|organizations}/{id}/approvalRequests/{approval_request}"
   * @param array $optParams Optional parameters.
   * @return ApprovalRequest
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ApprovalRequest::class);
  }
  /**
   * Invalidates an existing ApprovalRequest. Returns the updated ApprovalRequest.
   * NOTE: This does not deny access to the resource if another request has been
   * made and approved. It only invalidates a single approval. Returns
   * FAILED_PRECONDITION if the request exists but is not in an approved state.
   * (approvalRequests.invalidate)
   *
   * @param string $name Name of the ApprovalRequest to invalidate.
   * @param InvalidateApprovalRequestMessage $postBody
   * @param array $optParams Optional parameters.
   * @return ApprovalRequest
   */
  public function invalidate($name, InvalidateApprovalRequestMessage $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('invalidate', [$params], ApprovalRequest::class);
  }
  /**
   * Lists approval requests associated with a project, folder, or organization.
   * Approval requests can be filtered by state (pending, active, dismissed). The
   * order is reverse chronological.
   * (approvalRequests.listOrganizationsApprovalRequests)
   *
   * @param string $parent The parent resource. This may be "projects/{project}",
   * "folders/{folder}", or "organizations/{organization}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter on the type of approval requests to
   * retrieve. Must be one of the following values: * [not set]: Requests that are
   * pending or have active approvals. * ALL: All requests. * PENDING: Only
   * pending requests. * ACTIVE: Only active (i.e. currently approved) requests. *
   * DISMISSED: Only requests that have been dismissed, or requests that are not
   * approved and past expiration. * EXPIRED: Only requests that have been
   * approved, and the approval has expired. * HISTORY: Active, dismissed and
   * expired requests.
   * @opt_param int pageSize Requested page size.
   * @opt_param string pageToken A token identifying the page of results to
   * return.
   * @return ListApprovalRequestsResponse
   */
  public function listOrganizationsApprovalRequests($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListApprovalRequestsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsApprovalRequests::class, 'Google_Service_AccessApproval_Resource_OrganizationsApprovalRequests');
