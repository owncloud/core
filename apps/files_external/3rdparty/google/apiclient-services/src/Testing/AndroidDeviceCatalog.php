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

namespace Google\Service\Testing;

class AndroidDeviceCatalog extends \Google\Collection
{
  protected $collection_key = 'versions';
  protected $modelsType = AndroidModel::class;
  protected $modelsDataType = 'array';
  protected $runtimeConfigurationType = AndroidRuntimeConfiguration::class;
  protected $runtimeConfigurationDataType = '';
  protected $versionsType = AndroidVersion::class;
  protected $versionsDataType = 'array';

  /**
   * @param AndroidModel[]
   */
  public function setModels($models)
  {
    $this->models = $models;
  }
  /**
   * @return AndroidModel[]
   */
  public function getModels()
  {
    return $this->models;
  }
  /**
   * @param AndroidRuntimeConfiguration
   */
  public function setRuntimeConfiguration(AndroidRuntimeConfiguration $runtimeConfiguration)
  {
    $this->runtimeConfiguration = $runtimeConfiguration;
  }
  /**
   * @return AndroidRuntimeConfiguration
   */
  public function getRuntimeConfiguration()
  {
    return $this->runtimeConfiguration;
  }
  /**
   * @param AndroidVersion[]
   */
  public function setVersions($versions)
  {
    $this->versions = $versions;
  }
  /**
   * @return AndroidVersion[]
   */
  public function getVersions()
  {
    return $this->versions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidDeviceCatalog::class, 'Google_Service_Testing_AndroidDeviceCatalog');
