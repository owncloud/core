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
 * The "occurrences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google_Service_ContainerAnalysis(...);
 *   $occurrences = $containeranalysisService->occurrences;
 *  </code>
 */
class Google_Service_ContainerAnalysis_Resource_ProjectsOccurrences extends Google_Service_Resource
{
  /**
   * Creates new occurrences in batch. (occurrences.batchCreate)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the occurrences are to be created.
   * @param Google_Service_ContainerAnalysis_BatchCreateOccurrencesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_BatchCreateOccurrencesResponse
   */
  public function batchCreate($parent, Google_Service_ContainerAnalysis_BatchCreateOccurrencesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_ContainerAnalysis_BatchCreateOccurrencesResponse");
  }
  /**
   * Creates a new occurrence. (occurrences.create)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the occurrence is to be created.
   * @param Google_Service_ContainerAnalysis_Occurrence $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Occurrence
   */
  public function create($parent, Google_Service_ContainerAnalysis_Occurrence $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ContainerAnalysis_Occurrence");
  }
  /**
   * Deletes the specified occurrence. For example, use this method to delete an
   * occurrence when the occurrence is no longer applicable for the given
   * resource. (occurrences.delete)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_ContaineranalysisEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ContainerAnalysis_ContaineranalysisEmpty");
  }
  /**
   * Gets the specified occurrence. (occurrences.get)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Occurrence
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ContainerAnalysis_Occurrence");
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
   * @param Google_Service_ContainerAnalysis_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Policy
   */
  public function getIamPolicy($resource, Google_Service_ContainerAnalysis_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_ContainerAnalysis_Policy");
  }
  /**
   * Gets the note attached to the specified occurrence. Consumer projects can use
   * this method to get a note that belongs to a provider project.
   * (occurrences.getNotes)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Note
   */
  public function getNotes($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getNotes', array($params), "Google_Service_ContainerAnalysis_Note");
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
   * @return Google_Service_ContainerAnalysis_VulnerabilityOccurrencesSummary
   */
  public function getVulnerabilitySummary($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getVulnerabilitySummary', array($params), "Google_Service_ContainerAnalysis_VulnerabilityOccurrencesSummary");
  }
  /**
   * Lists occurrences for the specified project.
   * (occurrences.listProjectsOccurrences)
   *
   * @param string $parent Required. The name of the project to list occurrences
   * for in the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of occurrences to return in the list. Must be
   * positive. Max allowed page size is 1000. If not specified, page size defaults
   * to 20.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param string filter The filter expression.
   * @return Google_Service_ContainerAnalysis_ListOccurrencesResponse
   */
  public function listProjectsOccurrences($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListOccurrencesResponse");
  }
  /**
   * Updates the specified occurrence. (occurrences.patch)
   *
   * @param string $name Required. The name of the occurrence in the form of
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]`.
   * @param Google_Service_ContainerAnalysis_Occurrence $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update.
   * @return Google_Service_ContainerAnalysis_Occurrence
   */
  public function patch($name, Google_Service_ContainerAnalysis_Occurrence $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ContainerAnalysis_Occurrence");
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
   * @param Google_Service_ContainerAnalysis_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Policy
   */
  public function setIamPolicy($resource, Google_Service_ContainerAnalysis_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_ContainerAnalysis_Policy");
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
   * @param Google_Service_ContainerAnalysis_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_ContainerAnalysis_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_ContainerAnalysis_TestIamPermissionsResponse");
  }
}
