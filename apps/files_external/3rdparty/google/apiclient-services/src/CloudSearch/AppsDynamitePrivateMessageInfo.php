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

class AppsDynamitePrivateMessageInfo extends \Google\Collection
{
  protected $collection_key = 'gsuiteIntegrationMetadata';
  protected $annotationsType = AppsDynamiteAnnotation::class;
  protected $annotationsDataType = 'array';
  protected $attachmentsType = AppsDynamiteAttachment::class;
  protected $attachmentsDataType = 'array';
  protected $contextualAddOnMarkupType = GoogleChatV1ContextualAddOnMarkup::class;
  protected $contextualAddOnMarkupDataType = 'array';
  protected $gsuiteIntegrationMetadataType = AppsDynamiteGsuiteIntegrationMetadata::class;
  protected $gsuiteIntegrationMetadataDataType = 'array';
  /**
   * @var string
   */
  public $text;
  protected $userIdType = AppsDynamiteUserId::class;
  protected $userIdDataType = '';

  /**
   * @param AppsDynamiteAnnotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return AppsDynamiteAnnotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param AppsDynamiteAttachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return AppsDynamiteAttachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param GoogleChatV1ContextualAddOnMarkup[]
   */
  public function setContextualAddOnMarkup($contextualAddOnMarkup)
  {
    $this->contextualAddOnMarkup = $contextualAddOnMarkup;
  }
  /**
   * @return GoogleChatV1ContextualAddOnMarkup[]
   */
  public function getContextualAddOnMarkup()
  {
    return $this->contextualAddOnMarkup;
  }
  /**
   * @param AppsDynamiteGsuiteIntegrationMetadata[]
   */
  public function setGsuiteIntegrationMetadata($gsuiteIntegrationMetadata)
  {
    $this->gsuiteIntegrationMetadata = $gsuiteIntegrationMetadata;
  }
  /**
   * @return AppsDynamiteGsuiteIntegrationMetadata[]
   */
  public function getGsuiteIntegrationMetadata()
  {
    return $this->gsuiteIntegrationMetadata;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setUserId(AppsDynamiteUserId $userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamitePrivateMessageInfo::class, 'Google_Service_CloudSearch_AppsDynamitePrivateMessageInfo');
