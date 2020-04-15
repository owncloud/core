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

class Google_Service_SecurityCommandCenter_NotificationConfig extends Google_Model
{
  public $description;
  public $name;
  public $pubsubTopic;
  public $serviceAccount;
  protected $streamingConfigType = 'Google_Service_SecurityCommandCenter_StreamingConfig';
  protected $streamingConfigDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_StreamingConfig
   */
  public function setStreamingConfig(Google_Service_SecurityCommandCenter_StreamingConfig $streamingConfig)
  {
    $this->streamingConfig = $streamingConfig;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_StreamingConfig
   */
  public function getStreamingConfig()
  {
    return $this->streamingConfig;
  }
}
