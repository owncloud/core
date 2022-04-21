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

use Google\Service\CloudResourceManager\ListTagHoldsResponse;
use Google\Service\CloudResourceManager\Operation;
use Google\Service\CloudResourceManager\TagHold;

/**
 * The "tagHolds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $tagHolds = $cloudresourcemanagerService->tagHolds;
 *  </code>
 */
class TagValuesTagHolds extends \Google\Service\Resource
{
  /**
   * Creates a TagHold. Returns ALREADY_EXISTS if a TagHold with the same resource
   * and origin exists under the same TagValue. (tagHolds.create)
   *
   * @param string $parent Required. The resource name of the TagHold's parent
   * TagValue. Must be of the form: `tagValues/{tag-value-id}`.
   * @param TagHold $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set to true to perform the validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Operation
   */
  public function create($parent, TagHold $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a TagHold. (tagHolds.delete)
   *
   * @param string $name Required. The resource name of the TagHold to delete.
   * Must be of the form: `tagValues/{tag-value-id}/tagHolds/{tag-hold-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set to true to perform the validations
   * necessary for deleting the resource, but not actually perform the action.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Lists TagHolds under a TagValue. (tagHolds.listTagValuesTagHolds)
   *
   * @param string $parent Required. The resource name of the parent TagValue.
   * Must be of the form: `tagValues/{tag-value-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Criteria used to select a subset of
   * TagHolds parented by the TagValue to return. This field follows the syntax
   * defined by aip.dev/160; the `holder` and `origin` fields are supported for
   * filtering. Currently only `AND` syntax is supported. Some example queries
   * are: * `holder = //compute.googleapis.com/compute/projects/myproject/regions
   * /us-east-1/instanceGroupManagers/instance-group` * `origin = 35678234` *
   * `holder = //compute.googleapis.com/compute/projects/myproject/regions/us-
   * east-1/instanceGroupManagers/instance-group AND origin = 35678234`
   * @opt_param int pageSize Optional. The maximum number of TagHolds to return in
   * the response. The server allows a maximum of 300 TagHolds to return. If
   * unspecified, the server will use 100 as the default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListTagHolds` that indicates where this listing should
   * continue from.
   * @return ListTagHoldsResponse
   */
  public function listTagValuesTagHolds($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTagHoldsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TagValuesTagHolds::class, 'Google_Service_CloudResourceManager_Resource_TagValuesTagHolds');
