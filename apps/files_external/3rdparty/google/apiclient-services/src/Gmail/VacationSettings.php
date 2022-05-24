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

namespace Google\Service\Gmail;

class VacationSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableAutoReply;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $responseBodyHtml;
  /**
   * @var string
   */
  public $responseBodyPlainText;
  /**
   * @var string
   */
  public $responseSubject;
  /**
   * @var bool
   */
  public $restrictToContacts;
  /**
   * @var bool
   */
  public $restrictToDomain;
  /**
   * @var string
   */
  public $startTime;

  /**
   * @param bool
   */
  public function setEnableAutoReply($enableAutoReply)
  {
    $this->enableAutoReply = $enableAutoReply;
  }
  /**
   * @return bool
   */
  public function getEnableAutoReply()
  {
    return $this->enableAutoReply;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setResponseBodyHtml($responseBodyHtml)
  {
    $this->responseBodyHtml = $responseBodyHtml;
  }
  /**
   * @return string
   */
  public function getResponseBodyHtml()
  {
    return $this->responseBodyHtml;
  }
  /**
   * @param string
   */
  public function setResponseBodyPlainText($responseBodyPlainText)
  {
    $this->responseBodyPlainText = $responseBodyPlainText;
  }
  /**
   * @return string
   */
  public function getResponseBodyPlainText()
  {
    return $this->responseBodyPlainText;
  }
  /**
   * @param string
   */
  public function setResponseSubject($responseSubject)
  {
    $this->responseSubject = $responseSubject;
  }
  /**
   * @return string
   */
  public function getResponseSubject()
  {
    return $this->responseSubject;
  }
  /**
   * @param bool
   */
  public function setRestrictToContacts($restrictToContacts)
  {
    $this->restrictToContacts = $restrictToContacts;
  }
  /**
   * @return bool
   */
  public function getRestrictToContacts()
  {
    return $this->restrictToContacts;
  }
  /**
   * @param bool
   */
  public function setRestrictToDomain($restrictToDomain)
  {
    $this->restrictToDomain = $restrictToDomain;
  }
  /**
   * @return bool
   */
  public function getRestrictToDomain()
  {
    return $this->restrictToDomain;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VacationSettings::class, 'Google_Service_Gmail_VacationSettings');
