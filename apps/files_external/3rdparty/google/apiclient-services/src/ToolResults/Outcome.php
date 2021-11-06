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

namespace Google\Service\ToolResults;

class Outcome extends \Google\Model
{
  protected $failureDetailType = FailureDetail::class;
  protected $failureDetailDataType = '';
  protected $inconclusiveDetailType = InconclusiveDetail::class;
  protected $inconclusiveDetailDataType = '';
  protected $skippedDetailType = SkippedDetail::class;
  protected $skippedDetailDataType = '';
  protected $successDetailType = SuccessDetail::class;
  protected $successDetailDataType = '';
  public $summary;

  /**
   * @param FailureDetail
   */
  public function setFailureDetail(FailureDetail $failureDetail)
  {
    $this->failureDetail = $failureDetail;
  }
  /**
   * @return FailureDetail
   */
  public function getFailureDetail()
  {
    return $this->failureDetail;
  }
  /**
   * @param InconclusiveDetail
   */
  public function setInconclusiveDetail(InconclusiveDetail $inconclusiveDetail)
  {
    $this->inconclusiveDetail = $inconclusiveDetail;
  }
  /**
   * @return InconclusiveDetail
   */
  public function getInconclusiveDetail()
  {
    return $this->inconclusiveDetail;
  }
  /**
   * @param SkippedDetail
   */
  public function setSkippedDetail(SkippedDetail $skippedDetail)
  {
    $this->skippedDetail = $skippedDetail;
  }
  /**
   * @return SkippedDetail
   */
  public function getSkippedDetail()
  {
    return $this->skippedDetail;
  }
  /**
   * @param SuccessDetail
   */
  public function setSuccessDetail(SuccessDetail $successDetail)
  {
    $this->successDetail = $successDetail;
  }
  /**
   * @return SuccessDetail
   */
  public function getSuccessDetail()
  {
    return $this->successDetail;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Outcome::class, 'Google_Service_ToolResults_Outcome');
