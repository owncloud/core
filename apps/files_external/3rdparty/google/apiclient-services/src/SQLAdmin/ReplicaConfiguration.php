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

namespace Google\Service\SQLAdmin;

class ReplicaConfiguration extends \Google\Model
{
  public $failoverTarget;
  public $kind;
  protected $mysqlReplicaConfigurationType = MySqlReplicaConfiguration::class;
  protected $mysqlReplicaConfigurationDataType = '';

  public function setFailoverTarget($failoverTarget)
  {
    $this->failoverTarget = $failoverTarget;
  }
  public function getFailoverTarget()
  {
    return $this->failoverTarget;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param MySqlReplicaConfiguration
   */
  public function setMysqlReplicaConfiguration(MySqlReplicaConfiguration $mysqlReplicaConfiguration)
  {
    $this->mysqlReplicaConfiguration = $mysqlReplicaConfiguration;
  }
  /**
   * @return MySqlReplicaConfiguration
   */
  public function getMysqlReplicaConfiguration()
  {
    return $this->mysqlReplicaConfiguration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReplicaConfiguration::class, 'Google_Service_SQLAdmin_ReplicaConfiguration');
