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

namespace Google\Service\GameServices;

class KubernetesClusterState extends \Google\Model
{
  public $agonesVersionInstalled;
  public $agonesVersionTargeted;
  public $installationState;
  public $kubernetesVersionInstalled;
  public $provider;
  public $versionInstalledErrorMessage;

  public function setAgonesVersionInstalled($agonesVersionInstalled)
  {
    $this->agonesVersionInstalled = $agonesVersionInstalled;
  }
  public function getAgonesVersionInstalled()
  {
    return $this->agonesVersionInstalled;
  }
  public function setAgonesVersionTargeted($agonesVersionTargeted)
  {
    $this->agonesVersionTargeted = $agonesVersionTargeted;
  }
  public function getAgonesVersionTargeted()
  {
    return $this->agonesVersionTargeted;
  }
  public function setInstallationState($installationState)
  {
    $this->installationState = $installationState;
  }
  public function getInstallationState()
  {
    return $this->installationState;
  }
  public function setKubernetesVersionInstalled($kubernetesVersionInstalled)
  {
    $this->kubernetesVersionInstalled = $kubernetesVersionInstalled;
  }
  public function getKubernetesVersionInstalled()
  {
    return $this->kubernetesVersionInstalled;
  }
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  public function getProvider()
  {
    return $this->provider;
  }
  public function setVersionInstalledErrorMessage($versionInstalledErrorMessage)
  {
    $this->versionInstalledErrorMessage = $versionInstalledErrorMessage;
  }
  public function getVersionInstalledErrorMessage()
  {
    return $this->versionInstalledErrorMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KubernetesClusterState::class, 'Google_Service_GameServices_KubernetesClusterState');
