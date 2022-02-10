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
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string[]
   */
  public $data;
  protected $fcmOptionsType = FcmOptions::class;
  protected $fcmOptionsDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $notificationType = Notification::class;
  protected $notificationDataType = '';
  /**
   * @var string
   */
  public $token;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
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
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
  /**
   * @param string
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return string
   */
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
