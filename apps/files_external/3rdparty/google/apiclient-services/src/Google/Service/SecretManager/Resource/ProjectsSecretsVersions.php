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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $secretmanagerService = new Google_Service_SecretManager(...);
 *   $versions = $secretmanagerService->versions;
 *  </code>
 */
class Google_Service_SecretManager_Resource_ProjectsSecretsVersions extends Google_Service_Resource
{
  /**
   * Accesses a SecretVersion. This call returns the secret data.
   * `projects/secrets/versions/latest` is an alias to the `latest` SecretVersion.
   * (versions.access)
   *
   * @param string $name Required. The resource name of the SecretVersion in the
   * format `projects/secrets/versions`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_AccessSecretVersionResponse
   */
  public function access($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('access', array($params), "Google_Service_SecretManager_AccessSecretVersionResponse");
  }
  /**
   * Destroys a SecretVersion. Sets the state of the SecretVersion to DESTROYED
   * and irrevocably destroys the secret data. (versions.destroy)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * destroy in the format `projects/secrets/versions`.
   * @param Google_Service_SecretManager_DestroySecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretVersion
   */
  public function destroy($name, Google_Service_SecretManager_DestroySecretVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('destroy', array($params), "Google_Service_SecretManager_SecretVersion");
  }
  /**
   * Disables a SecretVersion. Sets the state of the SecretVersion to DISABLED.
   * (versions.disable)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * disable in the format `projects/secrets/versions`.
   * @param Google_Service_SecretManager_DisableSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretVersion
   */
  public function disable($name, Google_Service_SecretManager_DisableSecretVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_SecretManager_SecretVersion");
  }
  /**
   * Enables a SecretVersion. Sets the state of the SecretVersion to ENABLED.
   * (versions.enable)
   *
   * @param string $name Required. The resource name of the SecretVersion to
   * enable in the format `projects/secrets/versions`.
   * @param Google_Service_SecretManager_EnableSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretVersion
   */
  public function enable($name, Google_Service_SecretManager_EnableSecretVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_SecretManager_SecretVersion");
  }
  /**
   * Gets metadata for a SecretVersion. `projects/secrets/versions/latest` is an
   * alias to the `latest` SecretVersion. (versions.get)
   *
   * @param string $name Required. The resource name of the SecretVersion in the
   * format `projects/secrets/versions`. `projects/secrets/versions/latest` is an
   * alias to the `latest` SecretVersion.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretVersion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SecretManager_SecretVersion");
  }
  /**
   * Lists SecretVersions. This call does not return secret data.
   * (versions.listProjectsSecretsVersions)
   *
   * @param string $parent Required. The resource name of the Secret associated
   * with the SecretVersions to list, in the format `projects/secrets`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListSecretVersionsResponse.next_page_token][].
   * @opt_param int pageSize Optional. The maximum number of results to be
   * returned in a single page. If set to 0, the server decides the number of
   * results to return. If the number is greater than 25000, it is capped at
   * 25000.
   * @return Google_Service_SecretManager_ListSecretVersionsResponse
   */
  public function listProjectsSecretsVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecretManager_ListSecretVersionsResponse");
  }
}
