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

namespace Google\Service\Ideahub;

class GoogleSearchIdeahubV1alphaIdea extends \Google\Collection
{
  protected $collection_key = 'topics';
  public $name;
  public $text;
  protected $topicsType = GoogleSearchIdeahubV1alphaTopic::class;
  protected $topicsDataType = 'array';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param GoogleSearchIdeahubV1alphaTopic[]
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  /**
   * @return GoogleSearchIdeahubV1alphaTopic[]
   */
  public function getTopics()
  {
    return $this->topics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSearchIdeahubV1alphaIdea::class, 'Google_Service_Ideahub_GoogleSearchIdeahubV1alphaIdea');
