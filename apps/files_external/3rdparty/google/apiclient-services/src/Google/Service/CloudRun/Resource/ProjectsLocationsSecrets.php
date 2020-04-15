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
 * The "secrets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google_Service_CloudRun(...);
 *   $secrets = $runService->secrets;
 *  </code>
 */
class Google_Service_CloudRun_Resource_ProjectsLocationsSecrets extends Google_Service_Resource
{
  /**
   * Creates a new secret. (secrets.create)
   *
   * @param string $parent Required. The project ID or project number in which
   * this secret should be created.
   * @param Google_Service_CloudRun_Secret $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_Secret
   */
  public function create($parent, Google_Service_CloudRun_Secret $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudRun_Secret");
  }
  /**
   * Rpc to get information about a secret. (secrets.get)
   *
   * @param string $name Required. The name of the secret being retrieved. If
   * needed, replace {namespace_id} with the project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_Secret
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudRun_Secret");
  }
  /**
   * Rpc to replace a secret.
   *
   * Only the spec and metadata labels and annotations are modifiable. After the
   * Update request, Cloud Run will work to make the 'status' match the requested
   * 'spec'.
   *
   * May provide metadata.resourceVersion to enforce update from last read for
   * optimistic concurrency control. (secrets.replaceSecret)
   *
   * @param string $name Required. The name of the secret being retrieved. If
   * needed, replace {namespace_id} with the project ID.
   * @param Google_Service_CloudRun_Secret $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_Secret
   */
  public function replaceSecret($name, Google_Service_CloudRun_Secret $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('replaceSecret', array($params), "Google_Service_CloudRun_Secret");
  }
}
