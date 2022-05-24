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

class ApproximateSplitRequest extends \Google\Model
{
  public $fractionConsumed;
  public $fractionOfRemainder;
  protected $positionType = Position::class;
  protected $positionDataType = '';

  public function setFractionConsumed($fractionConsumed)
  {
    $this->fractionConsumed = $fractionConsumed;
  }
  public function getFractionConsumed()
  {
    return $this->fractionConsumed;
  }
  public function setFractionOfRemainder($fractionOfRemainder)
  {
    $this->fractionOfRemainder = $fractionOfRemainder;
  }
  public function getFractionOfRemainder()
  {
    return $this->fractionOfRemainder;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApproximateSplitRequest::class, 'Google_Service_Dataflow_ApproximateSplitRequest');
