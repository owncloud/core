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

namespace Google\Service\Testing\Resource;

use Google\Service\Testing\CancelTestMatrixResponse;
use Google\Service\Testing\TestMatrix;

/**
 * The "testMatrices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $testingService = new Google\Service\Testing(...);
 *   $testMatrices = $testingService->testMatrices;
 *  </code>
 */
class ProjectsTestMatrices extends \Google\Service\Resource
{
  /**
   * Cancels unfinished test executions in a test matrix. This call returns
   * immediately and cancellation proceeds asynchronously. If the matrix is
   * already final, this operation will have no effect. May return any of the
   * following canonical error codes: - PERMISSION_DENIED - if the user is not
   * authorized to read project - INVALID_ARGUMENT - if the request is malformed -
   * NOT_FOUND - if the Test Matrix does not exist (testMatrices.cancel)
   *
   * @param string $projectId Cloud project that owns the test.
   * @param string $testMatrixId Test matrix that will be canceled.
   * @param array $optParams Optional parameters.
   * @return CancelTestMatrixResponse
   */
  public function cancel($projectId, $testMatrixId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'testMatrixId' => $testMatrixId];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], CancelTestMatrixResponse::class);
  }
  /**
   * Creates and runs a matrix of tests according to the given specifications.
   * Unsupported environments will be returned in the state UNSUPPORTED. A test
   * matrix is limited to use at most 2000 devices in parallel. May return any of
   * the following canonical error codes: - PERMISSION_DENIED - if the user is not
   * authorized to write to project - INVALID_ARGUMENT - if the request is
   * malformed or if the matrix tries to use too many simultaneous devices.
   * (testMatrices.create)
   *
   * @param string $projectId The GCE project under which this job will run.
   * @param TestMatrix $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A string id used to detect duplicated requests.
   * Ids are automatically scoped to a project, so users should ensure the ID is
   * unique per-project. A UUID is recommended. Optional, but strongly
   * recommended.
   * @return TestMatrix
   */
  public function create($projectId, TestMatrix $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], TestMatrix::class);
  }
  /**
   * Checks the status of a test matrix. May return any of the following canonical
   * error codes: - PERMISSION_DENIED - if the user is not authorized to read
   * project - INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * Test Matrix does not exist (testMatrices.get)
   *
   * @param string $projectId Cloud project that owns the test matrix.
   * @param string $testMatrixId Unique test matrix id which was assigned by the
   * service.
   * @param array $optParams Optional parameters.
   * @return TestMatrix
   */
  public function get($projectId, $testMatrixId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'testMatrixId' => $testMatrixId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TestMatrix::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTestMatrices::class, 'Google_Service_Testing_Resource_ProjectsTestMatrices');
