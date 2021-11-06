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

namespace Google\Service\Firebaseappcheck\Resource;

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaDebugToken;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaListDebugTokensResponse;
use Google\Service\Firebaseappcheck\GoogleProtobufEmpty;

/**
 * The "debugTokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $debugTokens = $firebaseappcheckService->debugTokens;
 *  </code>
 */
class ProjectsAppsDebugTokens extends \Google\Service\Resource
{
  /**
   * Creates a new DebugToken for the specified app. For security reasons, after
   * the creation operation completes, the `token` field cannot be updated or
   * retrieved, but you can revoke the debug token using DeleteDebugToken. Each
   * app can have a maximum of 20 debug tokens. (debugTokens.create)
   *
   * @param string $parent Required. The relative resource name of the parent app
   * in which the specified DebugToken will be created, in the format: ```
   * projects/{project_number}/apps/{app_id} ```
   * @param GoogleFirebaseAppcheckV1betaDebugToken $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function create($parent, GoogleFirebaseAppcheckV1betaDebugToken $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleFirebaseAppcheckV1betaDebugToken::class);
  }
  /**
   * Deletes the specified DebugToken. A deleted debug token cannot be used to
   * exchange for an App Check token. Use this method when you suspect the secret
   * `token` has been compromised or when you no longer need the debug token.
   * (debugTokens.delete)
   *
   * @param string $name Required. The relative resource name of the DebugToken to
   * delete, in the format: ```
   * projects/{project_number}/apps/{app_id}/debugTokens/{debug_token_id} ```
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets the specified DebugToken. For security reasons, the `token` field is
   * never populated in the response. (debugTokens.get)
   *
   * @param string $name Required. The relative resource name of the debug token,
   * in the format: ```
   * projects/{project_number}/apps/{app_id}/debugTokens/{debug_token_id} ```
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1betaDebugToken::class);
  }
  /**
   * Lists all DebugTokens for the specified app. For security reasons, the
   * `token` field is never populated in the response.
   * (debugTokens.listProjectsAppsDebugTokens)
   *
   * @param string $parent Required. The relative resource name of the parent app
   * for which to list each associated DebugToken, in the format: ```
   * projects/{project_number}/apps/{app_id} ```
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of DebugTokens to return in the
   * response. Note that an app can have at most 20 debug tokens. The server may
   * return fewer than this at its own discretion. If no value is specified (or
   * too large a value is specified), the server will impose its own limit.
   * @opt_param string pageToken Token returned from a previous call to
   * ListDebugTokens indicating where in the set of DebugTokens to resume listing.
   * Provide this to retrieve the subsequent page. When paginating, all other
   * parameters provided to ListDebugTokens must match the call that provided the
   * page token; if they do not match, the result is undefined.
   * @return GoogleFirebaseAppcheckV1betaListDebugTokensResponse
   */
  public function listProjectsAppsDebugTokens($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleFirebaseAppcheckV1betaListDebugTokensResponse::class);
  }
  /**
   * Updates the specified DebugToken. For security reasons, the `token` field
   * cannot be updated, nor will it be populated in the response, but you can
   * revoke the debug token using DeleteDebugToken. (debugTokens.patch)
   *
   * @param string $name The relative resource name of the debug token, in the
   * format: ```
   * projects/{project_number}/apps/{app_id}/debugTokens/{debug_token_id} ```
   * @param GoogleFirebaseAppcheckV1betaDebugToken $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the DebugToken to update. Example: `display_name`.
   * @return GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function patch($name, GoogleFirebaseAppcheckV1betaDebugToken $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleFirebaseAppcheckV1betaDebugToken::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAppsDebugTokens::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsAppsDebugTokens');
