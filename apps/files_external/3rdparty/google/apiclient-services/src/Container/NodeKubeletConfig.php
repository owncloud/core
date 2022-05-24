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

namespace Google\Service\Container;

class NodeKubeletConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $cpuCfsQuota;
  /**
   * @var string
   */
  public $cpuCfsQuotaPeriod;
  /**
   * @var string
   */
  public $cpuManagerPolicy;
  /**
   * @var string
   */
  public $podPidsLimit;

  /**
   * @param bool
   */
  public function setCpuCfsQuota($cpuCfsQuota)
  {
    $this->cpuCfsQuota = $cpuCfsQuota;
  }
  /**
   * @return bool
   */
  public function getCpuCfsQuota()
  {
    return $this->cpuCfsQuota;
  }
  /**
   * @param string
   */
  public function setCpuCfsQuotaPeriod($cpuCfsQuotaPeriod)
  {
    $this->cpuCfsQuotaPeriod = $cpuCfsQuotaPeriod;
  }
  /**
   * @return string
   */
  public function getCpuCfsQuotaPeriod()
  {
    return $this->cpuCfsQuotaPeriod;
  }
  /**
   * @param string
   */
  public function setCpuManagerPolicy($cpuManagerPolicy)
  {
    $this->cpuManagerPolicy = $cpuManagerPolicy;
  }
  /**
   * @return string
   */
  public function getCpuManagerPolicy()
  {
    return $this->cpuManagerPolicy;
  }
  /**
   * @param string
   */
  public function setPodPidsLimit($podPidsLimit)
  {
    $this->podPidsLimit = $podPidsLimit;
  }
  /**
   * @return string
   */
  public function getPodPidsLimit()
  {
    return $this->podPidsLimit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeKubeletConfig::class, 'Google_Service_Container_NodeKubeletConfig');
