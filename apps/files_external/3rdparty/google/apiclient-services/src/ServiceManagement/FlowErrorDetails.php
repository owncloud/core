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

namespace Google\Service\ServiceManagement;

class FlowErrorDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $exceptionType;
  /**
   * @var string
   */
  public $flowStepId;

  /**
   * @param string
   */
  public function setExceptionType($exceptionType)
  {
    $this->exceptionType = $exceptionType;
  }
  /**
   * @return string
   */
  public function getExceptionType()
  {
    return $this->exceptionType;
  }
  /**
   * @param string
   */
  public function setFlowStepId($flowStepId)
  {
    $this->flowStepId = $flowStepId;
  }
  /**
   * @return string
   */
  public function getFlowStepId()
  {
    return $this->flowStepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FlowErrorDetails::class, 'Google_Service_ServiceManagement_FlowErrorDetails');
