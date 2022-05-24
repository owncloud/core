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

namespace Google\Service\DataLabeling\Resource;

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1CreateInstructionRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1Instruction;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ListInstructionsResponse;
use Google\Service\DataLabeling\GoogleLongrunningOperation;
use Google\Service\DataLabeling\GoogleProtobufEmpty;

/**
 * The "instructions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $instructions = $datalabelingService->instructions;
 *  </code>
 */
class ProjectsInstructions extends \Google\Service\Resource
{
  /**
   * Creates an instruction for how data should be labeled. (instructions.create)
   *
   * @param string $parent Required. Instruction resource parent, format:
   * projects/{project_id}
   * @param GoogleCloudDatalabelingV1beta1CreateInstructionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudDatalabelingV1beta1CreateInstructionRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an instruction object by resource name. (instructions.delete)
   *
   * @param string $name Required. Instruction resource name, format:
   * projects/{project_id}/instructions/{instruction_id}
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
   * Gets an instruction by resource name. (instructions.get)
   *
   * @param string $name Required. Instruction resource name, format:
   * projects/{project_id}/instructions/{instruction_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1Instruction
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatalabelingV1beta1Instruction::class);
  }
  /**
   * Lists instructions for a project. Pagination is supported.
   * (instructions.listProjectsInstructions)
   *
   * @param string $parent Required. Instruction resource parent, format:
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter is not supported at this moment.
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListInstructionsResponse.next_page_token of the previous
   * [DataLabelingService.ListInstructions] call. Return first page if empty.
   * @return GoogleCloudDatalabelingV1beta1ListInstructionsResponse
   */
  public function listProjectsInstructions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatalabelingV1beta1ListInstructionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstructions::class, 'Google_Service_DataLabeling_Resource_ProjectsInstructions');
