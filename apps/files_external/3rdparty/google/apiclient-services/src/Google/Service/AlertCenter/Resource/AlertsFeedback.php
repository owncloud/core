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
 * The "feedback" collection of methods.
 * Typical usage is:
 *  <code>
 *   $alertcenterService = new Google_Service_AlertCenter(...);
 *   $feedback = $alertcenterService->feedback;
 *  </code>
 */
class Google_Service_AlertCenter_Resource_AlertsFeedback extends Google_Service_Resource
{
  /**
   * Creates new feedback for an alert. Attempting to create a feedback for a non-
   * existent alert returns `NOT_FOUND` error. Attempting to create a feedback for
   * an alert that is marked for deletion returns `FAILED_PRECONDITION' error.
   * (feedback.create)
   *
   * @param string $alertId Required. The identifier of the alert this feedback
   * belongs to.
   * @param Google_Service_AlertCenter_AlertFeedback $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert is associated with.
   * Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_AlertFeedback
   */
  public function create($alertId, Google_Service_AlertCenter_AlertFeedback $postBody, $optParams = array())
  {
    $params = array('alertId' => $alertId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AlertCenter_AlertFeedback");
  }
  /**
   * Lists all the feedback for an alert. Attempting to list feedbacks for a non-
   * existent alert returns `NOT_FOUND` error. (feedback.listAlertsFeedback)
   *
   * @param string $alertId Required. The alert identifier. The "-" wildcard could
   * be used to represent all alerts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert feedback are
   * associated with. Inferred from the caller identity if not provided.
   * @opt_param string filter Optional. A query string for filtering alert
   * feedback results. For more details, see [Query filters](/admin-
   * sdk/alertcenter/guides/query-filters) and [Supported query filter fields
   * ](/admin-sdk/alertcenter/reference/filter-fields#alerts.feedback.list).
   * @return Google_Service_AlertCenter_ListAlertFeedbackResponse
   */
  public function listAlertsFeedback($alertId, $optParams = array())
  {
    $params = array('alertId' => $alertId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AlertCenter_ListAlertFeedbackResponse");
  }
}
