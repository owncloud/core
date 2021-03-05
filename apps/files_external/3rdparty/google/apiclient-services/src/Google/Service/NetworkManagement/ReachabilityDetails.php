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

class Google_Service_NetworkManagement_ReachabilityDetails extends Google_Collection
{
  protected $collection_key = 'traces';
  protected $errorType = 'Google_Service_NetworkManagement_Status';
  protected $errorDataType = '';
  public $result;
  protected $tracesType = 'Google_Service_NetworkManagement_Trace';
  protected $tracesDataType = 'array';
  public $verifyTime;

  /**
   * @param Google_Service_NetworkManagement_Status
   */
  public function setError(Google_Service_NetworkManagement_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_NetworkManagement_Status
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
   * @param Google_Service_NetworkManagement_Trace[]
   */
  public function setTraces($traces)
  {
    $this->traces = $traces;
  }
  /**
   * @return Google_Service_NetworkManagement_Trace[]
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
