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

class Google_Service_CloudRun_EnvVarSource extends Google_Model
{
  protected $configMapKeyRefType = 'Google_Service_CloudRun_ConfigMapKeySelector';
  protected $configMapKeyRefDataType = '';
  protected $secretKeyRefType = 'Google_Service_CloudRun_SecretKeySelector';
  protected $secretKeyRefDataType = '';

  /**
   * @param Google_Service_CloudRun_ConfigMapKeySelector
   */
  public function setConfigMapKeyRef(Google_Service_CloudRun_ConfigMapKeySelector $configMapKeyRef)
  {
    $this->configMapKeyRef = $configMapKeyRef;
  }
  /**
   * @return Google_Service_CloudRun_ConfigMapKeySelector
   */
  public function getConfigMapKeyRef()
  {
    return $this->configMapKeyRef;
  }
  /**
   * @param Google_Service_CloudRun_SecretKeySelector
   */
  public function setSecretKeyRef(Google_Service_CloudRun_SecretKeySelector $secretKeyRef)
  {
    $this->secretKeyRef = $secretKeyRef;
  }
  /**
   * @return Google_Service_CloudRun_SecretKeySelector
   */
  public function getSecretKeyRef()
  {
    return $this->secretKeyRef;
  }
}
