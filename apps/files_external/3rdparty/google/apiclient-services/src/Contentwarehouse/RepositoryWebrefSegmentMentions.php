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

class RepositoryWebrefSegmentMentions extends \Google\Collection
{
  protected $collection_key = 'mention';
  protected $mentionType = RepositoryWebrefMention::class;
  protected $mentionDataType = 'array';
  /**
   * @var string
   */
  public $segmentType;

  /**
   * @param RepositoryWebrefMention[]
   */
  public function setMention($mention)
  {
    $this->mention = $mention;
  }
  /**
   * @return RepositoryWebrefMention[]
   */
  public function getMention()
  {
    return $this->mention;
  }
  /**
   * @param string
   */
  public function setSegmentType($segmentType)
  {
    $this->segmentType = $segmentType;
  }
  /**
   * @return string
   */
  public function getSegmentType()
  {
    return $this->segmentType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefSegmentMentions::class, 'Google_Service_Contentwarehouse_RepositoryWebrefSegmentMentions');
