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

class DynamitePlaceholderMetadata extends \Google\Model
{
  protected $attachmentMetadataType = AttachmentMetadata::class;
  protected $attachmentMetadataDataType = '';
  protected $botMessageMetadataType = BotMessageMetadata::class;
  protected $botMessageMetadataDataType = '';
  protected $calendarEventMetadataType = CalendarEventMetadata::class;
  protected $calendarEventMetadataDataType = '';
  protected $deleteMetadataType = DeleteMetadata::class;
  protected $deleteMetadataDataType = '';
  protected $editMetadataType = EditMetadata::class;
  protected $editMetadataDataType = '';
  /**
   * @var string
   */
  public $spaceUrl;
  protected $tasksMetadataType = TasksMetadata::class;
  protected $tasksMetadataDataType = '';
  protected $videoCallMetadataType = VideoCallMetadata::class;
  protected $videoCallMetadataDataType = '';

  /**
   * @param AttachmentMetadata
   */
  public function setAttachmentMetadata(AttachmentMetadata $attachmentMetadata)
  {
    $this->attachmentMetadata = $attachmentMetadata;
  }
  /**
   * @return AttachmentMetadata
   */
  public function getAttachmentMetadata()
  {
    return $this->attachmentMetadata;
  }
  /**
   * @param BotMessageMetadata
   */
  public function setBotMessageMetadata(BotMessageMetadata $botMessageMetadata)
  {
    $this->botMessageMetadata = $botMessageMetadata;
  }
  /**
   * @return BotMessageMetadata
   */
  public function getBotMessageMetadata()
  {
    return $this->botMessageMetadata;
  }
  /**
   * @param CalendarEventMetadata
   */
  public function setCalendarEventMetadata(CalendarEventMetadata $calendarEventMetadata)
  {
    $this->calendarEventMetadata = $calendarEventMetadata;
  }
  /**
   * @return CalendarEventMetadata
   */
  public function getCalendarEventMetadata()
  {
    return $this->calendarEventMetadata;
  }
  /**
   * @param DeleteMetadata
   */
  public function setDeleteMetadata(DeleteMetadata $deleteMetadata)
  {
    $this->deleteMetadata = $deleteMetadata;
  }
  /**
   * @return DeleteMetadata
   */
  public function getDeleteMetadata()
  {
    return $this->deleteMetadata;
  }
  /**
   * @param EditMetadata
   */
  public function setEditMetadata(EditMetadata $editMetadata)
  {
    $this->editMetadata = $editMetadata;
  }
  /**
   * @return EditMetadata
   */
  public function getEditMetadata()
  {
    return $this->editMetadata;
  }
  /**
   * @param string
   */
  public function setSpaceUrl($spaceUrl)
  {
    $this->spaceUrl = $spaceUrl;
  }
  /**
   * @return string
   */
  public function getSpaceUrl()
  {
    return $this->spaceUrl;
  }
  /**
   * @param TasksMetadata
   */
  public function setTasksMetadata(TasksMetadata $tasksMetadata)
  {
    $this->tasksMetadata = $tasksMetadata;
  }
  /**
   * @return TasksMetadata
   */
  public function getTasksMetadata()
  {
    return $this->tasksMetadata;
  }
  /**
   * @param VideoCallMetadata
   */
  public function setVideoCallMetadata(VideoCallMetadata $videoCallMetadata)
  {
    $this->videoCallMetadata = $videoCallMetadata;
  }
  /**
   * @return VideoCallMetadata
   */
  public function getVideoCallMetadata()
  {
    return $this->videoCallMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamitePlaceholderMetadata::class, 'Google_Service_CloudSearch_DynamitePlaceholderMetadata');
