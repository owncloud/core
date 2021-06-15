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

class Google_Service_GKEHub_ConfigManagementConfigSyncDeploymentState extends Google_Model
{
  public $gitSync;
  public $importer;
  public $monitor;
  public $reconcilerManager;
  public $rootReconciler;
  public $syncer;

  public function setGitSync($gitSync)
  {
    $this->gitSync = $gitSync;
  }
  public function getGitSync()
  {
    return $this->gitSync;
  }
  public function setImporter($importer)
  {
    $this->importer = $importer;
  }
  public function getImporter()
  {
    return $this->importer;
  }
  public function setMonitor($monitor)
  {
    $this->monitor = $monitor;
  }
  public function getMonitor()
  {
    return $this->monitor;
  }
  public function setReconcilerManager($reconcilerManager)
  {
    $this->reconcilerManager = $reconcilerManager;
  }
  public function getReconcilerManager()
  {
    return $this->reconcilerManager;
  }
  public function setRootReconciler($rootReconciler)
  {
    $this->rootReconciler = $rootReconciler;
  }
  public function getRootReconciler()
  {
    return $this->rootReconciler;
  }
  public function setSyncer($syncer)
  {
    $this->syncer = $syncer;
  }
  public function getSyncer()
  {
    return $this->syncer;
  }
}
