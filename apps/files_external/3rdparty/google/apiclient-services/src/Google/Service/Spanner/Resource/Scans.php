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
 * The "scans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google_Service_Spanner(...);
 *   $scans = $spannerService->scans;
 *  </code>
 */
class Google_Service_Spanner_Resource_Scans extends Google_Service_Resource
{
  /**
   * Return available scans given a Database-specific resource name.
   * (scans.listScans)
   *
   * @param string $parent Required. The unique name of the parent resource,
   * specific to the Database service implementing this interface.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression to restrict the results based on
   * information present in the available Scan collection. The filter applies to
   * all fields within the Scan message except for `data`.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param string view Specifies which parts of the Scan should be returned
   * in the response. Note, only the SUMMARY view (the default) is currently
   * supported for ListScans.
   * @return Google_Service_Spanner_ListScansResponse
   */
  public function listScans($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Spanner_ListScansResponse");
  }
}
