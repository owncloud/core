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

namespace Google\Service\Firestore;

class WriteResponse extends \Google\Collection
{
  protected $collection_key = 'writeResults';
  /**
   * @var string
   */
  public $commitTime;
  /**
   * @var string
   */
  public $streamId;
  /**
   * @var string
   */
  public $streamToken;
  protected $writeResultsType = WriteResult::class;
  protected $writeResultsDataType = 'array';

  /**
   * @param string
   */
  public function setCommitTime($commitTime)
  {
    $this->commitTime = $commitTime;
  }
  /**
   * @return string
   */
  public function getCommitTime()
  {
    return $this->commitTime;
  }
  /**
   * @param string
   */
  public function setStreamId($streamId)
  {
    $this->streamId = $streamId;
  }
  /**
   * @return string
   */
  public function getStreamId()
  {
    return $this->streamId;
  }
  /**
   * @param string
   */
  public function setStreamToken($streamToken)
  {
    $this->streamToken = $streamToken;
  }
  /**
   * @return string
   */
  public function getStreamToken()
  {
    return $this->streamToken;
  }
  /**
   * @param WriteResult[]
   */
  public function setWriteResults($writeResults)
  {
    $this->writeResults = $writeResults;
  }
  /**
   * @return WriteResult[]
   */
  public function getWriteResults()
  {
    return $this->writeResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WriteResponse::class, 'Google_Service_Firestore_WriteResponse');
