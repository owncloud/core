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

class GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadata extends \Google\Collection
{
  protected $collection_key = 'individualBatchMoveStatuses';
  protected $commonMetadataType = GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata::class;
  protected $commonMetadataDataType = '';
  /**
   * @var string
   */
  public $destDatasetType;
  /**
   * @var string
   */
  public $destSplitType;
  protected $individualBatchMoveStatusesType = GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadataIndividualBatchMoveStatus::class;
  protected $individualBatchMoveStatusesDataType = 'array';

  /**
   * @param GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata
   */
  public function setCommonMetadata(GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata $commonMetadata)
  {
    $this->commonMetadata = $commonMetadata;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata
   */
  public function getCommonMetadata()
  {
    return $this->commonMetadata;
  }
  /**
   * @param string
   */
  public function setDestDatasetType($destDatasetType)
  {
    $this->destDatasetType = $destDatasetType;
  }
  /**
   * @return string
   */
  public function getDestDatasetType()
  {
    return $this->destDatasetType;
  }
  /**
   * @param string
   */
  public function setDestSplitType($destSplitType)
  {
    $this->destSplitType = $destSplitType;
  }
  /**
   * @return string
   */
  public function getDestSplitType()
  {
    return $this->destSplitType;
  }
  /**
   * @param GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadataIndividualBatchMoveStatus[]
   */
  public function setIndividualBatchMoveStatuses($individualBatchMoveStatuses)
  {
    $this->individualBatchMoveStatuses = $individualBatchMoveStatuses;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadataIndividualBatchMoveStatus[]
   */
  public function getIndividualBatchMoveStatuses()
  {
    return $this->individualBatchMoveStatuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadata::class, 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3BatchMoveDocumentsMetadata');
