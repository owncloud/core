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

namespace Google\Service\CloudAsset;

class MoveAnalysis extends \Google\Model
{
  protected $analysisType = MoveAnalysisResult::class;
  protected $analysisDataType = '';
  /**
   * @var string
   */
  public $displayName;
  protected $errorType = Status::class;
  protected $errorDataType = '';

  /**
   * @param MoveAnalysisResult
   */
  public function setAnalysis(MoveAnalysisResult $analysis)
  {
    $this->analysis = $analysis;
  }
  /**
   * @return MoveAnalysisResult
   */
  public function getAnalysis()
  {
    return $this->analysis;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MoveAnalysis::class, 'Google_Service_CloudAsset_MoveAnalysis');
