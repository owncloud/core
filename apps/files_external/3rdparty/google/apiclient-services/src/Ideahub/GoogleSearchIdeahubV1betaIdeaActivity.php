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

class GoogleSearchIdeahubV1betaIdeaActivity extends \Google\Collection
{
  protected $collection_key = 'topics';
  /**
   * @var string[]
   */
  public $ideas;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $topics;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string[]
   */
  public function setIdeas($ideas)
  {
    $this->ideas = $ideas;
  }
  /**
   * @return string[]
   */
  public function getIdeas()
  {
    return $this->ideas;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  /**
   * @return string[]
   */
  public function getTopics()
  {
    return $this->topics;
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
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSearchIdeahubV1betaIdeaActivity::class, 'Google_Service_Ideahub_GoogleSearchIdeahubV1betaIdeaActivity');
