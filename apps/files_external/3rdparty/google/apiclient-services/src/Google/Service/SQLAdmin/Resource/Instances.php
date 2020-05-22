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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqlService = new Google_Service_SQLAdmin(...);
 *   $instances = $sqlService->instances;
 *  </code>
 */
class Google_Service_SQLAdmin_Resource_Instances extends Google_Service_Resource
{
  /**
   * Add a new trusted Certificate Authority (CA) version for the specified
   * instance. Required to prepare for a certificate rotation. If a CA version was
   * previously added but never used in a certificate rotation, this operation
   * replaces that version. There cannot be more than one CA version waiting to be
   * rotated in. (instances.addServerCa)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function addServerCa($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('addServerCa', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Creates a Cloud SQL instance as a clone of the source instance. Using this
   * operation might cause your instance to restart. (instances.cloneInstances)
   *
   * @param string $project Project ID of the source as well as the clone Cloud
   * SQL instance.
   * @param string $instance The ID of the Cloud SQL instance to be cloned
   * (source). This does not include the project ID.
   * @param Google_Service_SQLAdmin_InstancesCloneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function cloneInstances($project, $instance, Google_Service_SQLAdmin_InstancesCloneRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clone', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Deletes a Cloud SQL instance. (instances.delete)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be deleted.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function delete($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Demotes the stand-alone instance to be a Cloud SQL read replica for an
   * external database server. (instances.demoteMaster)
   *
   * @param string $project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance name.
   * @param Google_Service_SQLAdmin_InstancesDemoteMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function demoteMaster($project, $instance, Google_Service_SQLAdmin_InstancesDemoteMasterRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('demoteMaster', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Exports data from a Cloud SQL instance to a Cloud Storage bucket as a SQL
   * dump or CSV file. (instances.export)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be exported.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesExportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function export($project, $instance, Google_Service_SQLAdmin_InstancesExportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Failover the instance to its failover replica instance. Using this operation
   * might cause your instance to restart. (instances.failover)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesFailoverRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function failover($project, $instance, Google_Service_SQLAdmin_InstancesFailoverRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('failover', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Retrieves a resource containing information about a Cloud SQL instance.
   * (instances.get)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Database instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_DatabaseInstance
   */
  public function get($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SQLAdmin_DatabaseInstance");
  }
  /**
   * Imports data into a Cloud SQL instance from a SQL dump  or CSV file in Cloud
   * Storage. (instances.import)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesImportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function import($project, $instance, Google_Service_SQLAdmin_InstancesImportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Creates a new Cloud SQL instance. (instances.insert)
   *
   * @param string $project Project ID of the project to which the newly created
   * Cloud SQL instances should belong.
   * @param Google_Service_SQLAdmin_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function insert($project, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Lists instances under a given project. (instances.listInstances)
   *
   * @param string $project Project ID of the project for which to list Cloud SQL
   * instances.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string maxResults The maximum number of results to return per
   * response.
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression is in the form of field:value. For example,
   * 'instanceType:CLOUD_SQL_INSTANCE'. Fields can be nested as needed as per
   * their JSON representation, such as 'settings.userLabels.auto_start:true'.
   *
   * Multiple filter queries are space-separated. For example. 'state:RUNNABLE
   * instanceType:CLOUD_SQL_INSTANCE'. By default, each expression is an AND
   * expression. However, you can include AND and OR expressions explicitly.
   * @return Google_Service_SQLAdmin_InstancesListResponse
   */
  public function listInstances($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_InstancesListResponse");
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
   * @return Google_Service_SQLAdmin_InstancesListServerCasResponse
   */
  public function listServerCas($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('listServerCas', array($params), "Google_Service_SQLAdmin_InstancesListServerCasResponse");
  }
  /**
   * Updates settings of a Cloud SQL instance. This method supports patch
   * semantics. (instances.patch)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function patch($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Promotes the read replica instance to be a stand-alone Cloud SQL instance.
   * Using this operation might cause your instance to restart.
   * (instances.promoteReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function promoteReplica($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('promoteReplica', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Deletes all client certificates and generates a new server SSL certificate
   * for the instance. (instances.resetSslConfig)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function resetSslConfig($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('resetSslConfig', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Restarts a Cloud SQL instance. (instances.restart)
   *
   * @param string $project Project ID of the project that contains the instance
   * to be restarted.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function restart($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Restores a backup of a Cloud SQL instance. Using this operation might cause
   * your instance to restart. (instances.restoreBackup)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesRestoreBackupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function restoreBackup($project, $instance, Google_Service_SQLAdmin_InstancesRestoreBackupRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restoreBackup', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Rotates the server certificate to one signed by the Certificate Authority
   * (CA) version previously added with the addServerCA method.
   * (instances.rotateServerCa)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesRotateServerCaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function rotateServerCa($project, $instance, Google_Service_SQLAdmin_InstancesRotateServerCaRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rotateServerCa', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Starts the replication in the read replica instance. (instances.startReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function startReplica($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('startReplica', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Stops the replication in the read replica instance. (instances.stopReplica)
   *
   * @param string $project ID of the project that contains the read replica.
   * @param string $instance Cloud SQL read replica instance name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function stopReplica($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('stopReplica', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Truncate MySQL general and slow query log tables (instances.truncateLog)
   *
   * @param string $project Project ID of the Cloud SQL project.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_InstancesTruncateLogRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function truncateLog($project, $instance, Google_Service_SQLAdmin_InstancesTruncateLogRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('truncateLog', array($params), "Google_Service_SQLAdmin_Operation");
  }
  /**
   * Updates settings of a Cloud SQL instance. Using this operation might cause
   * your instance to restart. (instances.update)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param Google_Service_SQLAdmin_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_Operation
   */
  public function update($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_SQLAdmin_Operation");
  }
}
