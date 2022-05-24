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

namespace Google\Service\Dataflow;

class ApproximateReportedProgress extends \Google\Model
{
  protected $consumedParallelismType = ReportedParallelism::class;
  protected $consumedParallelismDataType = '';
  public $fractionConsumed;
  protected $positionType = Position::class;
  protected $positionDataType = '';
  protected $remainingParallelismType = ReportedParallelism::class;
  protected $remainingParallelismDataType = '';

  /**
   * @param ReportedParallelism
   */
  public function setConsumedParallelism(ReportedParallelism $consumedParallelism)
  {
    $this->consumedParallelism = $consumedParallelism;
  }
  /**
   * @return ReportedParallelism
   */
  public function getConsumedParallelism()
  {
    return $this->consumedParallelism;
  }
  public function setFractionConsumed($fractionConsumed)
  {
    $this->fractionConsumed = $fractionConsumed;
  }
  public function getFractionConsumed()
  {
    return $this->fractionConsumed;
  }
  /**
   * @param Position
   */
  public function setPosition(Position $position)
  {
    $this->position = $position;
  }
  /**
   * @return Position
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param ReportedParallelism
   */
  public function setRemainingParallelism(ReportedParallelism $remainingParallelism)
  {
    $this->remainingParallelism = $remainingParallelism;
  }
  /**
   * @return ReportedParallelism
   */
  public function getRemainingParallelism()
  {
    return $this->remainingParallelism;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApproximateReportedProgress::class, 'Google_Service_Dataflow_ApproximateReportedProgress');
