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
 * The "scanConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google_Service_ContainerAnalysis(...);
 *   $scanConfigs = $containeranalysisService->scanConfigs;
 *  </code>
 */
class Google_Service_ContainerAnalysis_Resource_ProjectsScanConfigs extends Google_Service_Resource
{
  /**
   * Gets a specific scan configuration for a project. (scanConfigs.get)
   *
   * @param string $name The name of the ScanConfig in the form
   * projects/{project_id}/scanConfigs/{scan_config_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_ScanConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ContainerAnalysis_ScanConfig");
  }
  /**
   * Lists scan configurations for a project.
   * (scanConfigs.listProjectsScanConfigs)
   *
   * @param string $parent This containers the project Id i.e.:
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The page token to use for the next request.
   * @opt_param int pageSize The number of items to return.
   * @opt_param string filter The filter expression.
   * @return Google_Service_ContainerAnalysis_ListScanConfigsResponse
   */
  public function listProjectsScanConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListScanConfigsResponse");
  }
  /**
   * Updates the scan configuration to a new value. (scanConfigs.patch)
   *
   * @param string $name The scan config to update of the form
   * projects/{project_id}/scanConfigs/{scan_config_id}.
   * @param Google_Service_ContainerAnalysis_ScanConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update.
   * @return Google_Service_ContainerAnalysis_ScanConfig
   */
  public function patch($name, Google_Service_ContainerAnalysis_ScanConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ContainerAnalysis_ScanConfig");
  }
}
