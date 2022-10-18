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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoBuganizerNotification extends \Google\Model
{
  /**
   * @var string
   */
  public $assigneeEmailAddress;
  /**
   * @var string
   */
  public $componentId;
  /**
   * @var string
   */
  public $templateId;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setAssigneeEmailAddress($assigneeEmailAddress)
  {
    $this->assigneeEmailAddress = $assigneeEmailAddress;
  }
  /**
   * @return string
   */
  public function getAssigneeEmailAddress()
  {
    return $this->assigneeEmailAddress;
  }
  /**
   * @param string
   */
  public function setComponentId($componentId)
  {
    $this->componentId = $componentId;
  }
  /**
   * @return string
   */
  public function getComponentId()
  {
    return $this->componentId;
  }
  /**
   * @param string
   */
  public function setTemplateId($templateId)
  {
    $this->templateId = $templateId;
  }
  /**
   * @return string
   */
  public function getTemplateId()
  {
    return $this->templateId;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoBuganizerNotification::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoBuganizerNotification');
