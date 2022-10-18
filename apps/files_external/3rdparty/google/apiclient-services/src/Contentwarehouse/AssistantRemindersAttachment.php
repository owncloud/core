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

class AssistantRemindersAttachment extends \Google\Collection
{
  protected $collection_key = 'surfaceType';
  /**
   * @var string
   */
  public $id;
  protected $linkType = AssistantRemindersAttachmentLink::class;
  protected $linkDataType = '';
  /**
   * @var string[]
   */
  public $surfaceType;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param AssistantRemindersAttachmentLink
   */
  public function setLink(AssistantRemindersAttachmentLink $link)
  {
    $this->link = $link;
  }
  /**
   * @return AssistantRemindersAttachmentLink
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string[]
   */
  public function setSurfaceType($surfaceType)
  {
    $this->surfaceType = $surfaceType;
  }
  /**
   * @return string[]
   */
  public function getSurfaceType()
  {
    return $this->surfaceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantRemindersAttachment::class, 'Google_Service_Contentwarehouse_AssistantRemindersAttachment');
