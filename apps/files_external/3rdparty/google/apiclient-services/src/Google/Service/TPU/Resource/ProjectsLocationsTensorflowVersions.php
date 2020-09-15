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
 * The "tensorflowVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tpuService = new Google_Service_TPU(...);
 *   $tensorflowVersions = $tpuService->tensorflowVersions;
 *  </code>
 */
class Google_Service_TPU_Resource_ProjectsLocationsTensorflowVersions extends Google_Service_Resource
{
  /**
   * Gets TensorFlow Version. (tensorflowVersions.get)
   *
   * @param string $name The resource name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_TPU_TensorFlowVersion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_TPU_TensorFlowVersion");
  }
  /**
   * List TensorFlow versions supported by this API.
   * (tensorflowVersions.listProjectsLocationsTensorflowVersions)
   *
   * @param string $parent The parent resource name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param string filter List filter.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string orderBy Sort results.
   * @return Google_Service_TPU_ListTensorFlowVersionsResponse
   */
  public function listProjectsLocationsTensorflowVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_TPU_ListTensorFlowVersionsResponse");
  }
}
