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

namespace Google\Service\CloudTrace\Resource;

use Google\Service\CloudTrace\BatchWriteSpansRequest;
use Google\Service\CloudTrace\CloudtraceEmpty;

/**
 * The "traces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtraceService = new Google\Service\CloudTrace(...);
 *   $traces = $cloudtraceService->traces;
 *  </code>
 */
class ProjectsTraces extends \Google\Service\Resource
{
  /**
   * Batch writes new spans to new or existing traces. You cannot update existing
   * spans. (traces.batchWrite)
   *
   * @param string $name Required. The name of the project where the spans belong.
   * The format is `projects/[PROJECT_ID]`.
   * @param BatchWriteSpansRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CloudtraceEmpty
   */
  public function batchWrite($name, BatchWriteSpansRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchWrite', [$params], CloudtraceEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTraces::class, 'Google_Service_CloudTrace_Resource_ProjectsTraces');
