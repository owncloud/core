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

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListVersionsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3LoadVersionRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Version;
use Google\Service\Dialogflow\GoogleLongrunningOperation;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $versions = $dialogflowService->versions;
 *  </code>
 */
class ProjectsLocationsAgentsFlowsVersions extends \Google\Service\Resource
{
  /**
   * Creates a Version in the specified Flow. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: CreateVersionOperationMetadata - `response`: Version
   * (versions.create)
   *
   * @param string $parent Required. The Flow to create an Version for. Format:
   * `projects//locations//agents//flows/`.
   * @param GoogleCloudDialogflowCxV3Version $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudDialogflowCxV3Version $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the specified Version. (versions.delete)
   *
   * @param string $name Required. The name of the Version to delete. Format:
   * `projects//locations//agents//flows//versions/`.
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
   * Retrieves the specified Version. (versions.get)
   *
   * @param string $name Required. The name of the Version. Format:
   * `projects//locations//agents//flows//versions/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Version
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Version::class);
  }
  /**
   * Returns the list of all versions in the specified Flow.
   * (versions.listProjectsLocationsAgentsFlowsVersions)
   *
   * @param string $parent Required. The Flow to list all versions for. Format:
   * `projects//locations//agents//flows/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListVersionsResponse
   */
  public function listProjectsLocationsAgentsFlowsVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListVersionsResponse::class);
  }
  /**
   * Loads resources in the specified version to the draft flow. This method is a
   * [long-running operation](https://cloud.google.com/dialogflow/cx/docs/how
   * /long-running-operation). The returned `Operation` type has the following
   * method-specific fields: - `metadata`: An empty [Struct
   * message](https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#struct) - `response`: An [Empty
   * message](https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#empty) (versions.load)
   *
   * @param string $name Required. The Version to be loaded to draft flow. Format:
   * `projects//locations//agents//flows//versions/`.
   * @param GoogleCloudDialogflowCxV3LoadVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function load($name, GoogleCloudDialogflowCxV3LoadVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('load', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Updates the specified Version. (versions.patch)
   *
   * @param string $name Format: projects//locations//agents//flows//versions/.
   * Version ID is a self-increasing number generated by Dialogflow upon version
   * creation.
   * @param GoogleCloudDialogflowCxV3Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated. Currently only `description` and `display_name` can be updated.
   * @return GoogleCloudDialogflowCxV3Version
   */
  public function patch($name, GoogleCloudDialogflowCxV3Version $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3Version::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsFlowsVersions::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsFlowsVersions');
