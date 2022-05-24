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

namespace Google\Service\Area120Tables\Resource;

use Google\Service\Area120Tables\Area120tablesEmpty;
use Google\Service\Area120Tables\BatchCreateRowsRequest;
use Google\Service\Area120Tables\BatchCreateRowsResponse;
use Google\Service\Area120Tables\BatchDeleteRowsRequest;
use Google\Service\Area120Tables\BatchUpdateRowsRequest;
use Google\Service\Area120Tables\BatchUpdateRowsResponse;
use Google\Service\Area120Tables\ListRowsResponse;
use Google\Service\Area120Tables\Row;

/**
 * The "rows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $area120tablesService = new Google\Service\Area120Tables(...);
 *   $rows = $area120tablesService->rows;
 *  </code>
 */
class TablesRows extends \Google\Service\Resource
{
  /**
   * Creates multiple rows. (rows.batchCreate)
   *
   * @param string $parent Required. The parent table where the rows will be
   * created. Format: tables/{table}
   * @param BatchCreateRowsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreateRowsResponse
   */
  public function batchCreate($parent, BatchCreateRowsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], BatchCreateRowsResponse::class);
  }
  /**
   * Deletes multiple rows. (rows.batchDelete)
   *
   * @param string $parent Required. The parent table shared by all rows being
   * deleted. Format: tables/{table}
   * @param BatchDeleteRowsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Area120tablesEmpty
   */
  public function batchDelete($parent, BatchDeleteRowsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], Area120tablesEmpty::class);
  }
  /**
   * Updates multiple rows. (rows.batchUpdate)
   *
   * @param string $parent Required. The parent table shared by all rows being
   * updated. Format: tables/{table}
   * @param BatchUpdateRowsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateRowsResponse
   */
  public function batchUpdate($parent, BatchUpdateRowsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdateRowsResponse::class);
  }
  /**
   * Creates a row. (rows.create)
   *
   * @param string $parent Required. The parent table where this row will be
   * created. Format: tables/{table}
   * @param Row $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. Column key to use for values in the row.
   * Defaults to user entered name.
   * @return Row
   */
  public function create($parent, Row $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Row::class);
  }
  /**
   * Deletes a row. (rows.delete)
   *
   * @param string $name Required. The name of the row to delete. Format:
   * tables/{table}/rows/{row}
   * @param array $optParams Optional parameters.
   * @return Area120tablesEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Area120tablesEmpty::class);
  }
  /**
   * Gets a row. Returns NOT_FOUND if the row does not exist in the table.
   * (rows.get)
   *
   * @param string $name Required. The name of the row to retrieve. Format:
   * tables/{table}/rows/{row}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. Column key to use for values in the row.
   * Defaults to user entered name.
   * @return Row
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Row::class);
  }
  /**
   * Lists rows in a table. Returns NOT_FOUND if the table does not exist.
   * (rows.listTablesRows)
   *
   * @param string $parent Required. The parent table. Format: tables/{table}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter to only include resources matching
   * the requirements. For more information, see [Filtering list
   * results](https://support.google.com/area120-tables/answer/10503371).
   * @opt_param string orderBy Optional. Sorting order for the list of rows on
   * createTime/updateTime.
   * @opt_param int pageSize The maximum number of rows to return. The service may
   * return fewer than this value. If unspecified, at most 50 rows are returned.
   * The maximum value is 1,000; values above 1,000 are coerced to 1,000.
   * @opt_param string pageToken A page token, received from a previous `ListRows`
   * call. Provide this to retrieve the subsequent page. When paginating, all
   * other parameters provided to `ListRows` must match the call that provided the
   * page token.
   * @opt_param string view Optional. Column key to use for values in the row.
   * Defaults to user entered name.
   * @return ListRowsResponse
   */
  public function listTablesRows($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRowsResponse::class);
  }
  /**
   * Updates a row. (rows.patch)
   *
   * @param string $name The resource name of the row. Row names have the form
   * `tables/{table}/rows/{row}`. The name is ignored when creating a row.
   * @param Row $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to update.
   * @opt_param string view Optional. Column key to use for values in the row.
   * Defaults to user entered name.
   * @return Row
   */
  public function patch($name, Row $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Row::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TablesRows::class, 'Google_Service_Area120Tables_Resource_TablesRows');
