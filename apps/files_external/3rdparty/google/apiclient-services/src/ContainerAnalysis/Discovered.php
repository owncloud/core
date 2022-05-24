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

namespace Google\Service\ContainerAnalysis;

class Discovered extends \Google\Model
{
  public $analysisStatus;
  protected $analysisStatusErrorType = Status::class;
  protected $analysisStatusErrorDataType = '';
  public $continuousAnalysis;
  public $lastAnalysisTime;

  public function setAnalysisStatus($analysisStatus)
  {
    $this->analysisStatus = $analysisStatus;
  }
  public function getAnalysisStatus()
  {
    return $this->analysisStatus;
  }
  /**
   * @param Status
   */
  public function setAnalysisStatusError(Status $analysisStatusError)
  {
    $this->analysisStatusError = $analysisStatusError;
  }
  /**
   * @return Status
   */
  public function getAnalysisStatusError()
  {
    return $this->analysisStatusError;
  }
  public function setContinuousAnalysis($continuousAnalysis)
  {
    $this->continuousAnalysis = $continuousAnalysis;
  }
  public function getContinuousAnalysis()
  {
    return $this->continuousAnalysis;
  }
  public function setLastAnalysisTime($lastAnalysisTime)
  {
    $this->lastAnalysisTime = $lastAnalysisTime;
  }
  public function getLastAnalysisTime()
  {
    return $this->lastAnalysisTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Discovered::class, 'Google_Service_ContainerAnalysis_Discovered');
