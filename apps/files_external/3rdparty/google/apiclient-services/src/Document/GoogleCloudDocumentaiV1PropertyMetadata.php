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

class GoogleCloudDocumentaiV1PropertyMetadata extends \Google\Model
{
  protected $humanReviewLabelingMetadataType = GoogleCloudDocumentaiV1HumanReviewLabelingMetadata::class;
  protected $humanReviewLabelingMetadataDataType = '';
  protected $humanReviewMetadataType = GoogleCloudDocumentaiV1HumanReviewValidationMetadata::class;
  protected $humanReviewMetadataDataType = '';
  /**
   * @var bool
   */
  public $inactive;

  /**
   * @param GoogleCloudDocumentaiV1HumanReviewLabelingMetadata
   */
  public function setHumanReviewLabelingMetadata(GoogleCloudDocumentaiV1HumanReviewLabelingMetadata $humanReviewLabelingMetadata)
  {
    $this->humanReviewLabelingMetadata = $humanReviewLabelingMetadata;
  }
  /**
   * @return GoogleCloudDocumentaiV1HumanReviewLabelingMetadata
   */
  public function getHumanReviewLabelingMetadata()
  {
    return $this->humanReviewLabelingMetadata;
  }
  /**
   * @param GoogleCloudDocumentaiV1HumanReviewValidationMetadata
   */
  public function setHumanReviewMetadata(GoogleCloudDocumentaiV1HumanReviewValidationMetadata $humanReviewMetadata)
  {
    $this->humanReviewMetadata = $humanReviewMetadata;
  }
  /**
   * @return GoogleCloudDocumentaiV1HumanReviewValidationMetadata
   */
  public function getHumanReviewMetadata()
  {
    return $this->humanReviewMetadata;
  }
  /**
   * @param bool
   */
  public function setInactive($inactive)
  {
    $this->inactive = $inactive;
  }
  /**
   * @return bool
   */
  public function getInactive()
  {
    return $this->inactive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1PropertyMetadata::class, 'Google_Service_Document_GoogleCloudDocumentaiV1PropertyMetadata');
