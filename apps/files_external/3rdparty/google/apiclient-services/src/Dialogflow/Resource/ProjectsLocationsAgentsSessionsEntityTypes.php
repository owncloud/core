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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListSessionEntityTypesResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3SessionEntityType;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "entityTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $entityTypes = $dialogflowService->entityTypes;
 *  </code>
 */
class ProjectsLocationsAgentsSessionsEntityTypes extends \Google\Service\Resource
{
  /**
   * Creates a session entity type. (entityTypes.create)
   *
   * @param string $parent Required. The session to create a session entity type
   * for. Format: `projects//locations//agents//sessions/` or
   * `projects//locations//agents//environments//sessions/`. If `Environment ID`
   * is not specified, we assume default 'draft' environment.
   * @param GoogleCloudDialogflowCxV3SessionEntityType $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3SessionEntityType
   */
  public function create($parent, GoogleCloudDialogflowCxV3SessionEntityType $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3SessionEntityType::class);
  }
  /**
   * Deletes the specified session entity type. (entityTypes.delete)
   *
   * @param string $name Required. The name of the session entity type to delete.
   * Format: `projects//locations//agents//sessions//entityTypes/` or
   * `projects//locations//agents//environments//sessions//entityTypes/`. If
   * `Environment ID` is not specified, we assume default 'draft' environment.
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
   * Retrieves the specified session entity type. (entityTypes.get)
   *
   * @param string $name Required. The name of the session entity type. Format:
   * `projects//locations//agents//sessions//entityTypes/` or
   * `projects//locations//agents//environments//sessions//entityTypes/`. If
   * `Environment ID` is not specified, we assume default 'draft' environment.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3SessionEntityType
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3SessionEntityType::class);
  }
  /**
   * Returns the list of all session entity types in the specified session.
   * (entityTypes.listProjectsLocationsAgentsSessionsEntityTypes)
   *
   * @param string $parent Required. The session to list all session entity types
   * from. Format: `projects//locations//agents//sessions/` or
   * `projects//locations//agents//environments//sessions/`. If `Environment ID`
   * is not specified, we assume default 'draft' environment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListSessionEntityTypesResponse
   */
  public function listProjectsLocationsAgentsSessionsEntityTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListSessionEntityTypesResponse::class);
  }
  /**
   * Updates the specified session entity type. (entityTypes.patch)
   *
   * @param string $name Required. The unique identifier of the session entity
   * type. Format: `projects//locations//agents//sessions//entityTypes/` or
   * `projects//locations//agents//environments//sessions//entityTypes/`. If
   * `Environment ID` is not specified, we assume default 'draft' environment.
   * @param GoogleCloudDialogflowCxV3SessionEntityType $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The mask to control which fields get updated.
   * @return GoogleCloudDialogflowCxV3SessionEntityType
   */
  public function patch($name, GoogleCloudDialogflowCxV3SessionEntityType $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3SessionEntityType::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsSessionsEntityTypes::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsSessionsEntityTypes');
