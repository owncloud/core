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

namespace Google\Service\Bigquery;

class DoubleHparamSearchSpace extends \Google\Model
{
  protected $candidatesType = DoubleCandidates::class;
  protected $candidatesDataType = '';
  protected $rangeType = DoubleRange::class;
  protected $rangeDataType = '';

  /**
   * @param DoubleCandidates
   */
  public function setCandidates(DoubleCandidates $candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return DoubleCandidates
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param DoubleRange
   */
  public function setRange(DoubleRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return DoubleRange
   */
  public function getRange()
  {
    return $this->range;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DoubleHparamSearchSpace::class, 'Google_Service_Bigquery_DoubleHparamSearchSpace');
