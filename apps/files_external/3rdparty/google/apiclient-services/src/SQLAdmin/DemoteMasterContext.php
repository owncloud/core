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

class DemoteMasterContext extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $masterInstanceName;
  protected $replicaConfigurationType = DemoteMasterConfiguration::class;
  protected $replicaConfigurationDataType = '';
  /**
   * @var bool
   */
  public $skipReplicationSetup;
  /**
   * @var bool
   */
  public $verifyGtidConsistency;

  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setMasterInstanceName($masterInstanceName)
  {
    $this->masterInstanceName = $masterInstanceName;
  }
  /**
   * @return string
   */
  public function getMasterInstanceName()
  {
    return $this->masterInstanceName;
  }
  /**
   * @param DemoteMasterConfiguration
   */
  public function setReplicaConfiguration(DemoteMasterConfiguration $replicaConfiguration)
  {
    $this->replicaConfiguration = $replicaConfiguration;
  }
  /**
   * @return DemoteMasterConfiguration
   */
  public function getReplicaConfiguration()
  {
    return $this->replicaConfiguration;
  }
  /**
   * @param bool
   */
  public function setSkipReplicationSetup($skipReplicationSetup)
  {
    $this->skipReplicationSetup = $skipReplicationSetup;
  }
  /**
   * @return bool
   */
  public function getSkipReplicationSetup()
  {
    return $this->skipReplicationSetup;
  }
  /**
   * @param bool
   */
  public function setVerifyGtidConsistency($verifyGtidConsistency)
  {
    $this->verifyGtidConsistency = $verifyGtidConsistency;
  }
  /**
   * @return bool
   */
  public function getVerifyGtidConsistency()
  {
    return $this->verifyGtidConsistency;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DemoteMasterContext::class, 'Google_Service_SQLAdmin_DemoteMasterContext');
