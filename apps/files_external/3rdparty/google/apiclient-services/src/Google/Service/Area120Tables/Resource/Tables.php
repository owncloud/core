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
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $area120tablesService = new Google_Service_Area120Tables(...);
 *   $tables = $area120tablesService->tables;
 *  </code>
 */
class Google_Service_Area120Tables_Resource_Tables extends Google_Service_Resource
{
  /**
   * Gets a table. Returns NOT_FOUND if the table does not exist. (tables.get)
   *
   * @param string $name Required. The name of the table to retrieve. Format:
   * tables/{table}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Area120Tables_Table
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Area120Tables_Table");
  }
  /**
   * Lists tables for the user. (tables.listTables)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, received from a previous
   * `ListTables` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListTables` must match the call
   * that provided the page token.
   * @opt_param int pageSize The maximum number of tables to return. The service
   * may return fewer than this value. If unspecified, at most 20 tables are
   * returned. The maximum value is 100; values above 100 are coerced to 100.
   * @return Google_Service_Area120Tables_ListTablesResponse
   */
  public function listTables($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Area120Tables_ListTablesResponse");
  }
}
