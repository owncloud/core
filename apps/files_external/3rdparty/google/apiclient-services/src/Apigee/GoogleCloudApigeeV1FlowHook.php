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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1FlowHook extends \Google\Model
{
  /**
   * @var bool
   */
  public $continueOnError;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $flowHookPoint;
  /**
   * @var string
   */
  public $sharedFlow;

  /**
   * @param bool
   */
  public function setContinueOnError($continueOnError)
  {
    $this->continueOnError = $continueOnError;
  }
  /**
   * @return bool
   */
  public function getContinueOnError()
  {
    return $this->continueOnError;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFlowHookPoint($flowHookPoint)
  {
    $this->flowHookPoint = $flowHookPoint;
  }
  /**
   * @return string
   */
  public function getFlowHookPoint()
  {
    return $this->flowHookPoint;
  }
  /**
   * @param string
   */
  public function setSharedFlow($sharedFlow)
  {
    $this->sharedFlow = $sharedFlow;
  }
  /**
   * @return string
   */
  public function getSharedFlow()
  {
    return $this->sharedFlow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1FlowHook::class, 'Google_Service_Apigee_GoogleCloudApigeeV1FlowHook');
