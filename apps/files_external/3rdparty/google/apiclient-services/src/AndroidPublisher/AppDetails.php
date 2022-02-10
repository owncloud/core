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

namespace Google\Service\AndroidPublisher;

class AppDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $contactEmail;
  /**
   * @var string
   */
  public $contactPhone;
  /**
   * @var string
   */
  public $contactWebsite;
  /**
   * @var string
   */
  public $defaultLanguage;

  /**
   * @param string
   */
  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  /**
   * @return string
   */
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  /**
   * @param string
   */
  public function setContactPhone($contactPhone)
  {
    $this->contactPhone = $contactPhone;
  }
  /**
   * @return string
   */
  public function getContactPhone()
  {
    return $this->contactPhone;
  }
  /**
   * @param string
   */
  public function setContactWebsite($contactWebsite)
  {
    $this->contactWebsite = $contactWebsite;
  }
  /**
   * @return string
   */
  public function getContactWebsite()
  {
    return $this->contactWebsite;
  }
  /**
   * @param string
   */
  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return string
   */
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppDetails::class, 'Google_Service_AndroidPublisher_AppDetails');
