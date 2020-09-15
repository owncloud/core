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
 * The "unmappedids" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $unmappedids = $cloudsearchService->unmappedids;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_DebugDatasourcesItemsUnmappedids extends Google_Service_Resource
{
  /**
   * List all unmapped identities for a specific item. **Note:** This API requires
   * an admin account to execute.
   * (unmappedids.listDebugDatasourcesItemsUnmappedids)
   *
   * @param string $parent The name of the item, in the following format:
   * datasources/{source_id}/items/{ID}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize Maximum number of items to fetch in a request.
   * Defaults to 100.
   * @return Google_Service_CloudSearch_ListUnmappedIdentitiesResponse
   */
  public function listDebugDatasourcesItemsUnmappedids($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudSearch_ListUnmappedIdentitiesResponse");
  }
}
