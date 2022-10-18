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

class AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger extends \Google\Model
{
  protected $eventTriggerType = AssistantVerticalsHomeautomationProtoCommonEventTrigger::class;
  protected $eventTriggerDataType = '';
  protected $voiceTriggerType = AssistantVerticalsHomeautomationProtoCommonVoiceTrigger::class;
  protected $voiceTriggerDataType = '';

  /**
   * @param AssistantVerticalsHomeautomationProtoCommonEventTrigger
   */
  public function setEventTrigger(AssistantVerticalsHomeautomationProtoCommonEventTrigger $eventTrigger)
  {
    $this->eventTrigger = $eventTrigger;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoCommonEventTrigger
   */
  public function getEventTrigger()
  {
    return $this->eventTrigger;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoCommonVoiceTrigger
   */
  public function setVoiceTrigger(AssistantVerticalsHomeautomationProtoCommonVoiceTrigger $voiceTrigger)
  {
    $this->voiceTrigger = $voiceTrigger;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoCommonVoiceTrigger
   */
  public function getVoiceTrigger()
  {
    return $this->voiceTrigger;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger');
