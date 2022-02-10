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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1BatchProcessMetadataIndividualProcessStatus extends \Google\Model
{
  protected $humanReviewStatusType = GoogleCloudDocumentaiV1HumanReviewStatus::class;
  protected $humanReviewStatusDataType = '';
  /**
   * @var string
   */
  public $inputGcsSource;
  /**
   * @var string
   */
  public $outputGcsDestination;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  /**
   * @param GoogleCloudDocumentaiV1HumanReviewStatus
   */
  public function setHumanReviewStatus(GoogleCloudDocumentaiV1HumanReviewStatus $humanReviewStatus)
  {
    $this->humanReviewStatus = $humanReviewStatus;
  }
  /**
   * @return GoogleCloudDocumentaiV1HumanReviewStatus
   */
  public function getHumanReviewStatus()
  {
    return $this->humanReviewStatus;
  }
  /**
   * @param string
   */
  public function setInputGcsSource($inputGcsSource)
  {
    $this->inputGcsSource = $inputGcsSource;
  }
  /**
   * @return string
   */
  public function getInputGcsSource()
  {
    return $this->inputGcsSource;
  }
  /**
   * @param string
   */
  public function setOutputGcsDestination($outputGcsDestination)
  {
    $this->outputGcsDestination = $outputGcsDestination;
  }
  /**
   * @return string
   */
  public function getOutputGcsDestination()
  {
    return $this->outputGcsDestination;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1BatchProcessMetadataIndividualProcessStatus::class, 'Google_Service_Document_GoogleCloudDocumentaiV1BatchProcessMetadataIndividualProcessStatus');
