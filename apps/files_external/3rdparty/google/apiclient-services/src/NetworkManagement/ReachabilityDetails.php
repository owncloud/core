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

namespace Google\Service\NetworkManagement;

class ReachabilityDetails extends \Google\Collection
{
  protected $collection_key = 'traces';
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $result;
  protected $tracesType = Trace::class;
  protected $tracesDataType = 'array';
  public $verifyTime;

  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  public function setResult($result)
  {
    $this->result = $result;
  }
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param Trace[]
   */
  public function setTraces($traces)
  {
    $this->traces = $traces;
  }
  /**
   * @return Trace[]
   */
  public function getTraces()
  {
    return $this->traces;
  }
  public function setVerifyTime($verifyTime)
  {
    $this->verifyTime = $verifyTime;
  }
  public function getVerifyTime()
  {
    return $this->verifyTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReachabilityDetails::class, 'Google_Service_NetworkManagement_ReachabilityDetails');
