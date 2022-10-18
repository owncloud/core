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

class GoogleCloudContentwarehouseV1ActionOutput extends \Google\Model
{
  /**
   * @var string
   */
  public $actionId;
  /**
   * @var string
   */
  public $actionState;
  /**
   * @var string
   */
  public $outputMessage;

  /**
   * @param string
   */
  public function setActionId($actionId)
  {
    $this->actionId = $actionId;
  }
  /**
   * @return string
   */
  public function getActionId()
  {
    return $this->actionId;
  }
  /**
   * @param string
   */
  public function setActionState($actionState)
  {
    $this->actionState = $actionState;
  }
  /**
   * @return string
   */
  public function getActionState()
  {
    return $this->actionState;
  }
  /**
   * @param string
   */
  public function setOutputMessage($outputMessage)
  {
    $this->outputMessage = $outputMessage;
  }
  /**
   * @return string
   */
  public function getOutputMessage()
  {
    return $this->outputMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1ActionOutput::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1ActionOutput');
