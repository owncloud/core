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
 * The "namespaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google_Service_CloudRun(...);
 *   $namespaces = $runService->namespaces;
 *  </code>
 */
class Google_Service_CloudRun_Resource_ApiV1Namespaces extends Google_Service_Resource
{
  /**
   * Rpc to get information about a namespace. (namespaces.get)
   *
   * @param string $name Required. The name of the namespace being retrieved. If
   * needed, replace {namespace_id} with the project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_RunNamespace
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudRun_RunNamespace");
  }
  /**
   * Rpc to update a namespace. (namespaces.patch)
   *
   * @param string $name Required. The name of the namespace being retrieved. If
   * needed, replace {namespace_id} with the project ID.
   * @param Google_Service_CloudRun_RunNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Indicates which fields in the provided
   * namespace to update. This field is currently unused.
   * @return Google_Service_CloudRun_RunNamespace
   */
  public function patch($name, Google_Service_CloudRun_RunNamespace $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudRun_RunNamespace");
  }
}
