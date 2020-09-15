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
 * The "shelves" collection of methods.
 * Typical usage is:
 *  <code>
 *   $libraryagentService = new Google_Service_Libraryagent(...);
 *   $shelves = $libraryagentService->shelves;
 *  </code>
 */
class Google_Service_Libraryagent_Resource_Shelves extends Google_Service_Resource
{
  /**
   * Gets a shelf. Returns NOT_FOUND if the shelf does not exist. (shelves.get)
   *
   * @param string $name Required. The name of the shelf to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Libraryagent_GoogleExampleLibraryagentV1Shelf
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Libraryagent_GoogleExampleLibraryagentV1Shelf");
  }
  /**
   * Lists shelves. The order is unspecified but deterministic. Newly created
   * shelves will not necessarily be added to the end of this list.
   * (shelves.listShelves)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Server may return fewer shelves
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListShelvesResponse.next_page_token returned from the previous call to
   * `ListShelves` method.
   * @return Google_Service_Libraryagent_GoogleExampleLibraryagentV1ListShelvesResponse
   */
  public function listShelves($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Libraryagent_GoogleExampleLibraryagentV1ListShelvesResponse");
  }
}
