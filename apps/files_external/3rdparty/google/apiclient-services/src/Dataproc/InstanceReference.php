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

namespace Google\Service\Dataproc;

class InstanceReference extends \Google\Model
{
  /**
   * @var string
   */
  public $instanceId;
  /**
   * @var string
   */
  public $instanceName;
  /**
   * @var string
   */
  public $publicEciesKey;
  /**
   * @var string
   */
  public $publicKey;

  /**
   * @param string
   */
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  /**
   * @return string
   */
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  /**
   * @param string
   */
  public function setInstanceName($instanceName)
  {
    $this->instanceName = $instanceName;
  }
  /**
   * @return string
   */
  public function getInstanceName()
  {
    return $this->instanceName;
  }
  /**
   * @param string
   */
  public function setPublicEciesKey($publicEciesKey)
  {
    $this->publicEciesKey = $publicEciesKey;
  }
  /**
   * @return string
   */
  public function getPublicEciesKey()
  {
    return $this->publicEciesKey;
  }
  /**
   * @param string
   */
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return string
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceReference::class, 'Google_Service_Dataproc_InstanceReference');
