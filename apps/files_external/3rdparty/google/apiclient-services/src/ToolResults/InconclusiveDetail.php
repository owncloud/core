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

namespace Google\Service\ToolResults;

class InconclusiveDetail extends \Google\Model
{
  /**
   * @var bool
   */
  public $abortedByUser;
  /**
   * @var bool
   */
  public $hasErrorLogs;
  /**
   * @var bool
   */
  public $infrastructureFailure;

  /**
   * @param bool
   */
  public function setAbortedByUser($abortedByUser)
  {
    $this->abortedByUser = $abortedByUser;
  }
  /**
   * @return bool
   */
  public function getAbortedByUser()
  {
    return $this->abortedByUser;
  }
  /**
   * @param bool
   */
  public function setHasErrorLogs($hasErrorLogs)
  {
    $this->hasErrorLogs = $hasErrorLogs;
  }
  /**
   * @return bool
   */
  public function getHasErrorLogs()
  {
    return $this->hasErrorLogs;
  }
  /**
   * @param bool
   */
  public function setInfrastructureFailure($infrastructureFailure)
  {
    $this->infrastructureFailure = $infrastructureFailure;
  }
  /**
   * @return bool
   */
  public function getInfrastructureFailure()
  {
    return $this->infrastructureFailure;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InconclusiveDetail::class, 'Google_Service_ToolResults_InconclusiveDetail');
