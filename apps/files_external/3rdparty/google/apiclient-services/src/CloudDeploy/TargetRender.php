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

namespace Google\Service\CloudDeploy;

class TargetRender extends \Google\Model
{
  /**
   * @var string
   */
  public $failureCause;
  /**
   * @var string
   */
  public $failureMessage;
  /**
   * @var string
   */
  public $renderingBuild;
  /**
   * @var string
   */
  public $renderingState;

  /**
   * @param string
   */
  public function setFailureCause($failureCause)
  {
    $this->failureCause = $failureCause;
  }
  /**
   * @return string
   */
  public function getFailureCause()
  {
    return $this->failureCause;
  }
  /**
   * @param string
   */
  public function setFailureMessage($failureMessage)
  {
    $this->failureMessage = $failureMessage;
  }
  /**
   * @return string
   */
  public function getFailureMessage()
  {
    return $this->failureMessage;
  }
  /**
   * @param string
   */
  public function setRenderingBuild($renderingBuild)
  {
    $this->renderingBuild = $renderingBuild;
  }
  /**
   * @return string
   */
  public function getRenderingBuild()
  {
    return $this->renderingBuild;
  }
  /**
   * @param string
   */
  public function setRenderingState($renderingState)
  {
    $this->renderingState = $renderingState;
  }
  /**
   * @return string
   */
  public function getRenderingState()
  {
    return $this->renderingState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetRender::class, 'Google_Service_CloudDeploy_TargetRender');
