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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1GetConfigResponse extends \Google\Model
{
  protected $configType = GoogleCloudMlV1Config::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $serviceAccountProject;

  /**
   * @param GoogleCloudMlV1Config
   */
  public function setConfig(GoogleCloudMlV1Config $config)
  {
    $this->config = $config;
  }
  /**
   * @return GoogleCloudMlV1Config
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setServiceAccountProject($serviceAccountProject)
  {
    $this->serviceAccountProject = $serviceAccountProject;
  }
  /**
   * @return string
   */
  public function getServiceAccountProject()
  {
    return $this->serviceAccountProject;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1GetConfigResponse::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1GetConfigResponse');
