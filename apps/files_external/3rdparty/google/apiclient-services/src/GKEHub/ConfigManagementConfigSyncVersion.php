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

namespace Google\Service\GKEHub;

class ConfigManagementConfigSyncVersion extends \Google\Model
{
  /**
   * @var string
   */
  public $admissionWebhook;
  /**
   * @var string
   */
  public $gitSync;
  /**
   * @var string
   */
  public $importer;
  /**
   * @var string
   */
  public $monitor;
  /**
   * @var string
   */
  public $reconcilerManager;
  /**
   * @var string
   */
  public $rootReconciler;
  /**
   * @var string
   */
  public $syncer;

  /**
   * @param string
   */
  public function setAdmissionWebhook($admissionWebhook)
  {
    $this->admissionWebhook = $admissionWebhook;
  }
  /**
   * @return string
   */
  public function getAdmissionWebhook()
  {
    return $this->admissionWebhook;
  }
  /**
   * @param string
   */
  public function setGitSync($gitSync)
  {
    $this->gitSync = $gitSync;
  }
  /**
   * @return string
   */
  public function getGitSync()
  {
    return $this->gitSync;
  }
  /**
   * @param string
   */
  public function setImporter($importer)
  {
    $this->importer = $importer;
  }
  /**
   * @return string
   */
  public function getImporter()
  {
    return $this->importer;
  }
  /**
   * @param string
   */
  public function setMonitor($monitor)
  {
    $this->monitor = $monitor;
  }
  /**
   * @return string
   */
  public function getMonitor()
  {
    return $this->monitor;
  }
  /**
   * @param string
   */
  public function setReconcilerManager($reconcilerManager)
  {
    $this->reconcilerManager = $reconcilerManager;
  }
  /**
   * @return string
   */
  public function getReconcilerManager()
  {
    return $this->reconcilerManager;
  }
  /**
   * @param string
   */
  public function setRootReconciler($rootReconciler)
  {
    $this->rootReconciler = $rootReconciler;
  }
  /**
   * @return string
   */
  public function getRootReconciler()
  {
    return $this->rootReconciler;
  }
  /**
   * @param string
   */
  public function setSyncer($syncer)
  {
    $this->syncer = $syncer;
  }
  /**
   * @return string
   */
  public function getSyncer()
  {
    return $this->syncer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementConfigSyncVersion::class, 'Google_Service_GKEHub_ConfigManagementConfigSyncVersion');
