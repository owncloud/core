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

namespace Google\Service\CloudResourceManager\Resource;

use Google\Service\CloudResourceManager\CloudresourcemanagerEmpty;
use Google\Service\CloudResourceManager\Lien;
use Google\Service\CloudResourceManager\ListLiensResponse;

/**
 * The "liens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $liens = $cloudresourcemanagerService->liens;
 *  </code>
 */
class Liens extends \Google\Service\Resource
{
  /**
   * Create a Lien which applies to the resource denoted by the `parent` field.
   * Callers of this method will require permission on the `parent` resource. For
   * example, applying to `projects/1234` requires permission
   * `resourcemanager.projects.updateLiens`. NOTE: Some resources may limit the
   * number of Liens which may be applied. (liens.create)
   *
   * @param Lien $postBody
   * @param array $optParams Optional parameters.
   * @return Lien
   */
  public function create(Lien $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Lien::class);
  }
  /**
   * Delete a Lien by `name`. Callers of this method will require permission on
   * the `parent` resource. For example, a Lien with a `parent` of `projects/1234`
   * requires permission `resourcemanager.projects.updateLiens`. (liens.delete)
   *
   * @param string $name Required. The name/identifier of the Lien to delete.
   * @param array $optParams Optional parameters.
   * @return CloudresourcemanagerEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CloudresourcemanagerEmpty::class);
  }
  /**
   * Retrieve a Lien by `name`. Callers of this method will require permission on
   * the `parent` resource. For example, a Lien with a `parent` of `projects/1234`
   * requires permission `resourcemanager.projects.get` (liens.get)
   *
   * @param string $name Required. The name/identifier of the Lien.
   * @param array $optParams Optional parameters.
   * @return Lien
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Lien::class);
  }
  /**
   * List all Liens applied to the `parent` resource. Callers of this method will
   * require permission on the `parent` resource. For example, a Lien with a
   * `parent` of `projects/1234` requires permission
   * `resourcemanager.projects.get`. (liens.listLiens)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. This is a
   * suggestion for the server. The server can return fewer liens than requested.
   * If unspecified, server picks an appropriate default.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @opt_param string parent Required. The name of the resource to list all
   * attached Liens. For example, `projects/1234`.
   * (google.api.field_policy).resource_type annotation is not set since the
   * parent depends on the meta api implementation. This field could be a project
   * or other sub project resources.
   * @return ListLiensResponse
   */
  public function listLiens($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLiensResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Liens::class, 'Google_Service_CloudResourceManager_Resource_Liens');
