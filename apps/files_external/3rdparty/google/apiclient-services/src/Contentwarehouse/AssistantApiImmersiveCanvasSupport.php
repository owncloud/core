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

class AssistantApiImmersiveCanvasSupport extends \Google\Model
{
  /**
   * @var bool
   */
  public $confirmationMessageSupported;
  /**
   * @var bool
   */
  public $pauseSignalSupported;

  /**
   * @param bool
   */
  public function setConfirmationMessageSupported($confirmationMessageSupported)
  {
    $this->confirmationMessageSupported = $confirmationMessageSupported;
  }
  /**
   * @return bool
   */
  public function getConfirmationMessageSupported()
  {
    return $this->confirmationMessageSupported;
  }
  /**
   * @param bool
   */
  public function setPauseSignalSupported($pauseSignalSupported)
  {
    $this->pauseSignalSupported = $pauseSignalSupported;
  }
  /**
   * @return bool
   */
  public function getPauseSignalSupported()
  {
    return $this->pauseSignalSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiImmersiveCanvasSupport::class, 'Google_Service_Contentwarehouse_AssistantApiImmersiveCanvasSupport');
