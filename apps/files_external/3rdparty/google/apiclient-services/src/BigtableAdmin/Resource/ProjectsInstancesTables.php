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

namespace Google\Service\BigtableAdmin\Resource;

use Google\Service\BigtableAdmin\BigtableadminEmpty;
use Google\Service\BigtableAdmin\CheckConsistencyRequest;
use Google\Service\BigtableAdmin\CheckConsistencyResponse;
use Google\Service\BigtableAdmin\CreateTableRequest;
use Google\Service\BigtableAdmin\DropRowRangeRequest;
use Google\Service\BigtableAdmin\GenerateConsistencyTokenRequest;
use Google\Service\BigtableAdmin\GenerateConsistencyTokenResponse;
use Google\Service\BigtableAdmin\GetIamPolicyRequest;
use Google\Service\BigtableAdmin\ListTablesResponse;
use Google\Service\BigtableAdmin\ModifyColumnFamiliesRequest;
use Google\Service\BigtableAdmin\Operation;
use Google\Service\BigtableAdmin\Policy;
use Google\Service\BigtableAdmin\RestoreTableRequest;
use Google\Service\BigtableAdmin\SetIamPolicyRequest;
use Google\Service\BigtableAdmin\Table;
use Google\Service\BigtableAdmin\TestIamPermissionsRequest;
use Google\Service\BigtableAdmin\TestIamPermissionsResponse;
use Google\Service\BigtableAdmin\UndeleteTableRequest;

/**
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigtableadminService = new Google\Service\BigtableAdmin(...);
 *   $tables = $bigtableadminService->tables;
 *  </code>
 */
class ProjectsInstancesTables extends \Google\Service\Resource
{
  /**
   * Checks replication consistency based on a consistency token, that is, if
   * replication has caught up based on the conditions specified in the token and
   * the check request. (tables.checkConsistency)
   *
   * @param string $name Required. The unique name of the Table for which to check
   * replication consistency. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param CheckConsistencyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CheckConsistencyResponse
   */
  public function checkConsistency($name, CheckConsistencyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkConsistency', [$params], CheckConsistencyResponse::class);
  }
  /**
   * Creates a new table in the specified instance. The table can be created with
   * a full set of initial column families, specified in the request.
   * (tables.create)
   *
   * @param string $parent Required. The unique name of the instance in which to
   * create the table. Values are of the form
   * `projects/{project}/instances/{instance}`.
   * @param CreateTableRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Table
   */
  public function create($parent, CreateTableRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Table::class);
  }
  /**
   * Permanently deletes a specified table and all of its data. (tables.delete)
   *
   * @param string $name Required. The unique name of the table to be deleted.
   * Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param array $optParams Optional parameters.
   * @return BigtableadminEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigtableadminEmpty::class);
  }
  /**
   * Permanently drop/delete a row range from a specified table. The request can
   * specify whether to delete all rows in a table, or only those that match a
   * particular prefix. (tables.dropRowRange)
   *
   * @param string $name Required. The unique name of the table on which to drop a
   * range of rows. Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param DropRowRangeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BigtableadminEmpty
   */
  public function dropRowRange($name, DropRowRangeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('dropRowRange', [$params], BigtableadminEmpty::class);
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
   * @param GenerateConsistencyTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateConsistencyTokenResponse
   */
  public function generateConsistencyToken($name, GenerateConsistencyTokenRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateConsistencyToken', [$params], GenerateConsistencyTokenResponse::class);
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
   * @return Table
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Table::class);
  }
  /**
   * Gets the access control policy for a Table resource. Returns an empty policy
   * if the resource exists but does not have a policy set. (tables.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
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
   * Only NAME_ONLY view (default), REPLICATION_VIEW and ENCRYPTION_VIEW are
   * supported.
   * @return ListTablesResponse
   */
  public function listProjectsInstancesTables($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTablesResponse::class);
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
   * @param ModifyColumnFamiliesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Table
   */
  public function modifyColumnFamilies($name, ModifyColumnFamiliesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyColumnFamilies', [$params], Table::class);
  }
  /**
   * Create a new table by restoring from a completed backup. The new table must
   * be in the same project as the instance containing the backup. The returned
   * table long-running operation can be used to track the progress of the
   * operation, and to cancel it. The metadata field type is RestoreTableMetadata.
   * The response type is Table, if successful. (tables.restore)
   *
   * @param string $parent Required. The name of the instance in which to create
   * the restored table. This instance must be in the same project as the source
   * backup. Values are of the form `projects//instances/`.
   * @param RestoreTableRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function restore($parent, RestoreTableRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restore', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on a Table resource. Replaces any existing
   * policy. (tables.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that the caller has on the specified table resource.
   * (tables.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
  /**
   * Restores a specified table which was accidentally deleted. (tables.undelete)
   *
   * @param string $name Required. The unique name of the table to be restored.
   * Values are of the form
   * `projects/{project}/instances/{instance}/tables/{table}`.
   * @param UndeleteTableRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function undelete($name, UndeleteTableRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstancesTables::class, 'Google_Service_BigtableAdmin_Resource_ProjectsInstancesTables');
