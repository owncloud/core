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

namespace Google\Service\BackupforGKE;

class BackupConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $allNamespaces;
  protected $encryptionKeyType = EncryptionKey::class;
  protected $encryptionKeyDataType = '';
  /**
   * @var bool
   */
  public $includeSecrets;
  /**
   * @var bool
   */
  public $includeVolumeData;
  protected $selectedApplicationsType = NamespacedNames::class;
  protected $selectedApplicationsDataType = '';
  protected $selectedNamespacesType = Namespaces::class;
  protected $selectedNamespacesDataType = '';

  /**
   * @param bool
   */
  public function setAllNamespaces($allNamespaces)
  {
    $this->allNamespaces = $allNamespaces;
  }
  /**
   * @return bool
   */
  public function getAllNamespaces()
  {
    return $this->allNamespaces;
  }
  /**
   * @param EncryptionKey
   */
  public function setEncryptionKey(EncryptionKey $encryptionKey)
  {
    $this->encryptionKey = $encryptionKey;
  }
  /**
   * @return EncryptionKey
   */
  public function getEncryptionKey()
  {
    return $this->encryptionKey;
  }
  /**
   * @param bool
   */
  public function setIncludeSecrets($includeSecrets)
  {
    $this->includeSecrets = $includeSecrets;
  }
  /**
   * @return bool
   */
  public function getIncludeSecrets()
  {
    return $this->includeSecrets;
  }
  /**
   * @param bool
   */
  public function setIncludeVolumeData($includeVolumeData)
  {
    $this->includeVolumeData = $includeVolumeData;
  }
  /**
   * @return bool
   */
  public function getIncludeVolumeData()
  {
    return $this->includeVolumeData;
  }
  /**
   * @param NamespacedNames
   */
  public function setSelectedApplications(NamespacedNames $selectedApplications)
  {
    $this->selectedApplications = $selectedApplications;
  }
  /**
   * @return NamespacedNames
   */
  public function getSelectedApplications()
  {
    return $this->selectedApplications;
  }
  /**
   * @param Namespaces
   */
  public function setSelectedNamespaces(Namespaces $selectedNamespaces)
  {
    $this->selectedNamespaces = $selectedNamespaces;
  }
  /**
   * @return Namespaces
   */
  public function getSelectedNamespaces()
  {
    return $this->selectedNamespaces;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackupConfig::class, 'Google_Service_BackupforGKE_BackupConfig');
