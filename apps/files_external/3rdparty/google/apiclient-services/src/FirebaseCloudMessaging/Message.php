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

class Message extends \Google\Model
{
  protected $androidType = AndroidConfig::class;
  protected $androidDataType = '';
  protected $apnsType = ApnsConfig::class;
  protected $apnsDataType = '';
  public $condition;
  public $data;
  protected $fcmOptionsType = FcmOptions::class;
  protected $fcmOptionsDataType = '';
  public $name;
  protected $notificationType = Notification::class;
  protected $notificationDataType = '';
  public $token;
  public $topic;
  protected $webpushType = WebpushConfig::class;
  protected $webpushDataType = '';

  /**
   * @param AndroidConfig
   */
  public function setAndroid(AndroidConfig $android)
  {
    $this->android = $android;
  }
  /**
   * @return AndroidConfig
   */
  public function getAndroid()
  {
    return $this->android;
  }
  /**
   * @param ApnsConfig
   */
  public function setApns(ApnsConfig $apns)
  {
    $this->apns = $apns;
  }
  /**
   * @return ApnsConfig
   */
  public function getApns()
  {
    return $this->apns;
  }
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  public function getCondition()
  {
    return $this->condition;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param FcmOptions
   */
  public function setFcmOptions(FcmOptions $fcmOptions)
  {
    $this->fcmOptions = $fcmOptions;
  }
  /**
   * @return FcmOptions
   */
  public function getFcmOptions()
  {
    return $this->fcmOptions;
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
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  public function getTopic()
  {
    return $this->topic;
  }
  /**
   * @param WebpushConfig
   */
  public function setWebpush(WebpushConfig $webpush)
  {
    $this->webpush = $webpush;
  }
  /**
   * @return WebpushConfig
   */
  public function getWebpush()
  {
    return $this->webpush;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Message::class, 'Google_Service_FirebaseCloudMessaging_Message');
