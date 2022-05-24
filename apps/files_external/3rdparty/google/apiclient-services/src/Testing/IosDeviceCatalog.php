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

class IosDeviceCatalog extends \Google\Collection
{
  protected $collection_key = 'xcodeVersions';
  protected $modelsType = IosModel::class;
  protected $modelsDataType = 'array';
  protected $runtimeConfigurationType = IosRuntimeConfiguration::class;
  protected $runtimeConfigurationDataType = '';
  protected $versionsType = IosVersion::class;
  protected $versionsDataType = 'array';
  protected $xcodeVersionsType = XcodeVersion::class;
  protected $xcodeVersionsDataType = 'array';

  /**
   * @param IosModel[]
   */
  public function setModels($models)
  {
    $this->models = $models;
  }
  /**
   * @return IosModel[]
   */
  public function getModels()
  {
    return $this->models;
  }
  /**
   * @param IosRuntimeConfiguration
   */
  public function setRuntimeConfiguration(IosRuntimeConfiguration $runtimeConfiguration)
  {
    $this->runtimeConfiguration = $runtimeConfiguration;
  }
  /**
   * @return IosRuntimeConfiguration
   */
  public function getRuntimeConfiguration()
  {
    return $this->runtimeConfiguration;
  }
  /**
   * @param IosVersion[]
   */
  public function setVersions($versions)
  {
    $this->versions = $versions;
  }
  /**
   * @return IosVersion[]
   */
  public function getVersions()
  {
    return $this->versions;
  }
  /**
   * @param XcodeVersion[]
   */
  public function setXcodeVersions($xcodeVersions)
  {
    $this->xcodeVersions = $xcodeVersions;
  }
  /**
   * @return XcodeVersion[]
   */
  public function getXcodeVersions()
  {
    return $this->xcodeVersions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosDeviceCatalog::class, 'Google_Service_Testing_IosDeviceCatalog');
