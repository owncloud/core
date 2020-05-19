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
   * Creates a new `Note`. (notes.create)
   *
   * @param string $parent This field contains the project Id for example:
   * "projects/{project_id}
   * @param Google_Service_ContainerAnalysis_Note $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the project. Should be of the form
   * "providers/{provider_id}". @Deprecated
   * @opt_param string noteId The ID to use for this note.
   * @return Google_Service_ContainerAnalysis_Note
   */
  public function create($parent, Google_Service_ContainerAnalysis_Note $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ContainerAnalysis_Note");
  }
  /**
   * Deletes the given `Note` from the system. (notes.delete)
   *
   * @param string $name The name of the note in the form of
   * "providers/{provider_id}/notes/{NOTE_ID}"
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
   * Returns the requested `Note`. (notes.get)
   *
   * @param string $name The name of the note in the form of
   * "providers/{provider_id}/notes/{NOTE_ID}"
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
   * Gets the access control policy for a note or an `Occurrence` resource.
   * Requires `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * note or occurrence, respectively. Attempting to call this method on a
   * resource without the required permission will result in a `PERMISSION_DENIED`
   * error. Attempting to call this method on a non-existent resource will result
   * in a `NOT_FOUND` error if the user has list permission on the project, or a
   * `PERMISSION_DENIED` error otherwise. The resource takes the following
   * formats: `projects/{PROJECT_ID}/occurrences/{OCCURRENCE_ID}` for occurrences
   * and projects/{PROJECT_ID}/notes/{NOTE_ID} for notes (notes.getIamPolicy)
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
   * Lists all `Notes` for a given project. (notes.listProjectsNotes)
   *
   * @param string $parent This field contains the project Id for example:
   * "projects/{PROJECT_ID}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name field will contain the project Id for
   * example: "providers/{provider_id} @Deprecated
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param int pageSize Number of notes to return in the list.
   * @opt_param string filter The filter expression.
   * @return Google_Service_ContainerAnalysis_ListNotesResponse
   */
  public function listProjectsNotes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListNotesResponse");
  }
  /**
   * Updates an existing `Note`. (notes.patch)
   *
   * @param string $name The name of the note. Should be of the form
   * "projects/{provider_id}/notes/{note_id}".
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
   * Sets the access control policy on the specified `Note` or `Occurrence`.
   * Requires `containeranalysis.notes.setIamPolicy` or
   * `containeranalysis.occurrences.setIamPolicy` permission if the resource is a
   * `Note` or an `Occurrence`, respectively. Attempting to call this method
   * without these permissions will result in a ` `PERMISSION_DENIED` error.
   * Attempting to call this method on a non-existent resource will result in a
   * `NOT_FOUND` error if the user has `containeranalysis.notes.list` permission
   * on a `Note` or `containeranalysis.occurrences.list` on an `Occurrence`, or a
   * `PERMISSION_DENIED` error otherwise. The resource takes the following
   * formats: `projects/{projectid}/occurrences/{occurrenceid}` for occurrences
   * and projects/{projectid}/notes/{noteid} for notes (notes.setIamPolicy)
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
   * Returns the permissions that a caller has on the specified note or occurrence
   * resource. Requires list permission on the project (for example,
   * "storage.objects.list" on the containing bucket for testing permission of an
   * object). Attempting to call this method on a non-existent resource will
   * result in a `NOT_FOUND` error if the user has list permission on the project,
   * or a `PERMISSION_DENIED` error otherwise. The resource takes the following
   * formats: `projects/{PROJECT_ID}/occurrences/{OCCURRENCE_ID}` for
   * `Occurrences` and `projects/{PROJECT_ID}/notes/{NOTE_ID}` for `Notes`
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
