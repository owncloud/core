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
 * The "migrationJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datamigrationService = new Google_Service_DatabaseMigrationService(...);
 *   $migrationJobs = $datamigrationService->migrationJobs;
 *  </code>
 */
class Google_Service_DatabaseMigrationService_Resource_ProjectsLocationsMigrationJobs extends Google_Service_Resource
{
  /**
   * Creates a new migration job in a given project and location.
   * (migrationJobs.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * migration jobs.
   * @param Google_Service_DatabaseMigrationService_MigrationJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string migrationJobId Required. The ID of the instance to create.
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function create($parent, Google_Service_DatabaseMigrationService_MigrationJob $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Deletes a single migration job. (migrationJobs.delete)
   *
   * @param string $name Required. Name of the migration job resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force The destination CloudSQL connection profile is always
   * deleted with the migration job. In case of force delete, the destination
   * CloudSQL replica database is also deleted.
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Generate a SSH configuration script to configure the reverse SSH
   * connectivity. (migrationJobs.generateSshScript)
   *
   * @param string $migrationJob Name of the migration job resource to generate
   * the SSH script.
   * @param Google_Service_DatabaseMigrationService_GenerateSshScriptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_SshScript
   */
  public function generateSshScript($migrationJob, Google_Service_DatabaseMigrationService_GenerateSshScriptRequest $postBody, $optParams = array())
  {
    $params = array('migrationJob' => $migrationJob, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateSshScript', array($params), "Google_Service_DatabaseMigrationService_SshScript");
  }
  /**
   * Gets details of a single migration job. (migrationJobs.get)
   *
   * @param string $name Required. Name of the migration job resource to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_MigrationJob
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DatabaseMigrationService_MigrationJob");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (migrationJobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_DatabaseMigrationService_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_DatabaseMigrationService_Policy");
  }
  /**
   * Lists migration jobs in a given project and location.
   * (migrationJobs.listProjectsLocationsMigrationJobs)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * migrationJobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters migration jobs
   * listed in the response. The expression must specify the field name, a
   * comparison operator, and the value that you want to use for filtering. The
   * value must be a string, a number, or a boolean. The comparison operator must
   * be either =, !=, >, or <. For example, list migration jobs created this year
   * by specifying **createTime %gt; 2020-01-01T00:00:00.000000000Z.** You can
   * also filter nested fields. For example, you could specify
   * **reverseSshConnectivity.vmIp = "1.2.3.4"** to select all migration jobs
   * connecting through the specific SSH tunnel bastion.
   * @opt_param string orderBy Sort the results based on the migration job name.
   * Valid values are: "name", "name asc", and "name desc".
   * @opt_param int pageSize The maximum number of migration jobs to return. The
   * service may return fewer than this value. If unspecified, at most 50
   * migration jobs will be returned. The maximum value is 1000; values above 1000
   * will be coerced to 1000.
   * @opt_param string pageToken The nextPageToken value received in the previous
   * call to migrationJobs.list, used in the subsequent request to retrieve the
   * next page of results. On first call this should be left blank. When
   * paginating, all other parameters provided to migrationJobs.list must match
   * the call that provided the page token.
   * @return Google_Service_DatabaseMigrationService_ListMigrationJobsResponse
   */
  public function listProjectsLocationsMigrationJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DatabaseMigrationService_ListMigrationJobsResponse");
  }
  /**
   * Updates the parameters of a single migration job. (migrationJobs.patch)
   *
   * @param string $name The name (URI) of this migration job resource, in the
   * form of: projects/{project}/locations/{location}/instances/{instance}.
   * @param Google_Service_DatabaseMigrationService_MigrationJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @opt_param string updateMask Required. Field mask is used to specify the
   * fields to be overwritten in the migration job resource by the update.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function patch($name, Google_Service_DatabaseMigrationService_MigrationJob $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Promote a migration job, stopping replication to the destination and
   * promoting the destination to be a standalone database.
   * (migrationJobs.promote)
   *
   * @param string $name Name of the migration job resource to promote.
   * @param Google_Service_DatabaseMigrationService_PromoteMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function promote($name, Google_Service_DatabaseMigrationService_PromoteMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('promote', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Restart a stopped or failed migration job, resetting the destination instance
   * to its original state and starting the migration process from scratch.
   * (migrationJobs.restart)
   *
   * @param string $name Name of the migration job resource to restart.
   * @param Google_Service_DatabaseMigrationService_RestartMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function restart($name, Google_Service_DatabaseMigrationService_RestartMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Resume a migration job that is currently stopped and is resumable (was
   * stopped during CDC phase). (migrationJobs.resume)
   *
   * @param string $name Name of the migration job resource to resume.
   * @param Google_Service_DatabaseMigrationService_ResumeMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function resume($name, Google_Service_DatabaseMigrationService_ResumeMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (migrationJobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_DatabaseMigrationService_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Policy
   */
  public function setIamPolicy($resource, Google_Service_DatabaseMigrationService_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_DatabaseMigrationService_Policy");
  }
  /**
   * Start an already created migration job. (migrationJobs.start)
   *
   * @param string $name Name of the migration job resource to start.
   * @param Google_Service_DatabaseMigrationService_StartMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function start($name, Google_Service_DatabaseMigrationService_StartMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('start', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Stops a running migration job. (migrationJobs.stop)
   *
   * @param string $name Name of the migration job resource to stop.
   * @param Google_Service_DatabaseMigrationService_StopMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function stop($name, Google_Service_DatabaseMigrationService_StopMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (migrationJobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_DatabaseMigrationService_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_DatabaseMigrationService_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_DatabaseMigrationService_TestIamPermissionsResponse");
  }
  /**
   * Verify a migration job, making sure the destination can reach the source and
   * that all configuration and prerequisites are met. (migrationJobs.verify)
   *
   * @param string $name Name of the migration job resource to verify.
   * @param Google_Service_DatabaseMigrationService_VerifyMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DatabaseMigrationService_Operation
   */
  public function verify($name, Google_Service_DatabaseMigrationService_VerifyMigrationJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params), "Google_Service_DatabaseMigrationService_Operation");
  }
}
