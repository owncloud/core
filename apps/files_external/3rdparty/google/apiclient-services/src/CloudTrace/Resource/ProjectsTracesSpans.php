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

use Google\Service\CloudTrace\Span;

/**
 * The "spans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtraceService = new Google\Service\CloudTrace(...);
 *   $spans = $cloudtraceService->spans;
 *  </code>
 */
class ProjectsTracesSpans extends \Google\Service\Resource
{
  /**
   * Creates a new span. (spans.createSpan)
   *
   * @param string $name Required. The resource name of the span in the following
   * format: projects/[PROJECT_ID]/traces/[TRACE_ID]/spans/SPAN_ID is a unique
   * identifier for a trace within a project; it is a 32-character hexadecimal
   * encoding of a 16-byte array. [SPAN_ID] is a unique identifier for a span
   * within a trace; it is a 16-character hexadecimal encoding of an 8-byte array.
   * It should not be zero.
   * @param Span $postBody
   * @param array $optParams Optional parameters.
   * @return Span
   */
  public function createSpan($name, Span $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createSpan', [$params], Span::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTracesSpans::class, 'Google_Service_CloudTrace_Resource_ProjectsTracesSpans');
