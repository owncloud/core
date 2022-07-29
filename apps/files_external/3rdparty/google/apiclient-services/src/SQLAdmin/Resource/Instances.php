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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\DatabaseInstance;
use Google\Service\SQLAdmin\InstancesCloneRequest;
use Google\Service\SQLAdmin\InstancesDemoteMasterRequest;
use Google\Service\SQLAdmin\InstancesExportRequest;
use Google\Service\SQLAdmin\InstancesFailoverRequest;
use Google\Service\SQLAdmin\InstancesImportRequest;
use Google\Service\SQLAdmin\InstancesListResponse;
use Google\Service\SQLAdmin\InstancesListServerCasResponse;
use Google\Service\SQLAdmin\InstancesRestoreBackupRequest;
use Google\Service\SQLAdmin\InstancesRotateServerCaRequest;
use Google\Service\SQLAdmin\InstancesTruncateLogRequest;
use Google\Service\SQLAdmin\Operation;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $instances = $sqladminService->instances;
 *  </code>
 */
class Instances extends \Google\Service\Resource
{
  /**
   * Adds a new trusted Certificate Authority (CA) version for the specified
   * instance. Required to prepare for a certificate rotation. If a CA version was
   * previously added but never used in a certificate rotation, this operation
   * replaces that version. There cannot be more than one CA version waiting to be
   * rotated in. (instances.addServerCa)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function addServerCa($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('addServerCa', [$params], Operation::class);
  }
  /**
   * Creates a Cloud SQL instance as a clone of the source instance. Using this
   * operation might cause your instance to restart. (instances.cloneInstances)
   *
   * @param string $project Project ID of the source as well as the clone Cloud
   * SQL instance.
   * @param string $instance The ID of the Cloud SQL instance to be cloned
   * (source). This does not include the project ID.
   * @param InstancesCloneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cloneInstances($project, $instance, InstancesCloneRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('clone', [$params], Operation::class);
  }
  /**
   * Deletes a Cloud SQL instance. (instances.delete)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be deleted.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Demotes the stand-alone instance to be a Cloud SQL read replica for an
   * external database server. (instances.demoteMaster)
   *
   * @param string $project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance name.
   * @param InstancesDemoteMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function demoteMaster($project, $instance, InstancesDemoteMasterRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('demoteMaster', [$params], Operation::class);
  }
  /**
   * Exports data from a Cloud SQL instance to a Cloud Storage bucket as a SQL
   * dump or CSV file. (instances.export)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be exported.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesExportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function export($project, $instance, InstancesExportRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], Operation::class);
  }
  /**
   * Initiates a manual failover of a high availability (HA) primary instance to a
   * standby instance, which becomes the primary instance. Users are then rerouted
   * to the new primary. For more information, see the [Overview of high
   * availability](https://cloud.google.com/sql/docs/mysql/high-availability) page
   * in the Cloud SQL documentation. If using Legacy HA (MySQL only), this causes
   * the instance to failover to its failover replica instance.
   * (instances.failover)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesFailoverRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function failover($project, $instance, InstancesFailoverRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('failover', [$params], Operation::class);
  }
  /**
   * Retrieves a resource containing information about a Cloud SQL instance.
   * (instances.get)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Database instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return DatabaseInstance
   */
  public function get($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DatabaseInstance::class);
  }
  /**
   * Imports data into a Cloud SQL instance from a SQL dump or CSV file in Cloud
   * Storage. (instances.import)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesImportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function import($project, $instance, InstancesImportRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Operation::class);
  }
  /**
   * Creates a new Cloud SQL instance. (instances.insert)
   *
   * @param string $project Project ID of the project to which the newly created
   * Cloud SQL instances should belong.
   * @param DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function insert($project, DatabaseInstance $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Lists instances under a given project. (instances.listInstances)
   *
   * @param string $project Project ID of the project for which to list Cloud SQL
   * instances.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression is in the form of field:value. For example,
   * 'instanceType:CLOUD_SQL_INSTANCE'. Fields can be nested as needed as per
   * their JSON representation, such as 'settings.userLabels.auto_start:true'.
   * Multiple filter queries are space-separated. For example. 'state:RUNNABLE
   * instanceType:CLOUD_SQL_INSTANCE'. By default, each expression is an AND
   * expression. However, you can include AND and OR expressions explicitly.
   * @opt_param string maxResults The maximum number of instances to return. The
   * service may return fewer than this value. If unspecified, at most 500
   * instances are returned. The maximum value is 1000; values above 1000 are
   * coerced to 1000.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @return InstancesListResponse
   */
  public function listInstances($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], InstancesListResponse::class);
  }
  /**
   * Lists all of the trusted Certificate Authorities (CAs) for the specified
   * instance. There can be up to three CAs listed: the CA that was used to sign
   * the certificate that is currently in use, a CA that has been added but not
   * yet used to sign a certificate, and a CA used to sign a certificate that has
   * previously rotated out. (instances.listServerCas)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return InstancesListServerCasResponse
   */
  public function listServerCas($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('listServerCas', [$params], InstancesListServerCasResponse::class);
  }
  /**
   * Updates settings of a Cloud SQL instance. This method supports patch
   * semantics. (instances.patch)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function patch($project, $instance, DatabaseInstance $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Promotes the read replica instance to be a stand-alone Cloud SQL instance.
   * Using this operation might cause your instance to restart.
   * (instances.promoteReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function promoteReplica($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('promoteReplica', [$params], Operation::class);
  }
  /**
   * Deletes all client certificates and generates a new server SSL certificate
   * for the instance. (instances.resetSslConfig)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function resetSslConfig($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('resetSslConfig', [$params], Operation::class);
  }
  /**
   * Restarts a Cloud SQL instance. (instances.restart)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be restarted.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function restart($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('restart', [$params], Operation::class);
  }
  /**
   * Restores a backup of a Cloud SQL instance. Using this operation might cause
   * your instance to restart. (instances.restoreBackup)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesRestoreBackupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function restoreBackup($project, $instance, InstancesRestoreBackupRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restoreBackup', [$params], Operation::class);
  }
  /**
   * Rotates the server certificate to one signed by the Certificate Authority
   * (CA) version previously added with the addServerCA method.
   * (instances.rotateServerCa)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesRotateServerCaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function rotateServerCa($project, $instance, InstancesRotateServerCaRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rotateServerCa', [$params], Operation::class);
  }
  /**
   * Starts the replication in the read replica instance. (instances.startReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function startReplica($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('startReplica', [$params], Operation::class);
  }
  /**
   * Stops the replication in the read replica instance. (instances.stopReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stopReplica($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('stopReplica', [$params], Operation::class);
  }
  /**
   * Truncate MySQL general and slow query log tables MySQL only.
   * (instances.truncateLog)
   *
   * @param string $project Project ID of the Cloud SQL project.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param InstancesTruncateLogRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function truncateLog($project, $instance, InstancesTruncateLogRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('truncateLog', [$params], Operation::class);
  }
  /**
   * Updates settings of a Cloud SQL instance. Using this operation might cause
   * your instance to restart. (instances.update)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($project, $instance, DatabaseInstance $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instances::class, 'Google_Service_SQLAdmin_Resource_Instances');
