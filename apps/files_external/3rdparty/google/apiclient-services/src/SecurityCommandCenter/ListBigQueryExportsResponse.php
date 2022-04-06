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

namespace Google\Service\SecurityCommandCenter;

class ListBigQueryExportsResponse extends \Google\Collection
{
  protected $collection_key = 'bigQueryExports';
  protected $bigQueryExportsType = GoogleCloudSecuritycenterV1BigQueryExport::class;
  protected $bigQueryExportsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param GoogleCloudSecuritycenterV1BigQueryExport[]
   */
  public function setBigQueryExports($bigQueryExports)
  {
    $this->bigQueryExports = $bigQueryExports;
  }
  /**
   * @return GoogleCloudSecuritycenterV1BigQueryExport[]
   */
  public function getBigQueryExports()
  {
    return $this->bigQueryExports;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListBigQueryExportsResponse::class, 'Google_Service_SecurityCommandCenter_ListBigQueryExportsResponse');
