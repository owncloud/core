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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoLoopMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $currentIterationCount;
  /**
   * @var string
   */
  public $currentIterationDetail;
  /**
   * @var string
   */
  public $errorMsg;
  /**
   * @var string
   */
  public $failureLocation;

  /**
   * @param string
   */
  public function setCurrentIterationCount($currentIterationCount)
  {
    $this->currentIterationCount = $currentIterationCount;
  }
  /**
   * @return string
   */
  public function getCurrentIterationCount()
  {
    return $this->currentIterationCount;
  }
  /**
   * @param string
   */
  public function setCurrentIterationDetail($currentIterationDetail)
  {
    $this->currentIterationDetail = $currentIterationDetail;
  }
  /**
   * @return string
   */
  public function getCurrentIterationDetail()
  {
    return $this->currentIterationDetail;
  }
  /**
   * @param string
   */
  public function setErrorMsg($errorMsg)
  {
    $this->errorMsg = $errorMsg;
  }
  /**
   * @return string
   */
  public function getErrorMsg()
  {
    return $this->errorMsg;
  }
  /**
   * @param string
   */
  public function setFailureLocation($failureLocation)
  {
    $this->failureLocation = $failureLocation;
  }
  /**
   * @return string
   */
  public function getFailureLocation()
  {
    return $this->failureLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoLoopMetadata::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoLoopMetadata');
