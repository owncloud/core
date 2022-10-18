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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1SearchDocumentsResponse extends \Google\Collection
{
  protected $collection_key = 'matchingDocuments';
  protected $histogramQueryResultsType = GoogleCloudContentwarehouseV1HistogramQueryResult::class;
  protected $histogramQueryResultsDataType = 'array';
  protected $matchingDocumentsType = GoogleCloudContentwarehouseV1SearchDocumentsResponseMatchingDocument::class;
  protected $matchingDocumentsDataType = 'array';
  protected $metadataType = GoogleCloudContentwarehouseV1ResponseMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var int
   */
  public $totalSize;

  /**
   * @param GoogleCloudContentwarehouseV1HistogramQueryResult[]
   */
  public function setHistogramQueryResults($histogramQueryResults)
  {
    $this->histogramQueryResults = $histogramQueryResults;
  }
  /**
   * @return GoogleCloudContentwarehouseV1HistogramQueryResult[]
   */
  public function getHistogramQueryResults()
  {
    return $this->histogramQueryResults;
  }
  /**
   * @param GoogleCloudContentwarehouseV1SearchDocumentsResponseMatchingDocument[]
   */
  public function setMatchingDocuments($matchingDocuments)
  {
    $this->matchingDocuments = $matchingDocuments;
  }
  /**
   * @return GoogleCloudContentwarehouseV1SearchDocumentsResponseMatchingDocument[]
   */
  public function getMatchingDocuments()
  {
    return $this->matchingDocuments;
  }
  /**
   * @param GoogleCloudContentwarehouseV1ResponseMetadata
   */
  public function setMetadata(GoogleCloudContentwarehouseV1ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleCloudContentwarehouseV1ResponseMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param int
   */
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  /**
   * @return int
   */
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1SearchDocumentsResponse::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1SearchDocumentsResponse');
