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

namespace Google\Service\GameServices\Resource;

use Google\Service\GameServices\ListRealmsResponse;
use Google\Service\GameServices\Operation;
use Google\Service\GameServices\PreviewRealmUpdateResponse;
use Google\Service\GameServices\Realm;

/**
 * The "realms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google\Service\GameServices(...);
 *   $realms = $gameservicesService->realms;
 *  </code>
 */
class ProjectsLocationsRealms extends \Google\Service\Resource
{
  /**
   * Creates a new realm in a given project and location. (realms.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}`.
   * @param Realm $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string realmId Required. The ID of the realm resource to be
   * created.
   * @return Operation
   */
  public function create($parent, Realm $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single realm. (realms.delete)
   *
   * @param string $name Required. The name of the realm to delete, in the
   * following form: `projects/{project}/locations/{location}/realms/{realm}`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single realm. (realms.get)
   *
   * @param string $name Required. The name of the realm to retrieve, in the
   * following form: `projects/{project}/locations/{location}/realms/{realm}`.
   * @param array $optParams Optional parameters.
   * @return Realm
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Realm::class);
  }
  /**
   * Lists realms in a given project and location.
   * (realms.listProjectsLocationsRealms)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * unspecified, server will pick an appropriate default. Server may return fewer
   * items than requested. A caller should only rely on response's next_page_token
   * to determine if there are more realms left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @return ListRealmsResponse
   */
  public function listProjectsLocationsRealms($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRealmsResponse::class);
  }
  /**
   * Patches a single realm. (realms.patch)
   *
   * @param string $name The resource name of the realm, in the following form:
   * `projects/{project}/locations/{location}/realms/{realm}`. For example,
   * `projects/my-project/locations/{location}/realms/my-realm`.
   * @param Realm $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask
   * @return Operation
   */
  public function patch($name, Realm $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Previews patches to a single realm. (realms.previewUpdate)
   *
   * @param string $name The resource name of the realm, in the following form:
   * `projects/{project}/locations/{location}/realms/{realm}`. For example,
   * `projects/my-project/locations/{location}/realms/my-realm`.
   * @param Realm $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask
   * @return PreviewRealmUpdateResponse
   */
  public function previewUpdate($name, Realm $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('previewUpdate', [$params], PreviewRealmUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRealms::class, 'Google_Service_GameServices_Resource_ProjectsLocationsRealms');
