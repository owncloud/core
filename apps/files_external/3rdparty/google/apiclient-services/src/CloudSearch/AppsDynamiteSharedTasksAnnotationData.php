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

class AppsDynamiteSharedTasksAnnotationData extends \Google\Model
{
  protected $assigneeChangeType = AppsDynamiteSharedTasksAnnotationDataAssigneeChange::class;
  protected $assigneeChangeDataType = '';
  protected $completionChangeType = AppsDynamiteSharedTasksAnnotationDataCompletionChange::class;
  protected $completionChangeDataType = '';
  protected $creationType = AppsDynamiteSharedTasksAnnotationDataCreation::class;
  protected $creationDataType = '';
  protected $deletionChangeType = AppsDynamiteSharedTasksAnnotationDataDeletionChange::class;
  protected $deletionChangeDataType = '';
  /**
   * @var string
   */
  public $taskId;
  protected $taskPropertiesType = AppsDynamiteSharedTasksAnnotationDataTaskProperties::class;
  protected $taskPropertiesDataType = '';
  protected $userDefinedMessageType = AppsDynamiteSharedTasksAnnotationDataUserDefinedMessage::class;
  protected $userDefinedMessageDataType = '';

  /**
   * @param AppsDynamiteSharedTasksAnnotationDataAssigneeChange
   */
  public function setAssigneeChange(AppsDynamiteSharedTasksAnnotationDataAssigneeChange $assigneeChange)
  {
    $this->assigneeChange = $assigneeChange;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataAssigneeChange
   */
  public function getAssigneeChange()
  {
    return $this->assigneeChange;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationDataCompletionChange
   */
  public function setCompletionChange(AppsDynamiteSharedTasksAnnotationDataCompletionChange $completionChange)
  {
    $this->completionChange = $completionChange;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataCompletionChange
   */
  public function getCompletionChange()
  {
    return $this->completionChange;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationDataCreation
   */
  public function setCreation(AppsDynamiteSharedTasksAnnotationDataCreation $creation)
  {
    $this->creation = $creation;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataCreation
   */
  public function getCreation()
  {
    return $this->creation;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationDataDeletionChange
   */
  public function setDeletionChange(AppsDynamiteSharedTasksAnnotationDataDeletionChange $deletionChange)
  {
    $this->deletionChange = $deletionChange;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataDeletionChange
   */
  public function getDeletionChange()
  {
    return $this->deletionChange;
  }
  /**
   * @param string
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return string
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationDataTaskProperties
   */
  public function setTaskProperties(AppsDynamiteSharedTasksAnnotationDataTaskProperties $taskProperties)
  {
    $this->taskProperties = $taskProperties;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataTaskProperties
   */
  public function getTaskProperties()
  {
    return $this->taskProperties;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationDataUserDefinedMessage
   */
  public function setUserDefinedMessage(AppsDynamiteSharedTasksAnnotationDataUserDefinedMessage $userDefinedMessage)
  {
    $this->userDefinedMessage = $userDefinedMessage;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationDataUserDefinedMessage
   */
  public function getUserDefinedMessage()
  {
    return $this->userDefinedMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedTasksAnnotationData::class, 'Google_Service_CloudSearch_AppsDynamiteSharedTasksAnnotationData');
