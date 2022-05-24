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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1DebugSession;
use Google\Service\Apigee\GoogleCloudApigeeV1ListDebugSessionsResponse;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "debugsessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $debugsessions = $apigeeService->debugsessions;
 *  </code>
 */
class OrganizationsEnvironmentsApisRevisionsDebugsessions extends \Google\Service\Resource
{
  /**
   * Creates a debug session for a deployed API Proxy revision.
   * (debugsessions.create)
   *
   * @param string $parent Required. The resource name of the API Proxy revision
   * deployment for which to create the DebugSession. Must be of the form `organiz
   * ations/{organization}/environments/{environment}/apis/{api}/revisions/{revisi
   * on}`.
   * @param GoogleCloudApigeeV1DebugSession $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string timeout Optional. The time in seconds after which this
   * DebugSession should end. A timeout specified in DebugSession will overwrite
   * this value.
   * @return GoogleCloudApigeeV1DebugSession
   */
  public function create($parent, GoogleCloudApigeeV1DebugSession $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1DebugSession::class);
  }
  /**
   * Deletes the data from a debug session. This does not cancel the debug session
   * or prevent further data from being collected if the session is still active
   * in runtime pods. (debugsessions.deleteData)
   *
   * @param string $name Required. The name of the debug session to delete. Must
   * be of the form: `organizations/{organization}/environments/{environment}/apis
   * /{api}/revisions/{revision}/debugsessions/{debugsession}`.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function deleteData($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteData', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Retrieves a debug session. (debugsessions.get)
   *
   * @param string $name Required. The name of the debug session to retrieve. Must
   * be of the form: `organizations/{organization}/environments/{environment}/apis
   * /{api}/revisions/{revision}/debugsessions/{session}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DebugSession
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1DebugSession::class);
  }
  /**
   * Lists debug sessions that are currently active in the given API Proxy
   * revision.
   * (debugsessions.listOrganizationsEnvironmentsApisRevisionsDebugsessions)
   *
   * @param string $parent Required. The name of the API Proxy revision deployment
   * for which to list debug sessions. Must be of the form: `organizations/{organi
   * zation}/environments/{environment}/apis/{api}/revisions/{revision}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of debug sessions to return. The page
   * size defaults to 25.
   * @opt_param string pageToken Page token, returned from a previous
   * ListDebugSessions call, that you can use to retrieve the next page.
   * @return GoogleCloudApigeeV1ListDebugSessionsResponse
   */
  public function listOrganizationsEnvironmentsApisRevisionsDebugsessions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListDebugSessionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsApisRevisionsDebugsessions::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsApisRevisionsDebugsessions');
