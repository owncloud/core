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

namespace Google\Service\CloudBuild;

class HybridPoolConfig extends \Google\Model
{
  protected $defaultWorkerConfigType = HybridWorkerConfig::class;
  protected $defaultWorkerConfigDataType = '';
  /**
   * @var string
   */
  public $membership;

  /**
   * @param HybridWorkerConfig
   */
  public function setDefaultWorkerConfig(HybridWorkerConfig $defaultWorkerConfig)
  {
    $this->defaultWorkerConfig = $defaultWorkerConfig;
  }
  /**
   * @return HybridWorkerConfig
   */
  public function getDefaultWorkerConfig()
  {
    return $this->defaultWorkerConfig;
  }
  /**
   * @param string
   */
  public function setMembership($membership)
  {
    $this->membership = $membership;
  }
  /**
   * @return string
   */
  public function getMembership()
  {
    return $this->membership;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HybridPoolConfig::class, 'Google_Service_CloudBuild_HybridPoolConfig');
