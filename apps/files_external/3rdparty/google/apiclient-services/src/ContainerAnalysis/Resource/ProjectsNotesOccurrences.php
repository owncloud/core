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

namespace Google\Service\ContainerAnalysis\Resource;

use Google\Service\ContainerAnalysis\ListNoteOccurrencesResponse;

/**
 * The "occurrences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google\Service\ContainerAnalysis(...);
 *   $occurrences = $containeranalysisService->occurrences;
 *  </code>
 */
class ProjectsNotesOccurrences extends \Google\Service\Resource
{
  /**
   * Lists occurrences referencing the specified note. Provider projects can use
   * this method to get all occurrences across consumer projects referencing the
   * specified note. (occurrences.listProjectsNotesOccurrences)
   *
   * @param string $name Required. The name of the note to list occurrences for in
   * the form of `projects/[PROVIDER_ID]/notes/[NOTE_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression.
   * @opt_param int pageSize Number of occurrences to return in the list.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @return ListNoteOccurrencesResponse
   */
  public function listProjectsNotesOccurrences($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNoteOccurrencesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsNotesOccurrences::class, 'Google_Service_ContainerAnalysis_Resource_ProjectsNotesOccurrences');
