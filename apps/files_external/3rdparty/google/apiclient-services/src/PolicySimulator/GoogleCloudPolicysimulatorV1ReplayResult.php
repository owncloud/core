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

namespace Google\Service\PolicySimulator;

class GoogleCloudPolicysimulatorV1ReplayResult extends \Google\Model
{
  protected $accessTupleType = GoogleCloudPolicysimulatorV1AccessTuple::class;
  protected $accessTupleDataType = '';
  protected $diffType = GoogleCloudPolicysimulatorV1ReplayDiff::class;
  protected $diffDataType = '';
  protected $errorType = GoogleRpcStatus::class;
  protected $errorDataType = '';
  protected $lastSeenDateType = GoogleTypeDate::class;
  protected $lastSeenDateDataType = '';
  public $name;
  public $parent;

  /**
   * @param GoogleCloudPolicysimulatorV1AccessTuple
   */
  public function setAccessTuple(GoogleCloudPolicysimulatorV1AccessTuple $accessTuple)
  {
    $this->accessTuple = $accessTuple;
  }
  /**
   * @return GoogleCloudPolicysimulatorV1AccessTuple
   */
  public function getAccessTuple()
  {
    return $this->accessTuple;
  }
  /**
   * @param GoogleCloudPolicysimulatorV1ReplayDiff
   */
  public function setDiff(GoogleCloudPolicysimulatorV1ReplayDiff $diff)
  {
    $this->diff = $diff;
  }
  /**
   * @return GoogleCloudPolicysimulatorV1ReplayDiff
   */
  public function getDiff()
  {
    return $this->diff;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setError(GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setLastSeenDate(GoogleTypeDate $lastSeenDate)
  {
    $this->lastSeenDate = $lastSeenDate;
  }
  /**
   * @return GoogleTypeDate
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicysimulatorV1ReplayResult::class, 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayResult');
