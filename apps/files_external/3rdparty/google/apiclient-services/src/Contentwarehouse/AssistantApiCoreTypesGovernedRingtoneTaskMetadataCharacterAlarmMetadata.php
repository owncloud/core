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

class AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata extends \Google\Collection
{
  protected $collection_key = 'iconUrls';
  /**
   * @var string[]
   */
  public $agentIds;
  /**
   * @var string[]
   */
  public $characterTags;
  /**
   * @var string[]
   */
  public $iconUrls;

  /**
   * @param string[]
   */
  public function setAgentIds($agentIds)
  {
    $this->agentIds = $agentIds;
  }
  /**
   * @return string[]
   */
  public function getAgentIds()
  {
    return $this->agentIds;
  }
  /**
   * @param string[]
   */
  public function setCharacterTags($characterTags)
  {
    $this->characterTags = $characterTags;
  }
  /**
   * @return string[]
   */
  public function getCharacterTags()
  {
    return $this->characterTags;
  }
  /**
   * @param string[]
   */
  public function setIconUrls($iconUrls)
  {
    $this->iconUrls = $iconUrls;
  }
  /**
   * @return string[]
   */
  public function getIconUrls()
  {
    return $this->iconUrls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata');
