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
 * The "approvalRequests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accessapprovalService = new Google_Service_AccessApproval(...);
 *   $approvalRequests = $accessapprovalService->approvalRequests;
 *  </code>
 */
class Google_Service_AccessApproval_Resource_FoldersApprovalRequests extends Google_Service_Resource
{
  /**
   * Approves a request and returns the updated ApprovalRequest. Returns NOT_FOUND
   * if the request does not exist. Returns FAILED_PRECONDITION if the request
   * exists but is not in a pending state. (approvalRequests.approve)
   *
   * @param string $name Name of the approval request to approve.
   * @param Google_Service_AccessApproval_ApproveApprovalRequestMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessApproval_ApprovalRequest
   */
  public function approve($name, Google_Service_AccessApproval_ApproveApprovalRequestMessage $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('approve', array($params), "Google_Service_AccessApproval_ApprovalRequest");
  }
  /**
   * Dismisses a request. Returns the updated ApprovalRequest. NOTE: This does not
   * deny access to the resource if another request has been made and approved. It
   * is equivalent in effect to ignoring the request altogether. Returns NOT_FOUND
   * if the request does not exist. Returns FAILED_PRECONDITION if the request
   * exists but is not in a pending state. (approvalRequests.dismiss)
   *
   * @param string $name Name of the ApprovalRequest to dismiss.
   * @param Google_Service_AccessApproval_DismissApprovalRequestMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessApproval_ApprovalRequest
   */
  public function dismiss($name, Google_Service_AccessApproval_DismissApprovalRequestMessage $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('dismiss', array($params), "Google_Service_AccessApproval_ApprovalRequest");
  }
  /**
   * Gets an approval request. Returns NOT_FOUND if the request does not exist.
   * (approvalRequests.get)
   *
   * @param string $name Name of the approval request to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessApproval_ApprovalRequest
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AccessApproval_ApprovalRequest");
  }
  /**
   * Lists approval requests associated with a project, folder, or organization.
   * Approval requests can be filtered by state (pending, active, dismissed). The
   * order is reverse chronological.
   * (approvalRequests.listFoldersApprovalRequests)
   *
   * @param string $parent The parent resource. This may be "projects/{project}",
   * "folders/{folder}", or "organizations/{organization}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter on the type of approval requests to
   * retrieve. Must be one of the following values: * [not set]: Requests that are
   * pending or have active approvals. * ALL: All requests. * PENDING: Only
   * pending requests. * ACTIVE: Only active (i.e. currently approved) requests. *
   * DISMISSED: Only requests that have been dismissed, or requests that . are not
   * approved and past expiration. * EXPIRED: Only requests that have been
   * approved, and the approval has expired. * HISTORY: Active, dismissed and
   * expired requests.
   * @opt_param int pageSize Requested page size.
   * @opt_param string pageToken A token identifying the page of results to
   * return.
   * @return Google_Service_AccessApproval_ListApprovalRequestsResponse
   */
  public function listFoldersApprovalRequests($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AccessApproval_ListApprovalRequestsResponse");
  }
}
