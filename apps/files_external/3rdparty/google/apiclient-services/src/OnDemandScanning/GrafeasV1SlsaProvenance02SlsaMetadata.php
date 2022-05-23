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

class GrafeasV1SlsaProvenance02SlsaMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $buildFinishedOn;
  /**
   * @var string
   */
  public $buildInvocationId;
  /**
   * @var string
   */
  public $buildStartedOn;
  protected $completenessType = GrafeasV1SlsaProvenance02SlsaCompleteness::class;
  protected $completenessDataType = '';
  /**
   * @var bool
   */
  public $reproducible;

  /**
   * @param string
   */
  public function setBuildFinishedOn($buildFinishedOn)
  {
    $this->buildFinishedOn = $buildFinishedOn;
  }
  /**
   * @return string
   */
  public function getBuildFinishedOn()
  {
    return $this->buildFinishedOn;
  }
  /**
   * @param string
   */
  public function setBuildInvocationId($buildInvocationId)
  {
    $this->buildInvocationId = $buildInvocationId;
  }
  /**
   * @return string
   */
  public function getBuildInvocationId()
  {
    return $this->buildInvocationId;
  }
  /**
   * @param string
   */
  public function setBuildStartedOn($buildStartedOn)
  {
    $this->buildStartedOn = $buildStartedOn;
  }
  /**
   * @return string
   */
  public function getBuildStartedOn()
  {
    return $this->buildStartedOn;
  }
  /**
   * @param GrafeasV1SlsaProvenance02SlsaCompleteness
   */
  public function setCompleteness(GrafeasV1SlsaProvenance02SlsaCompleteness $completeness)
  {
    $this->completeness = $completeness;
  }
  /**
   * @return GrafeasV1SlsaProvenance02SlsaCompleteness
   */
  public function getCompleteness()
  {
    return $this->completeness;
  }
  /**
   * @param bool
   */
  public function setReproducible($reproducible)
  {
    $this->reproducible = $reproducible;
  }
  /**
   * @return bool
   */
  public function getReproducible()
  {
    return $this->reproducible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GrafeasV1SlsaProvenance02SlsaMetadata::class, 'Google_Service_OnDemandScanning_GrafeasV1SlsaProvenance02SlsaMetadata');
