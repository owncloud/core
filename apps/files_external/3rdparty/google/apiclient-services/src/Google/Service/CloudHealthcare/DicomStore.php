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

class Google_Service_CloudHealthcare_DicomStore extends Google_Model
{
  public $labels;
  public $name;
  protected $notificationConfigType = 'Google_Service_CloudHealthcare_NotificationConfig';
  protected $notificationConfigDataType = '';

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
   * @param Google_Service_CloudHealthcare_NotificationConfig
   */
  public function setNotificationConfig(Google_Service_CloudHealthcare_NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_NotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
}
