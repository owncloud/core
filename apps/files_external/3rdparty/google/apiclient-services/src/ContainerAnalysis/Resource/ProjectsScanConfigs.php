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

namespace Google\Service\ContainerAnalysis\Resource;

use Google\Service\ContainerAnalysis\ListScanConfigsResponse;
use Google\Service\ContainerAnalysis\ScanConfig;

/**
 * The "scanConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google\Service\ContainerAnalysis(...);
 *   $scanConfigs = $containeranalysisService->scanConfigs;
 *  </code>
 */
class ProjectsScanConfigs extends \Google\Service\Resource
{
  /**
   * Gets the specified scan configuration. (scanConfigs.get)
   *
   * @param string $name Required. The name of the scan configuration in the form
   * of `projects/[PROJECT_ID]/scanConfigs/[SCAN_CONFIG_ID]`.
   * @param array $optParams Optional parameters.
   * @return ScanConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ScanConfig::class);
  }
  /**
   * Lists scan configurations for the specified project.
   * (scanConfigs.listProjectsScanConfigs)
   *
   * @param string $parent Required. The name of the project to list scan
   * configurations for in the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Required. The filter expression.
   * @opt_param int pageSize The number of scan configs to return in the list.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @return ListScanConfigsResponse
   */
  public function listProjectsScanConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListScanConfigsResponse::class);
  }
  /**
   * Updates the specified scan configuration. (scanConfigs.update)
   *
   * @param string $name Required. The name of the scan configuration in the form
   * of `projects/[PROJECT_ID]/scanConfigs/[SCAN_CONFIG_ID]`.
   * @param ScanConfig $postBody
   * @param array $optParams Optional parameters.
   * @return ScanConfig
   */
  public function update($name, ScanConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ScanConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsScanConfigs::class, 'Google_Service_ContainerAnalysis_Resource_ProjectsScanConfigs');
