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

class ChatConserverDynamitePlaceholderMetadata extends \Google\Model
{
  protected $attachmentMetadataType = ChatConserverDynamitePlaceholderMetadataAttachmentMetadata::class;
  protected $attachmentMetadataDataType = '';
  protected $botMessageMetadataType = ChatConserverDynamitePlaceholderMetadataBotMessageMetadata::class;
  protected $botMessageMetadataDataType = '';
  protected $calendarEventMetadataType = ChatConserverDynamitePlaceholderMetadataCalendarEventMetadata::class;
  protected $calendarEventMetadataDataType = '';
  protected $deleteMetadataType = ChatConserverDynamitePlaceholderMetadataDeleteMetadata::class;
  protected $deleteMetadataDataType = '';
  protected $editMetadataType = ChatConserverDynamitePlaceholderMetadataEditMetadata::class;
  protected $editMetadataDataType = '';
  /**
   * @var string
   */
  public $spaceUrl;
  protected $tasksMetadataType = ChatConserverDynamitePlaceholderMetadataTasksMetadata::class;
  protected $tasksMetadataDataType = '';
  protected $videoCallMetadataType = ChatConserverDynamitePlaceholderMetadataVideoCallMetadata::class;
  protected $videoCallMetadataDataType = '';

  /**
   * @param ChatConserverDynamitePlaceholderMetadataAttachmentMetadata
   */
  public function setAttachmentMetadata(ChatConserverDynamitePlaceholderMetadataAttachmentMetadata $attachmentMetadata)
  {
    $this->attachmentMetadata = $attachmentMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataAttachmentMetadata
   */
  public function getAttachmentMetadata()
  {
    return $this->attachmentMetadata;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadataBotMessageMetadata
   */
  public function setBotMessageMetadata(ChatConserverDynamitePlaceholderMetadataBotMessageMetadata $botMessageMetadata)
  {
    $this->botMessageMetadata = $botMessageMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataBotMessageMetadata
   */
  public function getBotMessageMetadata()
  {
    return $this->botMessageMetadata;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadataCalendarEventMetadata
   */
  public function setCalendarEventMetadata(ChatConserverDynamitePlaceholderMetadataCalendarEventMetadata $calendarEventMetadata)
  {
    $this->calendarEventMetadata = $calendarEventMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataCalendarEventMetadata
   */
  public function getCalendarEventMetadata()
  {
    return $this->calendarEventMetadata;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadataDeleteMetadata
   */
  public function setDeleteMetadata(ChatConserverDynamitePlaceholderMetadataDeleteMetadata $deleteMetadata)
  {
    $this->deleteMetadata = $deleteMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataDeleteMetadata
   */
  public function getDeleteMetadata()
  {
    return $this->deleteMetadata;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadataEditMetadata
   */
  public function setEditMetadata(ChatConserverDynamitePlaceholderMetadataEditMetadata $editMetadata)
  {
    $this->editMetadata = $editMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataEditMetadata
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
   * @param ChatConserverDynamitePlaceholderMetadataTasksMetadata
   */
  public function setTasksMetadata(ChatConserverDynamitePlaceholderMetadataTasksMetadata $tasksMetadata)
  {
    $this->tasksMetadata = $tasksMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataTasksMetadata
   */
  public function getTasksMetadata()
  {
    return $this->tasksMetadata;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadataVideoCallMetadata
   */
  public function setVideoCallMetadata(ChatConserverDynamitePlaceholderMetadataVideoCallMetadata $videoCallMetadata)
  {
    $this->videoCallMetadata = $videoCallMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadataVideoCallMetadata
   */
  public function getVideoCallMetadata()
  {
    return $this->videoCallMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChatConserverDynamitePlaceholderMetadata::class, 'Google_Service_CloudSearch_ChatConserverDynamitePlaceholderMetadata');
