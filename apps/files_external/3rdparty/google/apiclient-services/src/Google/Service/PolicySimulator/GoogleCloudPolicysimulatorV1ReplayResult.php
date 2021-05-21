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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayResult extends Google_Model
{
  protected $accessTupleType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1AccessTuple';
  protected $accessTupleDataType = '';
  protected $diffType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayDiff';
  protected $diffDataType = '';
  protected $errorType = 'Google_Service_PolicySimulator_GoogleRpcStatus';
  protected $errorDataType = '';
  protected $lastSeenDateType = 'Google_Service_PolicySimulator_GoogleTypeDate';
  protected $lastSeenDateDataType = '';
  public $name;
  public $parent;

  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1AccessTuple
   */
  public function setAccessTuple(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1AccessTuple $accessTuple)
  {
    $this->accessTuple = $accessTuple;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1AccessTuple
   */
  public function getAccessTuple()
  {
    return $this->accessTuple;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayDiff
   */
  public function setDiff(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayDiff $diff)
  {
    $this->diff = $diff;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayDiff
   */
  public function getDiff()
  {
    return $this->diff;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleRpcStatus
   */
  public function setError(Google_Service_PolicySimulator_GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleTypeDate
   */
  public function setLastSeenDate(Google_Service_PolicySimulator_GoogleTypeDate $lastSeenDate)
  {
    $this->lastSeenDate = $lastSeenDate;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleTypeDate
   */
  public function getLastSeenDate()
  {
    return $this->lastSeenDate;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
}
