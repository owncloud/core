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

namespace Google\Service\PubsubLite;

class Topic extends \Google\Model
{
  public $name;
  protected $partitionConfigType = PartitionConfig::class;
  protected $partitionConfigDataType = '';
  protected $reservationConfigType = ReservationConfig::class;
  protected $reservationConfigDataType = '';
  protected $retentionConfigType = RetentionConfig::class;
  protected $retentionConfigDataType = '';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PartitionConfig
   */
  public function setPartitionConfig(PartitionConfig $partitionConfig)
  {
    $this->partitionConfig = $partitionConfig;
  }
  /**
   * @return PartitionConfig
   */
  public function getPartitionConfig()
  {
    return $this->partitionConfig;
  }
  /**
   * @param ReservationConfig
   */
  public function setReservationConfig(ReservationConfig $reservationConfig)
  {
    $this->reservationConfig = $reservationConfig;
  }
  /**
   * @return ReservationConfig
   */
  public function getReservationConfig()
  {
    return $this->reservationConfig;
  }
  /**
   * @param RetentionConfig
   */
  public function setRetentionConfig(RetentionConfig $retentionConfig)
  {
    $this->retentionConfig = $retentionConfig;
  }
  /**
   * @return RetentionConfig
   */
  public function getRetentionConfig()
  {
    return $this->retentionConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Topic::class, 'Google_Service_PubsubLite_Topic');
