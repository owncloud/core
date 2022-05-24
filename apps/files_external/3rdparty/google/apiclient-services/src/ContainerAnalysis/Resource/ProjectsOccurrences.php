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

use Google\Service\ContainerAnalysis\BatchCreateOccurrencesRequest;
use Google\Service\ContainerAnalysis\BatchCreateOccurrencesResponse;
use Google\Service\ContainerAnalysis\ContaineranalysisEmpty;
use Google\Service\ContainerAnalysis\GetIamPolicyRequest;
use Google\Service\ContainerAnalysis\ListOccurrencesResponse;
use Google\Service\ContainerAnalysis\Note;
use Google\Service\ContainerAnalysis\Occurrence;
use Google\Service\ContainerAnalysis\Policy;
use Google\Service\ContainerAnalysis\SetIamPolicyRequest;
use Google\Service\ContainerAnalysis\TestIamPermissionsRequest;
use Google\Service\ContainerAnalysis\TestIamPermissionsResponse;
use Google\Service\ContainerAnalysis\VulnerabilityOccurrencesSummary;

/**
 * The "occurrences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google\Service\ContainerAnalysis(...);
 *   $occurrences = $containeranalysisService->occurrences;
 *  </code>
 */
class ProjectsOccurrences extends \Google\Service\Resource
{
  /**
   * Creates new occurrences in batch. (occurrences.batchCreate)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the occurrences are to be created.
   * @param BatchCreateOccurrencesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreateOccurrencesResponse
   */
  public function batchCreate($parent, BatchCreateOccurrencesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], BatchCreateOccurrencesResponse::class);
  }
  /**
   * Creates a new occurrence. (occurrences.create)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the occurrence is to be created.
   * @param Occurrence $postBody
   * @param array $optParams Optional parameters.
   * @return Occurrence
   */
  public function create($parent, Occurrence $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Occurrence::class);
  }
  /**
   * Deletes the specified occurrence. For example, use this method to delete an
   * occurrence when the occurrence is no longer applicable for the given
   * resource. (occurrences.delete)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return ContaineranalysisEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ContaineranalysisEmpty::class);
  }
  /**
   * Gets the specified occurrence. (occurrences.get)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Occurrence
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Occurrence::class);
  }
  /**
   * Gets the access control policy for a note or an occurrence resource. Requires
   * `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * note or occurrence, respectively. The resource takes the format
   * `projects/[PROJECT_ID]/notes/[NOTE_ID]` for notes and
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]` for occurrences.
   * (occurrences.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Gets the note attached to the specified occurrence. Consumer projects can use
   * this method to get a note that belongs to a provider project.
   * (occurrences.getNotes)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Note
   */
  public function getNotes($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getNotes', [$params], Note::class);
  }
  /**
   * Gets a summary of the number and severity of occurrences.
   * (occurrences.getVulnerabilitySummary)
   *
   * @param string $parent Required. The name of the project to get a
   * vulnerability summary for in the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression.
   * @return VulnerabilityOccurrencesSummary
   */
  public function getVulnerabilitySummary($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('getVulnerabilitySummary', [$params], VulnerabilityOccurrencesSummary::class);
  }
  /**
   * Lists occurrences for the specified project.
   * (occurrences.listProjectsOccurrences)
   *
   * @param string $parent Required. The name of the project to list occurrences
   * for in the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression.
   * @opt_param int pageSize Number of occurrences to return in the list. Must be
   * positive. Max allowed page size is 1000. If not specified, page size defaults
   * to 20.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @return ListOccurrencesResponse
   */
  public function listProjectsOccurrences($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOccurrencesResponse::class);
  }
  /**
   * Updates the specified occurrence. (occurrences.patch)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param Occurrence $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update.
   * @return Occurrence
   */
  public function patch($name, Occurrence $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Occurrence::class);
  }
  /**
   * Sets the access control policy on the specified note or occurrence. Requires
   * `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * note or an occurrence, respectively. The resource takes the format
   * `projects/[PROJECT_ID]/notes/[NOTE_ID]` for notes and
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]` for occurrences.
   * (occurrences.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns the permissions that a caller has on the specified note or
   * occurrence. Requires list permission on the project (for example,
   * `containeranalysis.notes.list`). The resource takes the format
   * `projects/[PROJECT_ID]/notes/[NOTE_ID]` for notes and
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]` for occurrences.
   * (occurrences.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsOccurrences::class, 'Google_Service_ContainerAnalysis_Resource_ProjectsOccurrences');
