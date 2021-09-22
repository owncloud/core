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

namespace Google\Service\CloudHealthcare;

class FhirStore extends \Google\Collection
{
  protected $collection_key = 'streamConfigs';
  public $defaultSearchHandlingStrict;
  public $disableReferentialIntegrity;
  public $disableResourceVersioning;
  public $enableUpdateCreate;
  public $labels;
  public $name;
  protected $notificationConfigType = NotificationConfig::class;
  protected $notificationConfigDataType = '';
  protected $streamConfigsType = StreamConfig::class;
  protected $streamConfigsDataType = 'array';
  public $version;

  public function setDefaultSearchHandlingStrict($defaultSearchHandlingStrict)
  {
    $this->defaultSearchHandlingStrict = $defaultSearchHandlingStrict;
  }
  public function getDefaultSearchHandlingStrict()
  {
    return $this->defaultSearchHandlingStrict;
  }
  public function setDisableReferentialIntegrity($disableReferentialIntegrity)
  {
    $this->disableReferentialIntegrity = $disableReferentialIntegrity;
  }
  public function getDisableReferentialIntegrity()
  {
    return $this->disableReferentialIntegrity;
  }
  public function setDisableResourceVersioning($disableResourceVersioning)
  {
    $this->disableResourceVersioning = $disableResourceVersioning;
  }
  public function getDisableResourceVersioning()
  {
    return $this->disableResourceVersioning;
  }
  public function setEnableUpdateCreate($enableUpdateCreate)
  {
    $this->enableUpdateCreate = $enableUpdateCreate;
  }
  public function getEnableUpdateCreate()
  {
    return $this->enableUpdateCreate;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
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
   * @param NotificationConfig
   */
  public function setNotificationConfig(NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return NotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
  /**
   * @param StreamConfig[]
   */
  public function setStreamConfigs($streamConfigs)
  {
    $this->streamConfigs = $streamConfigs;
  }
  /**
   * @return StreamConfig[]
   */
  public function getStreamConfigs()
  {
    return $this->streamConfigs;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FhirStore::class, 'Google_Service_CloudHealthcare_FhirStore');
