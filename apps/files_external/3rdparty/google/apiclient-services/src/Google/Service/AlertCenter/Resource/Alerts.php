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
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $alertcenterService = new Google_Service_AlertCenter(...);
 *   $alerts = $alertcenterService->alerts;
 *  </code>
 */
class Google_Service_AlertCenter_Resource_Alerts extends Google_Service_Resource
{
  /**
   * Performs batch delete operation on alerts. (alerts.batchDelete)
   *
   * @param Google_Service_AlertCenter_BatchDeleteAlertsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AlertCenter_BatchDeleteAlertsResponse
   */
  public function batchDelete(Google_Service_AlertCenter_BatchDeleteAlertsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_AlertCenter_BatchDeleteAlertsResponse");
  }
  /**
   * Performs batch undelete operation on alerts. (alerts.batchUndelete)
   *
   * @param Google_Service_AlertCenter_BatchUndeleteAlertsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AlertCenter_BatchUndeleteAlertsResponse
   */
  public function batchUndelete(Google_Service_AlertCenter_BatchUndeleteAlertsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUndelete', array($params), "Google_Service_AlertCenter_BatchUndeleteAlertsResponse");
  }
  /**
   * Marks the specified alert for deletion. An alert that has been marked for
   * deletion is removed from Alert Center after 30 days. Marking an alert for
   * deletion has no effect on an alert which has already been marked for
   * deletion. Attempting to mark a nonexistent alert for deletion results in a
   * `NOT_FOUND` error. (alerts.delete)
   *
   * @param string $alertId Required. The identifier of the alert to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert is associated with.
   * Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_AlertcenterEmpty
   */
  public function delete($alertId, $optParams = array())
  {
    $params = array('alertId' => $alertId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AlertCenter_AlertcenterEmpty");
  }
  /**
   * Gets the specified alert. Attempting to get a nonexistent alert returns
   * `NOT_FOUND` error. (alerts.get)
   *
   * @param string $alertId Required. The identifier of the alert to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert is associated with.
   * Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_Alert
   */
  public function get($alertId, $optParams = array())
  {
    $params = array('alertId' => $alertId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AlertCenter_Alert");
  }
  /**
   * Returns the metadata of an alert. Attempting to get metadata for a non-
   * existent alert returns `NOT_FOUND` error. (alerts.getMetadata)
   *
   * @param string $alertId Required. The identifier of the alert this metadata
   * belongs to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert metadata is
   * associated with. Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_AlertMetadata
   */
  public function getMetadata($alertId, $optParams = array())
  {
    $params = array('alertId' => $alertId);
    $params = array_merge($params, $optParams);
    return $this->call('getMetadata', array($params), "Google_Service_AlertCenter_AlertMetadata");
  }
  /**
   * Lists the alerts. (alerts.listAlerts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alerts are associated
   * with. Inferred from the caller identity if not provided.
   * @opt_param string filter Optional. A query string for filtering alert
   * results. For more details, see [Query filters](https://developers.google.com
   * /admin-sdk/alertcenter/guides/query-filters) and [Supported query filter
   * fields](https://developers.google.com/admin-sdk/alertcenter/reference/filter-
   * fields#alerts.list).
   * @opt_param string orderBy Optional. The sort order of the list results. If
   * not specified results may be returned in arbitrary order. You can sort the
   * results in descending order based on the creation timestamp using
   * `order_by="create_time desc"`. Currently, supported sorting are `create_time
   * asc`, `create_time desc`, `update_time desc`
   * @opt_param int pageSize Optional. The requested page size. Server may return
   * fewer items than requested. If unspecified, server picks an appropriate
   * default.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return. If empty, a new iteration is started. To continue
   * an iteration, pass in the value from the previous ListAlertsResponse's
   * next_page_token field.
   * @return Google_Service_AlertCenter_ListAlertsResponse
   */
  public function listAlerts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AlertCenter_ListAlertsResponse");
  }
  /**
   * Restores, or "undeletes", an alert that was marked for deletion within the
   * past 30 days. Attempting to undelete an alert which was marked for deletion
   * over 30 days ago (which has been removed from the Alert Center database) or a
   * nonexistent alert returns a `NOT_FOUND` error. Attempting to undelete an
   * alert which has not been marked for deletion has no effect. (alerts.undelete)
   *
   * @param string $alertId Required. The identifier of the alert to undelete.
   * @param Google_Service_AlertCenter_UndeleteAlertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AlertCenter_Alert
   */
  public function undelete($alertId, Google_Service_AlertCenter_UndeleteAlertRequest $postBody, $optParams = array())
  {
    $params = array('alertId' => $alertId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_AlertCenter_Alert");
  }
}
