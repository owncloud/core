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

class GoogleCloudRunOpV2Volume extends \Google\Model
{
  protected $cloudSqlInstanceType = GoogleCloudRunOpV2CloudSqlInstance::class;
  protected $cloudSqlInstanceDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $secretType = GoogleCloudRunOpV2SecretVolumeSource::class;
  protected $secretDataType = '';

  /**
   * @param GoogleCloudRunOpV2CloudSqlInstance
   */
  public function setCloudSqlInstance(GoogleCloudRunOpV2CloudSqlInstance $cloudSqlInstance)
  {
    $this->cloudSqlInstance = $cloudSqlInstance;
  }
  /**
   * @return GoogleCloudRunOpV2CloudSqlInstance
   */
  public function getCloudSqlInstance()
  {
    return $this->cloudSqlInstance;
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
   * @param GoogleCloudRunOpV2SecretVolumeSource
   */
  public function setSecret(GoogleCloudRunOpV2SecretVolumeSource $secret)
  {
    $this->secret = $secret;
  }
  /**
   * @return GoogleCloudRunOpV2SecretVolumeSource
   */
  public function getSecret()
  {
    return $this->secret;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunOpV2Volume::class, 'Google_Service_CloudRun_GoogleCloudRunOpV2Volume');
