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
 * The "backups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigtableadminService = new Google_Service_BigtableAdmin(...);
 *   $backups = $bigtableadminService->backups;
 *  </code>
 */
class Google_Service_BigtableAdmin_Resource_ProjectsInstancesClustersBackups extends Google_Service_Resource
{
  /**
   * Starts creating a new Cloud Bigtable Backup.  The returned backup long-
   * running operation can be used to track creation of the backup. The metadata
   * field type is CreateBackupMetadata. The response field type is Backup, if
   * successful. Cancelling the returned operation will stop the creation and
   * delete the backup. (backups.create)
   *
   * @param string $parent Required. This must be one of the clusters in the
   * instance in which this table is located. The backup will be stored in this
   * cluster. Values are of the form
   * `projects/{project}/instances/{instance}/clusters/{cluster}`.
   * @param Google_Service_BigtableAdmin_Backup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string backupId Required. The id of the backup to be created. The
   * `backup_id` along with the parent `parent` are combined as
   * {parent}/backups/{backup_id} to create the full backup name, of the form: `pr
   * ojects/{project}/instances/{instance}/clusters/{cluster}/backups/{backup_id}`
   * . This string must be between 1 and 50 characters in length and match the
   * regex _a-zA-Z0-9*.
   * @return Google_Service_BigtableAdmin_Operation
   */
  public function create($parent, Google_Service_BigtableAdmin_Backup $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigtableAdmin_Operation");
  }
  /**
   * Deletes a pending or completed Cloud Bigtable backup. (backups.delete)
   *
   * @param string $name Required. Name of the backup to delete. Values are of the
   * form `projects/{project}/instances/{instance}/clusters/{cluster}/backups/{bac
   * kup}`.
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
   * Gets metadata on a pending or completed Cloud Bigtable Backup. (backups.get)
   *
   * @param string $name Required. Name of the backup. Values are of the form `pro
   * jects/{project}/instances/{instance}/clusters/{cluster}/backups/{backup}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigtableAdmin_Backup
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigtableAdmin_Backup");
  }
  /**
   * Gets the access control policy for a Table resource. Returns an empty policy
   * if the resource exists but does not have a policy set. (backups.getIamPolicy)
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
   * Lists Cloud Bigtable backups. Returns both completed and pending backups.
   * (backups.listProjectsInstancesClustersBackups)
   *
   * @param string $parent Required. The cluster to list backups from.  Values are
   * of the form `projects/{project}/instances/{instance}/clusters/{cluster}`. Use
   * `{cluster} = '-'` to list backups for all clusters in an instance, e.g.,
   * `projects/{project}/instances/{instance}/clusters/-`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters backups listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be <, >, <=,
   * >=, !=, =, or :. Colon ‘:’ represents a HAS operator which is roughly
   * synonymous with equality. Filter rules are case insensitive.
   *
   * The fields eligible for filtering are:   * `name`   * `source_table`   *
   * `state`   * `start_time` (and values are of the format YYYY-MM-DDTHH:MM:SSZ)
   * * `end_time` (and values are of the format YYYY-MM-DDTHH:MM:SSZ)   *
   * `expire_time` (and values are of the format YYYY-MM-DDTHH:MM:SSZ)   *
   * `size_bytes`
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. By default, each expression is an AND expression. However, you
   * can include AND, OR, and NOT expressions explicitly.
   *
   * Some examples of using filters are:
   *
   *   * `name:"exact"` --> The backup's name is the string "exact".   *
   * `name:howl` --> The backup's name contains the string "howl".   *
   * `source_table:prod`          --> The source_table's name contains the string
   * "prod".   * `state:CREATING` --> The backup is pending creation.   *
   * `state:READY` --> The backup is fully created and ready for use.   *
   * `(name:howl) AND (start_time < \"2018-03-28T14:50:00Z\")`          --> The
   * backup name contains the string "howl" and start_time              of the
   * backup is before 2018-03-28T14:50:00Z.   * `size_bytes > 10000000000` --> The
   * backup's size is greater than 10GB
   * @opt_param string orderBy An expression for specifying the sort order of the
   * results of the request. The string value should specify one or more fields in
   * Backup. The full syntax is described at https://aip.dev/132#ordering.
   *
   * Fields supported are:    * name    * source_table    * expire_time    *
   * start_time    * end_time    * size_bytes    * state
   *
   * For example, "start_time". The default sorting order is ascending. To specify
   * descending order for the field, a suffix " desc" should be appended to the
   * field name. For example, "start_time desc". Redundant space characters in the
   * syntax are insigificant.
   *
   * If order_by is empty, results will be sorted by `start_time` in descending
   * order starting from the most recently created backup.
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListBackupsResponse to the same `parent` and
   * with the same `filter`.
   * @opt_param int pageSize Number of backups to be returned in the response. If
   * 0 or less, defaults to the server's maximum allowed page size.
   * @return Google_Service_BigtableAdmin_ListBackupsResponse
   */
  public function listProjectsInstancesClustersBackups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigtableAdmin_ListBackupsResponse");
  }
  /**
   * Updates a pending or completed Cloud Bigtable Backup. (backups.patch)
   *
   * @param string $name A globally unique identifier for the backup which cannot
   * be changed. Values are of the form
   * `projects/{project}/instances/{instance}/clusters/{cluster}/    backups/_a-
   * zA-Z0-9*` The final segment of the name must be between 1 and 50 characters
   * in length.
   *
   * The backup is stored in the cluster identified by the prefix of the backup
   * name of the form
   * `projects/{project}/instances/{instance}/clusters/{cluster}`.
   * @param Google_Service_BigtableAdmin_Backup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying which fields (e.g.
   * `expire_time`) in the Backup resource should be updated. This mask is
   * relative to the Backup resource, not to the request message. The field mask
   * must always be specified; this prevents any future fields from being erased
   * accidentally by clients that do not know about them.
   * @return Google_Service_BigtableAdmin_Backup
   */
  public function patch($name, Google_Service_BigtableAdmin_Backup $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_BigtableAdmin_Backup");
  }
  /**
   * Sets the access control policy on a Table resource. Replaces any existing
   * policy. (backups.setIamPolicy)
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
   * (backups.testIamPermissions)
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
