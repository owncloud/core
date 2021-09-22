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

namespace Google\Service\CloudBuild;

class NotifierSpec extends \Google\Collection
{
  protected $collection_key = 'secrets';
  protected $notificationType = Notification::class;
  protected $notificationDataType = '';
  protected $secretsType = NotifierSecret::class;
  protected $secretsDataType = 'array';

  /**
   * @param Notification
   */
  public function setNotification(Notification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Notification
   */
  public function getNotification()
  {
    return $this->notification;
  }
  /**
   * @param NotifierSecret[]
   */
  public function setSecrets($secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return NotifierSecret[]
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotifierSpec::class, 'Google_Service_CloudBuild_NotifierSpec');
