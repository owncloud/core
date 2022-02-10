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

namespace Google\Service\CloudSearch;

class PollItemsRequest extends \Google\Collection
{
  protected $collection_key = 'statusCodes';
  /**
   * @var string
   */
  public $connectorName;
  protected $debugOptionsType = DebugOptions::class;
  protected $debugOptionsDataType = '';
  /**
   * @var int
   */
  public $limit;
  /**
   * @var string
   */
  public $queue;
  /**
   * @var string[]
   */
  public $statusCodes;

  /**
   * @param string
   */
  public function setConnectorName($connectorName)
  {
    $this->connectorName = $connectorName;
  }
  /**
   * @return string
   */
  public function getConnectorName()
  {
    return $this->connectorName;
  }
  /**
   * @param DebugOptions
   */
  public function setDebugOptions(DebugOptions $debugOptions)
  {
    $this->debugOptions = $debugOptions;
  }
  /**
   * @return DebugOptions
   */
  public function getDebugOptions()
  {
    return $this->debugOptions;
  }
  /**
   * @param int
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return int
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param string
   */
  public function setQueue($queue)
  {
    $this->queue = $queue;
  }
  /**
   * @return string
   */
  public function getQueue()
  {
    return $this->queue;
  }
  /**
   * @param string[]
   */
  public function setStatusCodes($statusCodes)
  {
    $this->statusCodes = $statusCodes;
  }
  /**
   * @return string[]
   */
  public function getStatusCodes()
  {
    return $this->statusCodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PollItemsRequest::class, 'Google_Service_CloudSearch_PollItemsRequest');
