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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $destination;
  protected $destinationDatabaseType = DatabaseType::class;
  protected $destinationDatabaseDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $dumpPath;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $endTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $phase;
  protected $reverseSshConnectivityType = ReverseSshConnectivity::class;
  protected $reverseSshConnectivityDataType = '';
  /**
   * @var string
   */
  public $source;
  protected $sourceDatabaseType = DatabaseType::class;
  protected $sourceDatabaseDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $staticIpConnectivityType = StaticIpConnectivity::class;
  protected $staticIpConnectivityDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;
  protected $vpcPeeringConnectivityType = VpcPeeringConnectivity::class;
  protected $vpcPeeringConnectivityDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDumpPath($dumpPath)
  {
    $this->dumpPath = $dumpPath;
  }
  /**
   * @return string
   */
  public function getDumpPath()
  {
    return $this->dumpPath;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPhase($phase)
  {
    $this->phase = $phase;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
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
