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

namespace Google\Service\CloudTalentSolution;

class CompensationRange extends \Google\Model
{
  protected $maxCompensationType = Money::class;
  protected $maxCompensationDataType = '';
  protected $minCompensationType = Money::class;
  protected $minCompensationDataType = '';

  /**
   * @param Money
   */
  public function setMaxCompensation(Money $maxCompensation)
  {
    $this->maxCompensation = $maxCompensation;
  }
  /**
   * @return Money
   */
  public function getMaxCompensation()
  {
    return $this->maxCompensation;
  }
  /**
   * @param Money
   */
  public function setMinCompensation(Money $minCompensation)
  {
    $this->minCompensation = $minCompensation;
  }
  /**
   * @return Money
   */
  public function getMinCompensation()
  {
    return $this->minCompensation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompensationRange::class, 'Google_Service_CloudTalentSolution_CompensationRange');
