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

class TopicId extends \Google\Model
{
  protected $groupIdType = GroupId::class;
  protected $groupIdDataType = '';
  /**
   * @var string
   */
  public $topicId;

  /**
   * @param GroupId
   */
  public function setGroupId(GroupId $groupId)
  {
    $this->groupId = $groupId;
  }
  /**
   * @return GroupId
   */
  public function getGroupId()
  {
    return $this->groupId;
  }
  /**
   * @param string
   */
  public function setTopicId($topicId)
  {
    $this->topicId = $topicId;
  }
  /**
   * @return string
   */
  public function getTopicId()
  {
    return $this->topicId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TopicId::class, 'Google_Service_CloudSearch_TopicId');
