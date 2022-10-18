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

class GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadata extends \Google\Collection
{
  protected $collection_key = 'individualDocumentResyncStatuses';
  protected $commonMetadataType = GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata::class;
  protected $commonMetadataDataType = '';
  protected $datasetResyncStatusesType = GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataDatasetResyncStatus::class;
  protected $datasetResyncStatusesDataType = 'array';
  protected $individualDocumentResyncStatusesType = GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataIndividualDocumentResyncStatus::class;
  protected $individualDocumentResyncStatusesDataType = 'array';

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
   * @param GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataDatasetResyncStatus[]
   */
  public function setDatasetResyncStatuses($datasetResyncStatuses)
  {
    $this->datasetResyncStatuses = $datasetResyncStatuses;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataDatasetResyncStatus[]
   */
  public function getDatasetResyncStatuses()
  {
    return $this->datasetResyncStatuses;
  }
  /**
   * @param GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataIndividualDocumentResyncStatus[]
   */
  public function setIndividualDocumentResyncStatuses($individualDocumentResyncStatuses)
  {
    $this->individualDocumentResyncStatuses = $individualDocumentResyncStatuses;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadataIndividualDocumentResyncStatus[]
   */
  public function getIndividualDocumentResyncStatuses()
  {
    return $this->individualDocumentResyncStatuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadata::class, 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3ResyncDatasetMetadata');
