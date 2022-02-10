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

namespace Google\Service\AIPlatformNotebooks;

class RuntimeSoftwareConfig extends \Google\Collection
{
  protected $collection_key = 'kernels';
  /**
   * @var string
   */
  public $customGpuDriverPath;
  /**
   * @var bool
   */
  public $enableHealthMonitoring;
  /**
   * @var bool
   */
  public $idleShutdown;
  /**
   * @var int
   */
  public $idleShutdownTimeout;
  /**
   * @var bool
   */
  public $installGpuDriver;
  protected $kernelsType = ContainerImage::class;
  protected $kernelsDataType = 'array';
  /**
   * @var string
   */
  public $notebookUpgradeSchedule;
  /**
   * @var string
   */
  public $postStartupScript;

  /**
   * @param string
   */
  public function setCustomGpuDriverPath($customGpuDriverPath)
  {
    $this->customGpuDriverPath = $customGpuDriverPath;
  }
  /**
   * @return string
   */
  public function getCustomGpuDriverPath()
  {
    return $this->customGpuDriverPath;
  }
  /**
   * @param bool
   */
  public function setEnableHealthMonitoring($enableHealthMonitoring)
  {
    $this->enableHealthMonitoring = $enableHealthMonitoring;
  }
  /**
   * @return bool
   */
  public function getEnableHealthMonitoring()
  {
    return $this->enableHealthMonitoring;
  }
  /**
   * @param bool
   */
  public function setIdleShutdown($idleShutdown)
  {
    $this->idleShutdown = $idleShutdown;
  }
  /**
   * @return bool
   */
  public function getIdleShutdown()
  {
    return $this->idleShutdown;
  }
  /**
   * @param int
   */
  public function setIdleShutdownTimeout($idleShutdownTimeout)
  {
    $this->idleShutdownTimeout = $idleShutdownTimeout;
  }
  /**
   * @return int
   */
  public function getIdleShutdownTimeout()
  {
    return $this->idleShutdownTimeout;
  }
  /**
   * @param bool
   */
  public function setInstallGpuDriver($installGpuDriver)
  {
    $this->installGpuDriver = $installGpuDriver;
  }
  /**
   * @return bool
   */
  public function getInstallGpuDriver()
  {
    return $this->installGpuDriver;
  }
  /**
   * @param ContainerImage[]
   */
  public function setKernels($kernels)
  {
    $this->kernels = $kernels;
  }
  /**
   * @return ContainerImage[]
   */
  public function getKernels()
  {
    return $this->kernels;
  }
  /**
   * @param string
   */
  public function setNotebookUpgradeSchedule($notebookUpgradeSchedule)
  {
    $this->notebookUpgradeSchedule = $notebookUpgradeSchedule;
  }
  /**
   * @return string
   */
  public function getNotebookUpgradeSchedule()
  {
    return $this->notebookUpgradeSchedule;
  }
  /**
   * @param string
   */
  public function setPostStartupScript($postStartupScript)
  {
    $this->postStartupScript = $postStartupScript;
  }
  /**
   * @return string
   */
  public function getPostStartupScript()
  {
    return $this->postStartupScript;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuntimeSoftwareConfig::class, 'Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig');
