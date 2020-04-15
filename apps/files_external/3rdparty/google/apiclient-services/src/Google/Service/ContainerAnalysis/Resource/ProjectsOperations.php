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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google_Service_ContainerAnalysis(...);
 *   $operations = $containeranalysisService->operations;
 *  </code>
 */
class Google_Service_ContainerAnalysis_Resource_ProjectsOperations extends Google_Service_Resource
{
  /**
   * Creates a new `Operation`. (operations.create)
   *
   * @param string $parent The project Id that this operation should be created
   * under.
   * @param Google_Service_ContainerAnalysis_CreateOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Operation
   */
  public function create($parent, Google_Service_ContainerAnalysis_CreateOperationRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ContainerAnalysis_Operation");
  }
  /**
   * Updates an existing operation returns an error if operation  does not exist.
   * The only valid operations are to update mark the done bit change the result.
   * (operations.patch)
   *
   * @param string $name The name of the Operation. Should be of the form
   * "projects/{provider_id}/operations/{operation_id}".
   * @param Google_Service_ContainerAnalysis_UpdateOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Operation
   */
  public function patch($name, Google_Service_ContainerAnalysis_UpdateOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ContainerAnalysis_Operation");
  }
}
