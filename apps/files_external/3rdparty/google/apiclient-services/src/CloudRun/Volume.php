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

namespace Google\Service\CloudRun;

class Volume extends \Google\Model
{
  protected $configMapType = ConfigMapVolumeSource::class;
  protected $configMapDataType = '';
  public $name;
  protected $secretType = SecretVolumeSource::class;
  protected $secretDataType = '';

  /**
   * @param ConfigMapVolumeSource
   */
  public function setConfigMap(ConfigMapVolumeSource $configMap)
  {
    $this->configMap = $configMap;
  }
  /**
   * @return ConfigMapVolumeSource
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
   * @param SecretVolumeSource
   */
  public function setSecret(SecretVolumeSource $secret)
  {
    $this->secret = $secret;
  }
  /**
   * @return SecretVolumeSource
   */
  public function getSecret()
  {
    return $this->secret;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Volume::class, 'Google_Service_CloudRun_Volume');
