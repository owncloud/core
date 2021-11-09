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

namespace Google\Service\Datastream;

class PrivateConnection extends \Google\Model
{
  public $createTime;
  public $displayName;
  protected $errorType = Error::class;
  protected $errorDataType = '';
  public $labels;
  public $name;
  public $state;
  public $updateTime;
  protected $vpcPeeringConfigType = VpcPeeringConfig::class;
  protected $vpcPeeringConfigDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Error
   */
  public function setError(Error $error)
  {
    $this->error = $error;
  }
  /**
   * @return Error
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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
   * @param VpcPeeringConfig
   */
  public function setVpcPeeringConfig(VpcPeeringConfig $vpcPeeringConfig)
  {
    $this->vpcPeeringConfig = $vpcPeeringConfig;
  }
  /**
   * @return VpcPeeringConfig
   */
  public function getVpcPeeringConfig()
  {
    return $this->vpcPeeringConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrivateConnection::class, 'Google_Service_Datastream_PrivateConnection');
