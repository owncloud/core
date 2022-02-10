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

namespace Google\Service\FirebaseCloudMessaging;

class AndroidConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $collapseKey;
  /**
   * @var string[]
   */
  public $data;
  /**
   * @var bool
   */
  public $directBootOk;
  protected $fcmOptionsType = AndroidFcmOptions::class;
  protected $fcmOptionsDataType = '';
  protected $notificationType = AndroidNotification::class;
  protected $notificationDataType = '';
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $restrictedPackageName;
  /**
   * @var string
   */
  public $ttl;

  /**
   * @param string
   */
  public function setCollapseKey($collapseKey)
  {
    $this->collapseKey = $collapseKey;
  }
  /**
   * @return string
   */
  public function getCollapseKey()
  {
    return $this->collapseKey;
  }
  /**
   * @param string[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param bool
   */
  public function setDirectBootOk($directBootOk)
  {
    $this->directBootOk = $directBootOk;
  }
  /**
   * @return bool
   */
  public function getDirectBootOk()
  {
    return $this->directBootOk;
  }
  /**
   * @param AndroidFcmOptions
   */
  public function setFcmOptions(AndroidFcmOptions $fcmOptions)
  {
    $this->fcmOptions = $fcmOptions;
  }
  /**
   * @return AndroidFcmOptions
   */
  public function getFcmOptions()
  {
    return $this->fcmOptions;
  }
  /**
   * @param AndroidNotification
   */
  public function setNotification(AndroidNotification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return AndroidNotification
   */
  public function getNotification()
  {
    return $this->notification;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setRestrictedPackageName($restrictedPackageName)
  {
    $this->restrictedPackageName = $restrictedPackageName;
  }
  /**
   * @return string
   */
  public function getRestrictedPackageName()
  {
    return $this->restrictedPackageName;
  }
  /**
   * @param string
   */
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return string
   */
  public function getTtl()
  {
    return $this->ttl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidConfig::class, 'Google_Service_FirebaseCloudMessaging_AndroidConfig');
