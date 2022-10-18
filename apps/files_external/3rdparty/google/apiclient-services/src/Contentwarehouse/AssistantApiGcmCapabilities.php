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

namespace Google\Service\Contentwarehouse;

class AssistantApiGcmCapabilities extends \Google\Model
{
  /**
   * @var string
   */
  public $gcmRegistrationId;
  /**
   * @var bool
   */
  public $supportsAssistantGcm;
  /**
   * @var bool
   */
  public $supportsClientInputOverGcm;

  /**
   * @param string
   */
  public function setGcmRegistrationId($gcmRegistrationId)
  {
    $this->gcmRegistrationId = $gcmRegistrationId;
  }
  /**
   * @return string
   */
  public function getGcmRegistrationId()
  {
    return $this->gcmRegistrationId;
  }
  /**
   * @param bool
   */
  public function setSupportsAssistantGcm($supportsAssistantGcm)
  {
    $this->supportsAssistantGcm = $supportsAssistantGcm;
  }
  /**
   * @return bool
   */
  public function getSupportsAssistantGcm()
  {
    return $this->supportsAssistantGcm;
  }
  /**
   * @param bool
   */
  public function setSupportsClientInputOverGcm($supportsClientInputOverGcm)
  {
    $this->supportsClientInputOverGcm = $supportsClientInputOverGcm;
  }
  /**
   * @return bool
   */
  public function getSupportsClientInputOverGcm()
  {
    return $this->supportsClientInputOverGcm;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiGcmCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiGcmCapabilities');
