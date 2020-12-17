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
 *   $bigtableadminService = new Google_Service_BigtableAdmin(...);
 *   $tables = $bigtableadminService->tables;
 *  </code>
 */
class Google_Service_BigtableAdmin_Resource_ProjectsInstancesTables extends Google_Service_Resource
{
  /**
   * Checks replication consistency based on a consistency token, that is, if
   * replication has caught up based on the conditions specified in the token and
   * the check request. (tables.checkConsistency)
   *
   * @param string $name Required. The unique name of the Table for which to check
   * replication consistency. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param Google_Service_BigtableAdmin_CheckConsistencyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_CheckConsistencyResponse
   */
  public function checkConsistency($name, Google_Service_BigtableAdmin_CheckConsistencyRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('checkConsistency', array($params), "Google_Service_BigtableAdmin_CheckConsistencyResponse");
  }
  /**
   * Creates a new table in the specified instance. The table can be created with
   * a full set of initial column families, specified in the request.
   * (tables.create)
   *
   * @param string $parent Required. The unique name of the instance in which to
   * create the table. Values are of the form
   * `projects/{project}/instances/{instance}`.
   * @param Google_Service_BigtableAdmin_CreateTableRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Table
   */
  public function create($parent, Google_Service_BigtableAdmin_CreateTableRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigtableAdmin_Table");
  }
  /**
   * Permanently deletes a specified table and all of its data. (tables.delete)
   *
   * @param string $name Required. The unique name of the table to be deleted.
   * Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_BigtableadminEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_BigtableAdmin_BigtableadminEmpty");
  }
  /**
   * Permanently drop/delete a row range from a specified table. The request can
   * specify whether to delete all rows in a table, or only those that match a
   * particular prefix. (tables.dropRowRange)
   *
   * @param string $name Required. The unique name of the table on which to drop a
   * range of rows. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param Google_Service_BigtableAdmin_DropRowRangeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_BigtableadminEmpty
   */
  public function dropRowRange($name, Google_Service_BigtableAdmin_DropRowRangeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('dropRowRange', array($params), "Google_Service_BigtableAdmin_BigtableadminEmpty");
  }
  /**
   * Generates a consistency token for a Table, which can be used in
   * CheckConsistency to check whether mutations to the table that finished before
   * this call started have been replicated. The tokens will be available for 90
   * days. (tables.generateConsistencyToken)
   *
   * @param string $name Required. The unique name of the Table for which to
   * create a consistency token. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param Google_Service_BigtableAdmin_GenerateConsistencyTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_GenerateConsistencyTokenResponse
   */
  public function generateConsistencyToken($name, Google_Service_BigtableAdmin_GenerateConsistencyTokenRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateConsistencyToken', array($params), "Google_Service_BigtableAdmin_GenerateConsistencyTokenResponse");
  }
  /**
   * Gets metadata information about the specified table. (tables.get)
   *
   * @param string $name Required. The unique name of the requested table. Values
   * are of the form `projects/{project}/instances/{instance}/tables/{table}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The view to be applied to the returned table's fields.
   * Defaults to `SCHEMA_VIEW` if unspecified.
   * @return Google_Service_BigtableAdmin_Table
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigtableAdmin_Table");
  }
  /**
   * Gets the access control policy for a Table resource. Returns an empty policy
   * if the resource exists but does not have a policy set. (tables.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_BigtableAdmin_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Policy
   */
  public function getIamPolicy($resource, Google_Service_BigtableAdmin_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_BigtableAdmin_Policy");
  }
  /**
   * Lists all tables served from a specified instance.
   * (tables.listProjectsInstancesTables)
   *
   * @param string $parent Required. The unique name of the instance for which
   * tables should be listed. Values are of the form
   * `projects/{project}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of results per page. A page_size of
   * zero lets the server choose the number of items to return. A page_size which
   * is strictly positive will return at most that many items. A negative
   * page_size will cause an error. Following the first request, subsequent
   * paginated calls are not required to pass a page_size. If a page_size is set
   * in subsequent calls, it must match the page_size given in the first request.
   * @opt_param string pageToken The value of `next_page_token` returned by a
   * previous call.
   * @opt_param string view The view to be applied to the returned tables' fields.
   * Only NAME_ONLY view (default) and REPLICATION_VIEW are supported.
   * @return Google_Service_BigtableAdmin_ListTablesResponse
   */
  public function listProjectsInstancesTables($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigtableAdmin_ListTablesResponse");
  }
  /**
   * Performs a series of column family modifications on the specified table.
   * Either all or none of the modifications will occur before this method
   * returns, but data requests received prior to that point may see a table where
   * only some modifications have taken effect. (tables.modifyColumnFamilies)
   *
   * @param string $name Required. The unique name of the table whose families
   * should be modified. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param Google_Service_BigtableAdmin_ModifyColumnFamiliesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Table
   */
  public function modifyColumnFamilies($name, Google_Service_BigtableAdmin_ModifyColumnFamiliesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyColumnFamilies', array($params), "Google_Service_BigtableAdmin_Table");
  }
  /**
   * Create a new table by restoring from a completed backup. The new table must
   * be in the same instance as the instance containing the backup. The returned
   * table long-running operation can be used to track the progress of the
   * operation, and to cancel it. The metadata field type is RestoreTableMetadata.
   * The response type is Table, if successful. (tables.restore)
   *
   * @param string $parent Required. The name of the instance in which to create
   * the restored table. This instance must be the parent of the source backup.
   * Values are of the form `projects//instances/`.
   * @param Google_Service_BigtableAdmin_RestoreTableRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Operation
   */
  public function restore($parent, Google_Service_BigtableAdmin_RestoreTableRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_BigtableAdmin_Operation");
  }
  /**
   * Sets the access control policy on a Table resource. Replaces any existing
   * policy. (tables.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_BigtableAdmin_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Policy
   */
  public function setIamPolicy($resource, Google_Service_BigtableAdmin_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_BigtableAdmin_Policy");
  }
  /**
   * Returns permissions that the caller has on the specified table resource.
   * (tables.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_BigtableAdmin_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_BigtableAdmin_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_BigtableAdmin_TestIamPermissionsResponse");
  }
}
