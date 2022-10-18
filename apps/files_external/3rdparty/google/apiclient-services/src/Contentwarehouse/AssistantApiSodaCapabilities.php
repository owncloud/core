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

class AssistantApiSodaCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $supportsHotwordSensitivity;
  /**
   * @var bool
   */
  public $supportsSimpleStop;
  /**
   * @var bool
   */
  public $supportsSpeakerId;
  /**
   * @var bool
   */
  public $supportsWarmWords;

  /**
   * @param bool
   */
  public function setSupportsHotwordSensitivity($supportsHotwordSensitivity)
  {
    $this->supportsHotwordSensitivity = $supportsHotwordSensitivity;
  }
  /**
   * @return bool
   */
  public function getSupportsHotwordSensitivity()
  {
    return $this->supportsHotwordSensitivity;
  }
  /**
   * @param bool
   */
  public function setSupportsSimpleStop($supportsSimpleStop)
  {
    $this->supportsSimpleStop = $supportsSimpleStop;
  }
  /**
   * @return bool
   */
  public function getSupportsSimpleStop()
  {
    return $this->supportsSimpleStop;
  }
  /**
   * @param bool
   */
  public function setSupportsSpeakerId($supportsSpeakerId)
  {
    $this->supportsSpeakerId = $supportsSpeakerId;
  }
  /**
   * @return bool
   */
  public function getSupportsSpeakerId()
  {
    return $this->supportsSpeakerId;
  }
  /**
   * @param bool
   */
  public function setSupportsWarmWords($supportsWarmWords)
  {
    $this->supportsWarmWords = $supportsWarmWords;
  }
  /**
   * @return bool
   */
  public function getSupportsWarmWords()
  {
    return $this->supportsWarmWords;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSodaCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiSodaCapabilities');
