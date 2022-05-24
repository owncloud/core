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

namespace Google\Service\Essentialcontacts;

class GoogleCloudEssentialcontactsV1Contact extends \Google\Collection
{
  protected $collection_key = 'notificationCategorySubscriptions';
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $languageTag;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $notificationCategorySubscriptions;
  /**
   * @var string
   */
  public $validateTime;
  /**
   * @var string
   */
  public $validationState;

  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setLanguageTag($languageTag)
  {
    $this->languageTag = $languageTag;
  }
  /**
   * @return string
   */
  public function getLanguageTag()
  {
    return $this->languageTag;
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
   * @param string[]
   */
  public function setNotificationCategorySubscriptions($notificationCategorySubscriptions)
  {
    $this->notificationCategorySubscriptions = $notificationCategorySubscriptions;
  }
  /**
   * @return string[]
   */
  public function getNotificationCategorySubscriptions()
  {
    return $this->notificationCategorySubscriptions;
  }
  /**
   * @param string
   */
  public function setValidateTime($validateTime)
  {
    $this->validateTime = $validateTime;
  }
  /**
   * @return string
   */
  public function getValidateTime()
  {
    return $this->validateTime;
  }
  /**
   * @param string
   */
  public function setValidationState($validationState)
  {
    $this->validationState = $validationState;
  }
  /**
   * @return string
   */
  public function getValidationState()
  {
    return $this->validationState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudEssentialcontactsV1Contact::class, 'Google_Service_Essentialcontacts_GoogleCloudEssentialcontactsV1Contact');
