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

namespace Google\Service\YouTube;

class VideoTopicDetails extends \Google\Collection
{
  protected $collection_key = 'topicIds';
  /**
   * @var string[]
   */
  public $relevantTopicIds;
  /**
   * @var string[]
   */
  public $topicCategories;
  /**
   * @var string[]
   */
  public $topicIds;

  /**
   * @param string[]
   */
  public function setRelevantTopicIds($relevantTopicIds)
  {
    $this->relevantTopicIds = $relevantTopicIds;
  }
  /**
   * @return string[]
   */
  public function getRelevantTopicIds()
  {
    return $this->relevantTopicIds;
  }
  /**
   * @param string[]
   */
  public function setTopicCategories($topicCategories)
  {
    $this->topicCategories = $topicCategories;
  }
  /**
   * @return string[]
   */
  public function getTopicCategories()
  {
    return $this->topicCategories;
  }
  /**
   * @param string[]
   */
  public function setTopicIds($topicIds)
  {
    $this->topicIds = $topicIds;
  }
  /**
   * @return string[]
   */
  public function getTopicIds()
  {
    return $this->topicIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoTopicDetails::class, 'Google_Service_YouTube_VideoTopicDetails');
