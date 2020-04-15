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

class Google_Service_FirebaseCloudMessaging_Message extends Google_Model
{
  protected $androidType = 'Google_Service_FirebaseCloudMessaging_AndroidConfig';
  protected $androidDataType = '';
  protected $apnsType = 'Google_Service_FirebaseCloudMessaging_ApnsConfig';
  protected $apnsDataType = '';
  public $condition;
  public $data;
  protected $fcmOptionsType = 'Google_Service_FirebaseCloudMessaging_FcmOptions';
  protected $fcmOptionsDataType = '';
  public $name;
  protected $notificationType = 'Google_Service_FirebaseCloudMessaging_Notification';
  protected $notificationDataType = '';
  public $token;
  public $topic;
  protected $webpushType = 'Google_Service_FirebaseCloudMessaging_WebpushConfig';
  protected $webpushDataType = '';

  /**
   * @param Google_Service_FirebaseCloudMessaging_AndroidConfig
   */
  public function setAndroid(Google_Service_FirebaseCloudMessaging_AndroidConfig $android)
  {
    $this->android = $android;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_AndroidConfig
   */
  public function getAndroid()
  {
    return $this->android;
  }
  /**
   * @param Google_Service_FirebaseCloudMessaging_ApnsConfig
   */
  public function setApns(Google_Service_FirebaseCloudMessaging_ApnsConfig $apns)
  {
    $this->apns = $apns;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_ApnsConfig
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
   * @param Google_Service_FirebaseCloudMessaging_FcmOptions
   */
  public function setFcmOptions(Google_Service_FirebaseCloudMessaging_FcmOptions $fcmOptions)
  {
    $this->fcmOptions = $fcmOptions;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_FcmOptions
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
   * @param Google_Service_FirebaseCloudMessaging_Notification
   */
  public function setNotification(Google_Service_FirebaseCloudMessaging_Notification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_Notification
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
   * @param Google_Service_FirebaseCloudMessaging_WebpushConfig
   */
  public function setWebpush(Google_Service_FirebaseCloudMessaging_WebpushConfig $webpush)
  {
    $this->webpush = $webpush;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_WebpushConfig
   */
  public function getWebpush()
  {
    return $this->webpush;
  }
}
