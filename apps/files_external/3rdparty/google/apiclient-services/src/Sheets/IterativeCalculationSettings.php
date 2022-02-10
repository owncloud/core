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

namespace Google\Service\Sheets;

class IterativeCalculationSettings extends \Google\Model
{
  public $convergenceThreshold;
  /**
   * @var int
   */
  public $maxIterations;

  public function setConvergenceThreshold($convergenceThreshold)
  {
    $this->convergenceThreshold = $convergenceThreshold;
  }
  public function getConvergenceThreshold()
  {
    return $this->convergenceThreshold;
  }
  /**
   * @param int
   */
  public function setMaxIterations($maxIterations)
  {
    $this->maxIterations = $maxIterations;
  }
  /**
   * @return int
   */
  public function getMaxIterations()
  {
    return $this->maxIterations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IterativeCalculationSettings::class, 'Google_Service_Sheets_IterativeCalculationSettings');
