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

class Google_Service_CloudBuild_Notification extends Google_Model
{
  public $filter;
  protected $httpDeliveryType = 'Google_Service_CloudBuild_HTTPDelivery';
  protected $httpDeliveryDataType = '';
  protected $slackDeliveryType = 'Google_Service_CloudBuild_SlackDelivery';
  protected $slackDeliveryDataType = '';
  protected $smtpDeliveryType = 'Google_Service_CloudBuild_SMTPDelivery';
  protected $smtpDeliveryDataType = '';
  public $structDelivery;

  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param Google_Service_CloudBuild_HTTPDelivery
   */
  public function setHttpDelivery(Google_Service_CloudBuild_HTTPDelivery $httpDelivery)
  {
    $this->httpDelivery = $httpDelivery;
  }
  /**
   * @return Google_Service_CloudBuild_HTTPDelivery
   */
  public function getHttpDelivery()
  {
    return $this->httpDelivery;
  }
  /**
   * @param Google_Service_CloudBuild_SlackDelivery
   */
  public function setSlackDelivery(Google_Service_CloudBuild_SlackDelivery $slackDelivery)
  {
    $this->slackDelivery = $slackDelivery;
  }
  /**
   * @return Google_Service_CloudBuild_SlackDelivery
   */
  public function getSlackDelivery()
  {
    return $this->slackDelivery;
  }
  /**
   * @param Google_Service_CloudBuild_SMTPDelivery
   */
  public function setSmtpDelivery(Google_Service_CloudBuild_SMTPDelivery $smtpDelivery)
  {
    $this->smtpDelivery = $smtpDelivery;
  }
  /**
   * @return Google_Service_CloudBuild_SMTPDelivery
   */
  public function getSmtpDelivery()
  {
    return $this->smtpDelivery;
  }
  public function setStructDelivery($structDelivery)
  {
    $this->structDelivery = $structDelivery;
  }
  public function getStructDelivery()
  {
    return $this->structDelivery;
  }
}
