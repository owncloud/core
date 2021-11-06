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

namespace Google\Service\BigQueryConnectionService;

class CloudSqlProperties extends \Google\Model
{
  protected $credentialType = CloudSqlCredential::class;
  protected $credentialDataType = '';
  public $database;
  public $instanceId;
  public $type;

  /**
   * @param CloudSqlCredential
   */
  public function setCredential(CloudSqlCredential $credential)
  {
    $this->credential = $credential;
  }
  /**
   * @return CloudSqlCredential
   */
  public function getCredential()
  {
    return $this->credential;
  }
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  public function getDatabase()
  {
    return $this->database;
  }
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSqlProperties::class, 'Google_Service_BigQueryConnectionService_CloudSqlProperties');
