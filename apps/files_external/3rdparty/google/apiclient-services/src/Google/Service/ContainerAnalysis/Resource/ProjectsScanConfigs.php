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
   * Gets the specified scan configuration. (scanConfigs.get)
   *
   * @param string $name Required. The name of the scan configuration in the form
   * of `projects/[PROJECT_ID]/scanConfigs/[SCAN_CONFIG_ID]`.
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
   * Lists scan configurations for the specified project.
   * (scanConfigs.listProjectsScanConfigs)
   *
   * @param string $parent Required. The name of the project to list scan
   * configurations for in the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param int pageSize The number of scan configs to return in the list.
   * @opt_param string filter Required. The filter expression.
   * @return Google_Service_ContainerAnalysis_ListScanConfigsResponse
   */
  public function listProjectsScanConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListScanConfigsResponse");
  }
  /**
   * Updates the specified scan configuration. (scanConfigs.update)
   *
   * @param string $name Required. The name of the scan configuration in the form
   * of `projects/[PROJECT_ID]/scanConfigs/[SCAN_CONFIG_ID]`.
   * @param Google_Service_ContainerAnalysis_ScanConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_ScanConfig
   */
  public function update($name, Google_Service_ContainerAnalysis_ScanConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ContainerAnalysis_ScanConfig");
  }
}
