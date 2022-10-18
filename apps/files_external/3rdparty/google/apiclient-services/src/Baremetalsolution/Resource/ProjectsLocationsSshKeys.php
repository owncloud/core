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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\BaremetalsolutionEmpty;
use Google\Service\Baremetalsolution\ListSSHKeysResponse;
use Google\Service\Baremetalsolution\SSHKey;

/**
 * The "sshKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $sshKeys = $baremetalsolutionService->sshKeys;
 *  </code>
 */
class ProjectsLocationsSshKeys extends \Google\Service\Resource
{
  /**
   * Register a public SSH key in the specified project for use with the
   * interactive serial console feature. (sshKeys.create)
   *
   * @param string $parent Required. The parent containing the SSH keys.
   * @param SSHKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sshKeyId Required. The ID to use for the key, which will
   * become the final component of the key's resource name. This value must match
   * the regex: [a-zA-Z0-9@.\-_]{1,64}
   * @return SSHKey
   */
  public function create($parent, SSHKey $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SSHKey::class);
  }
  /**
   * Deletes a public SSH key registered in the specified project.
   * (sshKeys.delete)
   *
   * @param string $name Required. The name of the SSH key to delete. Currently,
   * the only valid value for the location is "global".
   * @param array $optParams Optional parameters.
   * @return BaremetalsolutionEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BaremetalsolutionEmpty::class);
  }
  /**
   * Lists the public SSH keys registered for the specified project. These SSH
   * keys are used only for the interactive serial console feature.
   * (sshKeys.listProjectsLocationsSshKeys)
   *
   * @param string $parent Required. The parent containing the SSH keys.
   * Currently, the only valid value for the location is "global".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListSSHKeysResponse
   */
  public function listProjectsLocationsSshKeys($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSSHKeysResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSshKeys::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsSshKeys');
