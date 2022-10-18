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

class RepositoryWebrefTaskDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $experimentId;
  /**
   * @var string
   */
  public $lastSubmitTimestamp;
  /**
   * @var string
   */
  public $topicDescription;
  /**
   * @var string
   */
  public $topicName;
  /**
   * @var string
   */
  public $topicUrl;

  /**
   * @param string
   */
  public function setExperimentId($experimentId)
  {
    $this->experimentId = $experimentId;
  }
  /**
   * @return string
   */
  public function getExperimentId()
  {
    return $this->experimentId;
  }
  /**
   * @param string
   */
  public function setLastSubmitTimestamp($lastSubmitTimestamp)
  {
    $this->lastSubmitTimestamp = $lastSubmitTimestamp;
  }
  /**
   * @return string
   */
  public function getLastSubmitTimestamp()
  {
    return $this->lastSubmitTimestamp;
  }
  /**
   * @param string
   */
  public function setTopicDescription($topicDescription)
  {
    $this->topicDescription = $topicDescription;
  }
  /**
   * @return string
   */
  public function getTopicDescription()
  {
    return $this->topicDescription;
  }
  /**
   * @param string
   */
  public function setTopicName($topicName)
  {
    $this->topicName = $topicName;
  }
  /**
   * @return string
   */
  public function getTopicName()
  {
    return $this->topicName;
  }
  /**
   * @param string
   */
  public function setTopicUrl($topicUrl)
  {
    $this->topicUrl = $topicUrl;
  }
  /**
   * @return string
   */
  public function getTopicUrl()
  {
    return $this->topicUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefTaskDetails::class, 'Google_Service_Contentwarehouse_RepositoryWebrefTaskDetails');
