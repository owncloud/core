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

class Google_Service_CloudRun_Volume extends Google_Model
{
  protected $configMapType = 'Google_Service_CloudRun_ConfigMapVolumeSource';
  protected $configMapDataType = '';
  public $name;
  protected $secretType = 'Google_Service_CloudRun_SecretVolumeSource';
  protected $secretDataType = '';

  /**
   * @param Google_Service_CloudRun_ConfigMapVolumeSource
   */
  public function setConfigMap(Google_Service_CloudRun_ConfigMapVolumeSource $configMap)
  {
    $this->configMap = $configMap;
  }
  /**
   * @return Google_Service_CloudRun_ConfigMapVolumeSource
   */
  public function getConfigMap()
  {
    return $this->configMap;
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
   * @param Google_Service_CloudRun_SecretVolumeSource
   */
  public function setSecret(Google_Service_CloudRun_SecretVolumeSource $secret)
  {
    $this->secret = $secret;
  }
  /**
   * @return Google_Service_CloudRun_SecretVolumeSource
   */
  public function getSecret()
  {
    return $this->secret;
  }
}
