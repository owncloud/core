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

class AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutine extends \Google\Collection
{
  protected $collection_key = 'triggers';
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var string
   */
  public $googlePreconfigWorkflowId;
  /**
   * @var string
   */
  public $language;
  /**
   * @var array[]
   */
  public $payload;
  /**
   * @var string
   */
  public $securityLevel;
  /**
   * @var bool
   */
  public $shared;
  /**
   * @var array[]
   */
  public $storagePayload;
  /**
   * @var string
   */
  public $structureId;
  protected $triggersType = AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger::class;
  protected $triggersDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var array[]
   */
  public $uiPayload;

  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param string
   */
  public function setGooglePreconfigWorkflowId($googlePreconfigWorkflowId)
  {
    $this->googlePreconfigWorkflowId = $googlePreconfigWorkflowId;
  }
  /**
   * @return string
   */
  public function getGooglePreconfigWorkflowId()
  {
    return $this->googlePreconfigWorkflowId;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param array[]
   */
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return array[]
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param string
   */
  public function setSecurityLevel($securityLevel)
  {
    $this->securityLevel = $securityLevel;
  }
  /**
   * @return string
   */
  public function getSecurityLevel()
  {
    return $this->securityLevel;
  }
  /**
   * @param bool
   */
  public function setShared($shared)
  {
    $this->shared = $shared;
  }
  /**
   * @return bool
   */
  public function getShared()
  {
    return $this->shared;
  }
  /**
   * @param array[]
   */
  public function setStoragePayload($storagePayload)
  {
    $this->storagePayload = $storagePayload;
  }
  /**
   * @return array[]
   */
  public function getStoragePayload()
  {
    return $this->storagePayload;
  }
  /**
   * @param string
   */
  public function setStructureId($structureId)
  {
    $this->structureId = $structureId;
  }
  /**
   * @return string
   */
  public function getStructureId()
  {
    return $this->structureId;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger[]
   */
  public function setTriggers($triggers)
  {
    $this->triggers = $triggers;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutineTrigger[]
   */
  public function getTriggers()
  {
    return $this->triggers;
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
   * @param array[]
   */
  public function setUiPayload($uiPayload)
  {
    $this->uiPayload = $uiPayload;
  }
  /**
   * @return array[]
   */
  public function getUiPayload()
  {
    return $this->uiPayload;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutine::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoCommonStructureBasedRoutine');
