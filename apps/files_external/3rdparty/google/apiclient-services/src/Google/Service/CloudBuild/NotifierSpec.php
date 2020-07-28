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

class Google_Service_CloudBuild_NotifierSpec extends Google_Collection
{
  protected $collection_key = 'secrets';
  protected $notificationType = 'Google_Service_CloudBuild_Notification';
  protected $notificationDataType = '';
  protected $secretsType = 'Google_Service_CloudBuild_NotifierSecret';
  protected $secretsDataType = 'array';

  /**
   * @param Google_Service_CloudBuild_Notification
   */
  public function setNotification(Google_Service_CloudBuild_Notification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Google_Service_CloudBuild_Notification
   */
  public function getNotification()
  {
    return $this->notification;
  }
  /**
   * @param Google_Service_CloudBuild_NotifierSecret
   */
  public function setSecrets($secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return Google_Service_CloudBuild_NotifierSecret
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
}
