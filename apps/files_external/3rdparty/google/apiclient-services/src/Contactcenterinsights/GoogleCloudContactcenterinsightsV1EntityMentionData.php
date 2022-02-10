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

class GoogleCloudContactcenterinsightsV1EntityMentionData extends \Google\Model
{
  /**
   * @var string
   */
  public $entityUniqueId;
  protected $sentimentType = GoogleCloudContactcenterinsightsV1SentimentData::class;
  protected $sentimentDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setEntityUniqueId($entityUniqueId)
  {
    $this->entityUniqueId = $entityUniqueId;
  }
  /**
   * @return string
   */
  public function getEntityUniqueId()
  {
    return $this->entityUniqueId;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1SentimentData
   */
  public function setSentiment(GoogleCloudContactcenterinsightsV1SentimentData $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SentimentData
   */
  public function getSentiment()
  {
    return $this->sentiment;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1EntityMentionData::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1EntityMentionData');
