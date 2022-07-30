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

class GoogleCloudBeyondcorpAppconnectorsV1AppConnectorInstanceConfig extends \Google\Model
{
  protected $imageConfigType = GoogleCloudBeyondcorpAppconnectorsV1ImageConfig::class;
  protected $imageConfigDataType = '';
  /**
   * @var array[]
   */
  public $instanceConfig;
  protected $notificationConfigType = GoogleCloudBeyondcorpAppconnectorsV1NotificationConfig::class;
  protected $notificationConfigDataType = '';
  /**
   * @var string
   */
  public $sequenceNumber;

  /**
   * @param GoogleCloudBeyondcorpAppconnectorsV1ImageConfig
   */
  public function setImageConfig(GoogleCloudBeyondcorpAppconnectorsV1ImageConfig $imageConfig)
  {
    $this->imageConfig = $imageConfig;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1ImageConfig
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
   * @param GoogleCloudBeyondcorpAppconnectorsV1NotificationConfig
   */
  public function setNotificationConfig(GoogleCloudBeyondcorpAppconnectorsV1NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1NotificationConfig
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
class_alias(GoogleCloudBeyondcorpAppconnectorsV1AppConnectorInstanceConfig::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectorsV1AppConnectorInstanceConfig');
