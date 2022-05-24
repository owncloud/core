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

class GoogleCloudDialogflowCxV3beta1Environment extends \Google\Collection
{
  protected $collection_key = 'versionConfigs';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  protected $testCasesConfigType = GoogleCloudDialogflowCxV3beta1EnvironmentTestCasesConfig::class;
  protected $testCasesConfigDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  protected $versionConfigsType = GoogleCloudDialogflowCxV3beta1EnvironmentVersionConfig::class;
  protected $versionConfigsDataType = 'array';

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1EnvironmentTestCasesConfig
   */
  public function setTestCasesConfig(GoogleCloudDialogflowCxV3beta1EnvironmentTestCasesConfig $testCasesConfig)
  {
    $this->testCasesConfig = $testCasesConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1EnvironmentTestCasesConfig
   */
  public function getTestCasesConfig()
  {
    return $this->testCasesConfig;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1EnvironmentVersionConfig[]
   */
  public function setVersionConfigs($versionConfigs)
  {
    $this->versionConfigs = $versionConfigs;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1EnvironmentVersionConfig[]
   */
  public function getVersionConfigs()
  {
    return $this->versionConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1Environment::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Environment');
