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

namespace Google\Service\OnDemandScanning;

class Metadata extends \Google\Model
{
  public $buildFinishedOn;
  public $buildInvocationId;
  public $buildStartedOn;
  protected $completenessType = Completeness::class;
  protected $completenessDataType = '';
  public $reproducible;

  public function setBuildFinishedOn($buildFinishedOn)
  {
    $this->buildFinishedOn = $buildFinishedOn;
  }
  public function getBuildFinishedOn()
  {
    return $this->buildFinishedOn;
  }
  public function setBuildInvocationId($buildInvocationId)
  {
    $this->buildInvocationId = $buildInvocationId;
  }
  public function getBuildInvocationId()
  {
    return $this->buildInvocationId;
  }
  public function setBuildStartedOn($buildStartedOn)
  {
    $this->buildStartedOn = $buildStartedOn;
  }
  public function getBuildStartedOn()
  {
    return $this->buildStartedOn;
  }
  /**
   * @param Completeness
   */
  public function setCompleteness(Completeness $completeness)
  {
    $this->completeness = $completeness;
  }
  /**
   * @return Completeness
   */
  public function getCompleteness()
  {
    return $this->completeness;
  }
  public function setReproducible($reproducible)
  {
    $this->reproducible = $reproducible;
  }
  public function getReproducible()
  {
    return $this->reproducible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metadata::class, 'Google_Service_OnDemandScanning_Metadata');
