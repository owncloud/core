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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorInstanceConfig extends \Google\Model
{
  protected $imageConfigType = GoogleCloudBeyondcorpAppconnectorsV1alphaImageConfig::class;
  protected $imageConfigDataType = '';
  /**
   * @var array[]
   */
  public $instanceConfig;
  protected $notificationConfigType = GoogleCloudBeyondcorpAppconnectorsV1alphaNotificationConfig::class;
  protected $notificationConfigDataType = '';
  /**
   * @var string
   */
  public $sequenceNumber;

  /**
   * @param GoogleCloudBeyondcorpAppconnectorsV1alphaImageConfig
   */
  public function setImageConfig(GoogleCloudBeyondcorpAppconnectorsV1alphaImageConfig $imageConfig)
  {
    $this->imageConfig = $imageConfig;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1alphaImageConfig
   */
  public function getImageConfig()
  {
    return $this->imageConfig;
  }
  /**
   * @param array[]
   */
  public function setInstanceConfig($instanceConfig)
  {
    $this->instanceConfig = $instanceConfig;
  }
  /**
   * @return array[]
   */
  public function getInstanceConfig()
  {
    return $this->instanceConfig;
  }
  /**
   * @param GoogleCloudBeyondcorpAppconnectorsV1alphaNotificationConfig
   */
  public function setNotificationConfig(GoogleCloudBeyondcorpAppconnectorsV1alphaNotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1alphaNotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
  /**
   * @param string
   */
  public function setSequenceNumber($sequenceNumber)
  {
    $this->sequenceNumber = $sequenceNumber;
  }
  /**
   * @return string
   */
  public function getSequenceNumber()
  {
    return $this->sequenceNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorInstanceConfig::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorInstanceConfig');
