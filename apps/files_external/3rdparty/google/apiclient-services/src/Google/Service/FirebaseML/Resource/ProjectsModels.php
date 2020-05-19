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
 * The "models" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasemlService = new Google_Service_FirebaseML(...);
 *   $models = $firebasemlService->models;
 *  </code>
 */
class Google_Service_FirebaseML_Resource_ProjectsModels extends Google_Service_Resource
{
  /**
   * Creates a model in Firebase ML. The longrunning operation will eventually
   * return a Model (models.create)
   *
   * @param string $parent Required. The parent project resource where the model
   * is to be created. The parent must have the form `projects/{project_id}`
   * @param Google_Service_FirebaseML_Model $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseML_Operation
   */
  public function create($parent, Google_Service_FirebaseML_Model $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseML_Operation");
  }
  /**
   * Deletes a model (models.delete)
   *
   * @param string $name Required. The name of the model to delete. The name must
   * have the form `projects/{project_id}/models/{model_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseML_FirebasemlEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseML_FirebasemlEmpty");
  }
  /**
   * Gets a model resource. (models.get)
   *
   * @param string $name Required. The name of the model to get. The name must
   * have the form `projects/{project_id}/models/{model_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseML_Model
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseML_Model");
  }
  /**
   * Lists the models (models.listProjectsModels)
   *
   * @param string $parent Required. The name of the parent to list models for.
   * The parent must have the form `projects/{project_id}'
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return
   * @opt_param string filter A filter for the list e.g. 'tags: abc' to list
   * models which are tagged with "abc"
   * @return Google_Service_FirebaseML_ListModelsResponse
   */
  public function listProjectsModels($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseML_ListModelsResponse");
  }
  /**
   * Updates a model. The longrunning operation will eventually return a Model.
   * (models.patch)
   *
   * @param string $name The resource name of the Model. Model names have the form
   * `projects/{project_id}/models/{model_id}` The name is ignored when creating a
   * model.
   * @param Google_Service_FirebaseML_Model $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask
   * @return Google_Service_FirebaseML_Operation
   */
  public function patch($name, Google_Service_FirebaseML_Model $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_FirebaseML_Operation");
  }
}
