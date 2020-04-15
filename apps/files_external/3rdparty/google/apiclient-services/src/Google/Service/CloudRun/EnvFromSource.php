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

class Google_Service_CloudRun_EnvFromSource extends Google_Model
{
  protected $configMapRefType = 'Google_Service_CloudRun_ConfigMapEnvSource';
  protected $configMapRefDataType = '';
  public $prefix;
  protected $secretRefType = 'Google_Service_CloudRun_SecretEnvSource';
  protected $secretRefDataType = '';

  /**
   * @param Google_Service_CloudRun_ConfigMapEnvSource
   */
  public function setConfigMapRef(Google_Service_CloudRun_ConfigMapEnvSource $configMapRef)
  {
    $this->configMapRef = $configMapRef;
  }
  /**
   * @return Google_Service_CloudRun_ConfigMapEnvSource
   */
  public function getConfigMapRef()
  {
    return $this->configMapRef;
  }
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  public function getPrefix()
  {
    return $this->prefix;
  }
  /**
   * @param Google_Service_CloudRun_SecretEnvSource
   */
  public function setSecretRef(Google_Service_CloudRun_SecretEnvSource $secretRef)
  {
    $this->secretRef = $secretRef;
  }
  /**
   * @return Google_Service_CloudRun_SecretEnvSource
   */
  public function getSecretRef()
  {
    return $this->secretRef;
  }
}
