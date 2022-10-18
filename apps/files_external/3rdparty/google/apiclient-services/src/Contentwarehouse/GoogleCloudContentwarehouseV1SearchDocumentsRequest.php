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

class GoogleCloudContentwarehouseV1SearchDocumentsRequest extends \Google\Collection
{
  protected $collection_key = 'histogramQueries';
  protected $documentQueryType = GoogleCloudContentwarehouseV1DocumentQuery::class;
  protected $documentQueryDataType = '';
  protected $histogramQueriesType = GoogleCloudContentwarehouseV1HistogramQuery::class;
  protected $histogramQueriesDataType = 'array';
  /**
   * @var int
   */
  public $offset;
  /**
   * @var string
   */
  public $orderBy;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  /**
   * @var int
   */
  public $qaSizeLimit;
  protected $requestMetadataType = GoogleCloudContentwarehouseV1RequestMetadata::class;
  protected $requestMetadataDataType = '';
  /**
   * @var bool
   */
  public $requireTotalSize;

  /**
   * @param GoogleCloudContentwarehouseV1DocumentQuery
   */
  public function setDocumentQuery(GoogleCloudContentwarehouseV1DocumentQuery $documentQuery)
  {
    $this->documentQuery = $documentQuery;
  }
  /**
   * @return GoogleCloudContentwarehouseV1DocumentQuery
   */
  public function getDocumentQuery()
  {
    return $this->documentQuery;
  }
  /**
   * @param GoogleCloudContentwarehouseV1HistogramQuery[]
   */
  public function setHistogramQueries($histogramQueries)
  {
    $this->histogramQueries = $histogramQueries;
  }
  /**
   * @return GoogleCloudContentwarehouseV1HistogramQuery[]
   */
  public function getHistogramQueries()
  {
    return $this->histogramQueries;
  }
  /**
   * @param int
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return int
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return string
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param int
   */
  public function setQaSizeLimit($qaSizeLimit)
  {
    $this->qaSizeLimit = $qaSizeLimit;
  }
  /**
   * @return int
   */
  public function getQaSizeLimit()
  {
    return $this->qaSizeLimit;
  }
  /**
   * @param GoogleCloudContentwarehouseV1RequestMetadata
   */
  public function setRequestMetadata(GoogleCloudContentwarehouseV1RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return GoogleCloudContentwarehouseV1RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
  /**
   * @param bool
   */
  public function setRequireTotalSize($requireTotalSize)
  {
    $this->requireTotalSize = $requireTotalSize;
  }
  /**
   * @return bool
   */
  public function getRequireTotalSize()
  {
    return $this->requireTotalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1SearchDocumentsRequest::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1SearchDocumentsRequest');
