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

namespace Google\Service\TagManager;

class TagConsentSetting extends \Google\Model
{
  public $consentStatus;
  protected $consentTypeType = Parameter::class;
  protected $consentTypeDataType = '';

  public function setConsentStatus($consentStatus)
  {
    $this->consentStatus = $consentStatus;
  }
  public function getConsentStatus()
  {
    return $this->consentStatus;
  }
  /**
   * @param Parameter
   */
  public function setConsentType(Parameter $consentType)
  {
    $this->consentType = $consentType;
  }
  /**
   * @return Parameter
   */
  public function getConsentType()
  {
    return $this->consentType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TagConsentSetting::class, 'Google_Service_TagManager_TagConsentSetting');
