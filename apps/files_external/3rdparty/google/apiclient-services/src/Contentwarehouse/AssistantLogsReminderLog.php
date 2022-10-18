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

class AssistantLogsReminderLog extends \Google\Model
{
  /**
   * @var string
   */
  public $createdSecondsAgo;
  /**
   * @var int
   */
  public $retrievedRankingClass;

  /**
   * @param string
   */
  public function setCreatedSecondsAgo($createdSecondsAgo)
  {
    $this->createdSecondsAgo = $createdSecondsAgo;
  }
  /**
   * @return string
   */
  public function getCreatedSecondsAgo()
  {
    return $this->createdSecondsAgo;
  }
  /**
   * @param int
   */
  public function setRetrievedRankingClass($retrievedRankingClass)
  {
    $this->retrievedRankingClass = $retrievedRankingClass;
  }
  /**
   * @return int
   */
  public function getRetrievedRankingClass()
  {
    return $this->retrievedRankingClass;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsReminderLog::class, 'Google_Service_Contentwarehouse_AssistantLogsReminderLog');
