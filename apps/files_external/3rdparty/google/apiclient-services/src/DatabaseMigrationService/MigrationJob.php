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

namespace Google\Service\DatabaseMigrationService;

class MigrationJob extends \Google\Model
{
  public $createTime;
  public $destination;
  protected $destinationDatabaseType = DatabaseType::class;
  protected $destinationDatabaseDataType = '';
  public $displayName;
  public $dumpPath;
  public $duration;
  public $endTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $labels;
  public $name;
  public $phase;
  protected $reverseSshConnectivityType = ReverseSshConnectivity::class;
  protected $reverseSshConnectivityDataType = '';
  public $source;
  protected $sourceDatabaseType = DatabaseType::class;
  protected $sourceDatabaseDataType = '';
  public $state;
  protected $staticIpConnectivityType = StaticIpConnectivity::class;
  protected $staticIpConnectivityDataType = '';
  public $type;
  public $updateTime;
  protected $vpcPeeringConnectivityType = VpcPeeringConnectivity::class;
  protected $vpcPeeringConnectivityDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param DatabaseType
   */
  public function setDestinationDatabase(DatabaseType $destinationDatabase)
  {
    $this->destinationDatabase = $destinationDatabase;
  }
  /**
   * @return DatabaseType
   */
  public function getDestinationDatabase()
  {
    return $this->destinationDatabase;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDumpPath($dumpPath)
  {
    $this->dumpPath = $dumpPath;
  }
  public function getDumpPath()
  {
    return $this->dumpPath;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPhase($phase)
  {
    $this->phase = $phase;
  }
  public function getPhase()
  {
    return $this->phase;
  }
  /**
   * @param ReverseSshConnectivity
   */
  public function setReverseSshConnectivity(ReverseSshConnectivity $reverseSshConnectivity)
  {
    $this->reverseSshConnectivity = $reverseSshConnectivity;
  }
  /**
   * @return ReverseSshConnectivity
   */
  public function getReverseSshConnectivity()
  {
    return $this->reverseSshConnectivity;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param DatabaseType
   */
  public function setSourceDatabase(DatabaseType $sourceDatabase)
  {
    $this->sourceDatabase = $sourceDatabase;
  }
  /**
   * @return DatabaseType
   */
  public function getSourceDatabase()
  {
    return $this->sourceDatabase;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param StaticIpConnectivity
   */
  public function setStaticIpConnectivity(StaticIpConnectivity $staticIpConnectivity)
  {
    $this->staticIpConnectivity = $staticIpConnectivity;
  }
  /**
   * @return StaticIpConnectivity
   */
  public function getStaticIpConnectivity()
  {
    return $this->staticIpConnectivity;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param VpcPeeringConnectivity
   */
  public function setVpcPeeringConnectivity(VpcPeeringConnectivity $vpcPeeringConnectivity)
  {
    $this->vpcPeeringConnectivity = $vpcPeeringConnectivity;
  }
  /**
   * @return VpcPeeringConnectivity
   */
  public function getVpcPeeringConnectivity()
  {
    return $this->vpcPeeringConnectivity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MigrationJob::class, 'Google_Service_DatabaseMigrationService_MigrationJob');
