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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1DiscoveryEvent extends \Google\Model
{
  protected $actionType = GoogleCloudDataplexV1DiscoveryEventActionDetails::class;
  protected $actionDataType = '';
  /**
   * @var string
   */
  public $assetId;
  protected $configType = GoogleCloudDataplexV1DiscoveryEventConfigDetails::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $dataLocation;
  protected $entityType = GoogleCloudDataplexV1DiscoveryEventEntityDetails::class;
  protected $entityDataType = '';
  /**
   * @var string
   */
  public $lakeId;
  /**
   * @var string
   */
  public $message;
  protected $partitionType = GoogleCloudDataplexV1DiscoveryEventPartitionDetails::class;
  protected $partitionDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $zoneId;

  /**
   * @param GoogleCloudDataplexV1DiscoveryEventActionDetails
   */
  public function setAction(GoogleCloudDataplexV1DiscoveryEventActionDetails $action)
  {
    $this->action = $action;
  }
  /**
   * @return GoogleCloudDataplexV1DiscoveryEventActionDetails
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setAssetId($assetId)
  {
    $this->assetId = $assetId;
  }
  /**
   * @return string
   */
  public function getAssetId()
  {
    return $this->assetId;
  }
  /**
   * @param GoogleCloudDataplexV1DiscoveryEventConfigDetails
   */
  public function setConfig(GoogleCloudDataplexV1DiscoveryEventConfigDetails $config)
  {
    $this->config = $config;
  }
  /**
   * @return GoogleCloudDataplexV1DiscoveryEventConfigDetails
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string
   */
  public function setDataLocation($dataLocation)
  {
    $this->dataLocation = $dataLocation;
  }
  /**
   * @return string
   */
  public function getDataLocation()
  {
    return $this->dataLocation;
  }
  /**
   * @param GoogleCloudDataplexV1DiscoveryEventEntityDetails
   */
  public function setEntity(GoogleCloudDataplexV1DiscoveryEventEntityDetails $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return GoogleCloudDataplexV1DiscoveryEventEntityDetails
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param string
   */
  public function setLakeId($lakeId)
  {
    $this->lakeId = $lakeId;
  }
  /**
   * @return string
   */
  public function getLakeId()
  {
    return $this->lakeId;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param GoogleCloudDataplexV1DiscoveryEventPartitionDetails
   */
  public function setPartition(GoogleCloudDataplexV1DiscoveryEventPartitionDetails $partition)
  {
    $this->partition = $partition;
  }
  /**
   * @return GoogleCloudDataplexV1DiscoveryEventPartitionDetails
   */
  public function getPartition()
  {
    return $this->partition;
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
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  /**
   * @return string
   */
  public function getZoneId()
  {
    return $this->zoneId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1DiscoveryEvent::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1DiscoveryEvent');
