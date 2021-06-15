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
 * The "debugTokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google_Service_Firebaseappcheck(...);
 *   $debugTokens = $firebaseappcheckService->debugTokens;
 *  </code>
 */
class Google_Service_Firebaseappcheck_Resource_ProjectsAppsDebugTokens extends Google_Service_Resource
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
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function create($parent, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken");
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
   * @return Google_Service_Firebaseappcheck_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Firebaseappcheck_GoogleProtobufEmpty");
  }
  /**
   * Gets the specified DebugToken. For security reasons, the `token` field is
   * never populated in the response. (debugTokens.get)
   *
   * @param string $name Required. The relative resource name of the debug token,
   * in the format: ```
   * projects/{project_number}/apps/{app_id}/debugTokens/{debug_token_id} ```
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken");
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
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaListDebugTokensResponse
   */
  public function listProjectsAppsDebugTokens($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaListDebugTokensResponse");
  }
  /**
   * Updates the specified DebugToken. For security reasons, the `token` field
   * cannot be updated, nor will it be populated in the response, but you can
   * revoke the debug token using DeleteDebugToken. (debugTokens.patch)
   *
   * @param string $name The relative resource name of the debug token, in the
   * format: ```
   * projects/{project_number}/apps/{app_id}/debugTokens/{debug_token_id} ```
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the DebugToken to update. Example: `display_name`.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken
   */
  public function patch($name, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDebugToken");
  }
}
