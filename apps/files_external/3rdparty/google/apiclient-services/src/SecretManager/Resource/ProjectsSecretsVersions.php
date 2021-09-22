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

namespace Google\Service\SecretManager\Resource;

use Google\Service\SecretManager\AccessSecretVersionResponse;
use Google\Service\SecretManager\DestroySecretVersionRequest;
use Google\Service\SecretManager\DisableSecretVersionRequest;
use Google\Service\SecretManager\EnableSecretVersionRequest;
use Google\Service\SecretManager\ListSecretVersionsResponse;
use Google\Service\SecretManager\SecretVersion;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $secretmanagerService = new Google\Service\SecretManager(...);
 *   $versions = $secretmanagerService->versions;
 *  </code>
 */
class ProjectsSecretsVersions extends \Google\Service\Resource
{
  /**
   * Accesses a SecretVersion. This call returns the secret data.
   * `projects/secrets/versions/latest` is an alias to the most recently created
   * SecretVersion. (versions.access)
   *
   * @param string $name Required. The resource name of the SecretVersion in the
   * format `projects/secrets/versions`. `projects/secrets/versions/latest` is an
   * alias to the most recently created SecretVersion.
   * @param array $optParams Optional parameters.
   * @return AccessSecretVersionResponse
   */
  public function access($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('access', [$params], AccessSecretVersionResponse::class);
  }
  /**
   * Destroys a SecretVersion. Sets the state of the SecretVersion to DESTROYED
   * and irrevocably destroys the secret data. (versions.destroy)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * destroy in the format `projects/secrets/versions`.
   * @param DestroySecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SecretVersion
   */
  public function destroy($name, DestroySecretVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('destroy', [$params], SecretVersion::class);
  }
  /**
   * Disables a SecretVersion. Sets the state of the SecretVersion to DISABLED.
   * (versions.disable)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * disable in the format `projects/secrets/versions`.
   * @param DisableSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SecretVersion
   */
  public function disable($name, DisableSecretVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('disable', [$params], SecretVersion::class);
  }
  /**
   * Enables a SecretVersion. Sets the state of the SecretVersion to ENABLED.
   * (versions.enable)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * enable in the format `projects/secrets/versions`.
   * @param EnableSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SecretVersion
   */
  public function enable($name, EnableSecretVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enable', [$params], SecretVersion::class);
  }
  /**
   * Gets metadata for a SecretVersion. `projects/secrets/versions/latest` is an
   * alias to the most recently created SecretVersion. (versions.get)
   *
   * @param string $name Required. The resource name of the SecretVersion in the
   * format `projects/secrets/versions`. `projects/secrets/versions/latest` is an
   * alias to the most recently created SecretVersion.
   * @param array $optParams Optional parameters.
   * @return SecretVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SecretVersion::class);
  }
  /**
   * Lists SecretVersions. This call does not return secret data.
   * (versions.listProjectsSecretsVersions)
   *
   * @param string $parent Required. The resource name of the Secret associated
   * with the SecretVersions to list, in the format `projects/secrets`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter string, adhering to the rules in
   * [List-operation filtering](https://cloud.google.com/secret-
   * manager/docs/filtering). List only secret versions matching the filter. If
   * filter is empty, all secret versions are listed.
   * @opt_param int pageSize Optional. The maximum number of results to be
   * returned in a single page. If set to 0, the server decides the number of
   * results to return. If the number is greater than 25000, it is capped at
   * 25000.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListSecretVersionsResponse.next_page_token][].
   * @return ListSecretVersionsResponse
   */
  public function listProjectsSecretsVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSecretVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsSecretsVersions::class, 'Google_Service_SecretManager_Resource_ProjectsSecretsVersions');
