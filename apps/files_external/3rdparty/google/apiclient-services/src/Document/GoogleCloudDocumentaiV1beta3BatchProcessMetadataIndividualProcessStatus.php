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

class GoogleCloudDocumentaiV1beta3BatchProcessMetadataIndividualProcessStatus extends \Google\Model
{
  public $humanReviewOperation;
  protected $humanReviewStatusType = GoogleCloudDocumentaiV1beta3HumanReviewStatus::class;
  protected $humanReviewStatusDataType = '';
  public $inputGcsSource;
  public $outputGcsDestination;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  public function setHumanReviewOperation($humanReviewOperation)
  {
    $this->humanReviewOperation = $humanReviewOperation;
  }
  public function getHumanReviewOperation()
  {
    return $this->humanReviewOperation;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta3HumanReviewStatus
   */
  public function setHumanReviewStatus(GoogleCloudDocumentaiV1beta3HumanReviewStatus $humanReviewStatus)
  {
    $this->humanReviewStatus = $humanReviewStatus;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta3HumanReviewStatus
   */
  public function getHumanReviewStatus()
  {
    return $this->humanReviewStatus;
  }
  public function setInputGcsSource($inputGcsSource)
  {
    $this->inputGcsSource = $inputGcsSource;
  }
  public function getInputGcsSource()
  {
    return $this->inputGcsSource;
  }
  public function setOutputGcsDestination($outputGcsDestination)
  {
    $this->outputGcsDestination = $outputGcsDestination;
  }
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
class_alias(GoogleCloudDocumentaiV1beta3BatchProcessMetadataIndividualProcessStatus::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessMetadataIndividualProcessStatus');
