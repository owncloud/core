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

class DiscoveryOccurrence extends \Google\Collection
{
  protected $collection_key = 'analysisError';
  protected $analysisCompletedType = AnalysisCompleted::class;
  protected $analysisCompletedDataType = '';
  protected $analysisErrorType = Status::class;
  protected $analysisErrorDataType = 'array';
  /**
   * @var string
   */
  public $analysisStatus;
  protected $analysisStatusErrorType = Status::class;
  protected $analysisStatusErrorDataType = '';
  /**
   * @var string
   */
  public $archiveTime;
  /**
   * @var string
   */
  public $continuousAnalysis;
  /**
   * @var string
   */
  public $cpe;
  /**
   * @var string
   */
  public $lastScanTime;

  /**
   * @param AnalysisCompleted
   */
  public function setAnalysisCompleted(AnalysisCompleted $analysisCompleted)
  {
    $this->analysisCompleted = $analysisCompleted;
  }
  /**
   * @return AnalysisCompleted
   */
  public function getAnalysisCompleted()
  {
    return $this->analysisCompleted;
  }
  /**
   * @param Status[]
   */
  public function setAnalysisError($analysisError)
  {
    $this->analysisError = $analysisError;
  }
  /**
   * @return Status[]
   */
  public function getAnalysisError()
  {
    return $this->analysisError;
  }
  /**
   * @param string
   */
  public function setAnalysisStatus($analysisStatus)
  {
    $this->analysisStatus = $analysisStatus;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setArchiveTime($archiveTime)
  {
    $this->archiveTime = $archiveTime;
  }
  /**
   * @return string
   */
  public function getArchiveTime()
  {
    return $this->archiveTime;
  }
  /**
   * @param string
   */
  public function setContinuousAnalysis($continuousAnalysis)
  {
    $this->continuousAnalysis = $continuousAnalysis;
  }
  /**
   * @return string
   */
  public function getContinuousAnalysis()
  {
    return $this->continuousAnalysis;
  }
  /**
   * @param string
   */
  public function setCpe($cpe)
  {
    $this->cpe = $cpe;
  }
  /**
   * @return string
   */
  public function getCpe()
  {
    return $this->cpe;
  }
  /**
   * @param string
   */
  public function setLastScanTime($lastScanTime)
  {
    $this->lastScanTime = $lastScanTime;
  }
  /**
   * @return string
   */
  public function getLastScanTime()
  {
    return $this->lastScanTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiscoveryOccurrence::class, 'Google_Service_ContainerAnalysis_DiscoveryOccurrence');
