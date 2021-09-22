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

class BqmlTrainingRunTrainingOptions extends \Google\Model
{
  public $earlyStop;
  public $l1Reg;
  public $l2Reg;
  public $learnRate;
  public $learnRateStrategy;
  public $lineSearchInitLearnRate;
  public $maxIteration;
  public $minRelProgress;
  public $warmStart;

  public function setEarlyStop($earlyStop)
  {
    $this->earlyStop = $earlyStop;
  }
  public function getEarlyStop()
  {
    return $this->earlyStop;
  }
  public function setL1Reg($l1Reg)
  {
    $this->l1Reg = $l1Reg;
  }
  public function getL1Reg()
  {
    return $this->l1Reg;
  }
  public function setL2Reg($l2Reg)
  {
    $this->l2Reg = $l2Reg;
  }
  public function getL2Reg()
  {
    return $this->l2Reg;
  }
  public function setLearnRate($learnRate)
  {
    $this->learnRate = $learnRate;
  }
  public function getLearnRate()
  {
    return $this->learnRate;
  }
  public function setLearnRateStrategy($learnRateStrategy)
  {
    $this->learnRateStrategy = $learnRateStrategy;
  }
  public function getLearnRateStrategy()
  {
    return $this->learnRateStrategy;
  }
  public function setLineSearchInitLearnRate($lineSearchInitLearnRate)
  {
    $this->lineSearchInitLearnRate = $lineSearchInitLearnRate;
  }
  public function getLineSearchInitLearnRate()
  {
    return $this->lineSearchInitLearnRate;
  }
  public function setMaxIteration($maxIteration)
  {
    $this->maxIteration = $maxIteration;
  }
  public function getMaxIteration()
  {
    return $this->maxIteration;
  }
  public function setMinRelProgress($minRelProgress)
  {
    $this->minRelProgress = $minRelProgress;
  }
  public function getMinRelProgress()
  {
    return $this->minRelProgress;
  }
  public function setWarmStart($warmStart)
  {
    $this->warmStart = $warmStart;
  }
  public function getWarmStart()
  {
    return $this->warmStart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BqmlTrainingRunTrainingOptions::class, 'Google_Service_Bigquery_BqmlTrainingRunTrainingOptions');
