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

class AssistantApiLensPerceptionCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $hasLensPerception;
  /**
   * @var bool
   */
  public $isLensDirectIntentAvailable;
  /**
   * @var bool
   */
  public $isLensLiveViewfinderAvailable;
  /**
   * @var bool
   */
  public $isLensPostCaptureAvailable;
  protected $lensCapabilitiesType = AssistantApiLensPerceptionCapabilitiesLensCapabilities::class;
  protected $lensCapabilitiesDataType = '';

  /**
   * @param bool
   */
  public function setHasLensPerception($hasLensPerception)
  {
    $this->hasLensPerception = $hasLensPerception;
  }
  /**
   * @return bool
   */
  public function getHasLensPerception()
  {
    return $this->hasLensPerception;
  }
  /**
   * @param bool
   */
  public function setIsLensDirectIntentAvailable($isLensDirectIntentAvailable)
  {
    $this->isLensDirectIntentAvailable = $isLensDirectIntentAvailable;
  }
  /**
   * @return bool
   */
  public function getIsLensDirectIntentAvailable()
  {
    return $this->isLensDirectIntentAvailable;
  }
  /**
   * @param bool
   */
  public function setIsLensLiveViewfinderAvailable($isLensLiveViewfinderAvailable)
  {
    $this->isLensLiveViewfinderAvailable = $isLensLiveViewfinderAvailable;
  }
  /**
   * @return bool
   */
  public function getIsLensLiveViewfinderAvailable()
  {
    return $this->isLensLiveViewfinderAvailable;
  }
  /**
   * @param bool
   */
  public function setIsLensPostCaptureAvailable($isLensPostCaptureAvailable)
  {
    $this->isLensPostCaptureAvailable = $isLensPostCaptureAvailable;
  }
  /**
   * @return bool
   */
  public function getIsLensPostCaptureAvailable()
  {
    return $this->isLensPostCaptureAvailable;
  }
  /**
   * @param AssistantApiLensPerceptionCapabilitiesLensCapabilities
   */
  public function setLensCapabilities(AssistantApiLensPerceptionCapabilitiesLensCapabilities $lensCapabilities)
  {
    $this->lensCapabilities = $lensCapabilities;
  }
  /**
   * @return AssistantApiLensPerceptionCapabilitiesLensCapabilities
   */
  public function getLensCapabilities()
  {
    return $this->lensCapabilities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiLensPerceptionCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiLensPerceptionCapabilities');
