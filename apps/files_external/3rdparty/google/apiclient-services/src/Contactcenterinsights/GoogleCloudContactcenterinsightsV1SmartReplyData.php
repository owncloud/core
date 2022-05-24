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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1SmartReplyData extends \Google\Model
{
  public $confidenceScore;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $queryRecord;
  /**
   * @var string
   */
  public $reply;

  public function setConfidenceScore($confidenceScore)
  {
    $this->confidenceScore = $confidenceScore;
  }
  public function getConfidenceScore()
  {
    return $this->confidenceScore;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setQueryRecord($queryRecord)
  {
    $this->queryRecord = $queryRecord;
  }
  /**
   * @return string
   */
  public function getQueryRecord()
  {
    return $this->queryRecord;
  }
  /**
   * @param string
   */
  public function setReply($reply)
  {
    $this->reply = $reply;
  }
  /**
   * @return string
   */
  public function getReply()
  {
    return $this->reply;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1SmartReplyData::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1SmartReplyData');
