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
 * The "notes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google_Service_ContainerAnalysis(...);
 *   $notes = $containeranalysisService->notes;
 *  </code>
 */
class Google_Service_ContainerAnalysis_Resource_ProjectsNotes extends Google_Service_Resource
{
  /**
   * Creates new notes in batch. (notes.batchCreate)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the notes are to be created.
   * @param Google_Service_ContainerAnalysis_BatchCreateNotesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_BatchCreateNotesResponse
   */
  public function batchCreate($parent, Google_Service_ContainerAnalysis_BatchCreateNotesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_ContainerAnalysis_BatchCreateNotesResponse");
  }
  /**
   * Creates a new note. (notes.create)
   *
   * @param string $parent Required. The name of the project in the form of
   * `projects/[PROJECT_ID]`, under which the note is to be created.
   * @param Google_Service_ContainerAnalysis_Note $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string noteId Required. The ID to use for this note.
   * @return Google_Service_ContainerAnalysis_Note
   */
  public function create($parent, Google_Service_ContainerAnalysis_Note $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ContainerAnalysis_Note");
  }
  /**
   * Deletes the specified note. (notes.delete)
   *
   * @param string $name Required. The name of the note in the form of
   * `projects/[PROVIDER_ID]/notes/[NOTE_ID]`.
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
   * Gets the specified note. (notes.get)
   *
   * @param string $name Required. The name of the note in the form of
   * `projects/[PROVIDER_ID]/notes/[NOTE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ContainerAnalysis_Note
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ContainerAnalysis_Note");
  }
  /**
   * Gets the access control policy for a note or an occurrence resource. Requires
   * `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * note or occurrence, respectively. The resource takes the format
   * `projects/[PROJECT_ID]/notes/[NOTE_ID]` for notes and
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]` for occurrences.
   * (notes.getIamPolicy)
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
   * Lists notes for the specified project. (notes.listProjectsNotes)
   *
   * @param string $parent Required. The name of the project to list notes for in
   * the form of `projects/[PROJECT_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression.
   * @opt_param int pageSize Number of notes to return in the list. Must be
   * positive. Max allowed page size is 1000. If not specified, page size defaults
   * to 20.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @return Google_Service_ContainerAnalysis_ListNotesResponse
   */
  public function listProjectsNotes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListNotesResponse");
  }
  /**
   * Updates the specified note. (notes.patch)
   *
   * @param string $name Required. The name of the note in the form of
   * `projects/[PROVIDER_ID]/notes/[NOTE_ID]`.
   * @param Google_Service_ContainerAnalysis_Note $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update.
   * @return Google_Service_ContainerAnalysis_Note
   */
  public function patch($name, Google_Service_ContainerAnalysis_Note $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ContainerAnalysis_Note");
  }
  /**
   * Sets the access control policy on the specified note or occurrence. Requires
   * `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * note or an occurrence, respectively. The resource takes the format
   * `projects/[PROJECT_ID]/notes/[NOTE_ID]` for notes and
   * `projects/[PROJECT_ID]/occurrences/[OCCURRENCE_ID]` for occurrences.
   * (notes.setIamPolicy)
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
   * (notes.testIamPermissions)
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
