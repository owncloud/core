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

namespace Google\Service\DataFusion;

class EventPublishConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $eventPublishEnabled;
  /**
   * @var string
   */
  public $project;
  /**
   * @var string
   */
  public $topic;

  /**
   * @param bool
   */
  public function setEventPublishEnabled($eventPublishEnabled)
  {
    $this->eventPublishEnabled = $eventPublishEnabled;
  }
  /**
   * @return bool
   */
  public function getEventPublishEnabled()
  {
    return $this->eventPublishEnabled;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param string
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return string
   */
  public function getTopic()
  {
    return $this->topic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventPublishConfig::class, 'Google_Service_DataFusion_EventPublishConfig');
