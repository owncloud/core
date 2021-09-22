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

use Google\Service\CloudResourceManager\ListTagBindingsResponse;
use Google\Service\CloudResourceManager\Operation;
use Google\Service\CloudResourceManager\TagBinding;

/**
 * The "tagBindings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $tagBindings = $cloudresourcemanagerService->tagBindings;
 *  </code>
 */
class TagBindings extends \Google\Service\Resource
{
  /**
   * Creates a TagBinding between a TagValue and a cloud resource (currently
   * project, folder, or organization). (tagBindings.create)
   *
   * @param TagBinding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set to true to perform the validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Operation
   */
  public function create(TagBinding $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a TagBinding. (tagBindings.delete)
   *
   * @param string $name Required. The name of the TagBinding. This is a String of
   * the form: `tagBindings/{id}` (e.g. `tagBindings/%2F%2Fcloudresourcemanager.go
   * ogleapis.com%2Fprojects%2F123/tagValues/456`).
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
   * Lists the TagBindings for the given cloud resource, as specified with
   * `parent`. NOTE: The `parent` field is expected to be a full resource name:
   * https://cloud.google.com/apis/design/resource_names#full_resource_name
   * (tagBindings.listTagBindings)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of TagBindings to return
   * in the response. The server allows a maximum of 300 TagBindings to return. If
   * unspecified, the server will use 100 as the default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListTagBindings` that indicates where this listing should
   * continue from.
   * @opt_param string parent Required. The full resource name of a resource for
   * which you want to list existing TagBindings. E.g.
   * "//cloudresourcemanager.googleapis.com/projects/123"
   * @return ListTagBindingsResponse
   */
  public function listTagBindings($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTagBindingsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TagBindings::class, 'Google_Service_CloudResourceManager_Resource_TagBindings');
