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
 * The "findings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $websecurityscannerService = new Google_Service_WebSecurityScanner(...);
 *   $findings = $websecurityscannerService->findings;
 *  </code>
 */
class Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRunsFindings extends Google_Service_Resource
{
  /**
   * Gets a Finding. (findings.get)
   *
   * @param string $name Required. The resource name of the Finding to be
   * returned. The name follows the format of 'projects/{projectId}/scanConfigs/{s
   * canConfigId}/scanRuns/{scanRunId}/findings/{findingId}'.
   * @param array $optParams Optional parameters.
   * @return Google_Service_WebSecurityScanner_Finding
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_WebSecurityScanner_Finding");
  }
  /**
   * List Findings under a given ScanRun.
   * (findings.listProjectsScanConfigsScanRunsFindings)
   *
   * @param string $parent Required. The parent resource name, which should be a
   * scan run resource name in the format
   * 'projects/{projectId}/scanConfigs/{scanConfigId}/scanRuns/{scanRunId}'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression. The expression must be in the
   * format:  . Supported field: 'finding_type'. Supported operator: '='.
   * @opt_param string pageToken A token identifying a page of results to be
   * returned. This should be a `next_page_token` value returned from a previous
   * List request. If unspecified, the first page of results is returned.
   * @opt_param int pageSize The maximum number of Findings to return, can be
   * limited by server. If not specified or not positive, the implementation will
   * select a reasonable value.
   * @return Google_Service_WebSecurityScanner_ListFindingsResponse
   */
  public function listProjectsScanConfigsScanRunsFindings($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_WebSecurityScanner_ListFindingsResponse");
  }
}
