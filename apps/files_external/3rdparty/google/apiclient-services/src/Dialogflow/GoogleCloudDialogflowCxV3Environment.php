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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3Environment extends \Google\Collection
{
  protected $collection_key = 'versionConfigs';
  public $description;
  public $displayName;
  public $name;
  protected $testCasesConfigType = GoogleCloudDialogflowCxV3EnvironmentTestCasesConfig::class;
  protected $testCasesConfigDataType = '';
  public $updateTime;
  protected $versionConfigsType = GoogleCloudDialogflowCxV3EnvironmentVersionConfig::class;
  protected $versionConfigsDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDialogflowCxV3EnvironmentTestCasesConfig
   */
  public function setTestCasesConfig(GoogleCloudDialogflowCxV3EnvironmentTestCasesConfig $testCasesConfig)
  {
    $this->testCasesConfig = $testCasesConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3EnvironmentTestCasesConfig
   */
  public function getTestCasesConfig()
  {
    return $this->testCasesConfig;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param GoogleCloudDialogflowCxV3EnvironmentVersionConfig[]
   */
  public function setVersionConfigs($versionConfigs)
  {
    $this->versionConfigs = $versionConfigs;
  }
  /**
   * @return GoogleCloudDialogflowCxV3EnvironmentVersionConfig[]
   */
  public function getVersionConfigs()
  {
    return $this->versionConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Environment::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment');
