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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1ListPipelinesResponse extends \Google\Collection
{
  protected $collection_key = 'pipelines';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $pipelinesType = GoogleCloudDatapipelinesV1Pipeline::class;
  protected $pipelinesDataType = 'array';

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
   * @param GoogleCloudDatapipelinesV1Pipeline[]
   */
  public function setPipelines($pipelines)
  {
    $this->pipelines = $pipelines;
  }
  /**
   * @return GoogleCloudDatapipelinesV1Pipeline[]
   */
  public function getPipelines()
  {
    return $this->pipelines;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1ListPipelinesResponse::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1ListPipelinesResponse');
