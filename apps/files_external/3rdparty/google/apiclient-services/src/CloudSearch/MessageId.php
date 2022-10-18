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

class MessageId extends \Google\Model
{
  /**
   * @var string
   */
  public $messageId;
  protected $parentIdType = MessageParentId::class;
  protected $parentIdDataType = '';

  /**
   * @param string
   */
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  /**
   * @return string
   */
  public function getMessageId()
  {
    return $this->messageId;
  }
  /**
   * @param MessageParentId
   */
  public function setParentId(MessageParentId $parentId)
  {
    $this->parentId = $parentId;
  }
  /**
   * @return MessageParentId
   */
  public function getParentId()
  {
    return $this->parentId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MessageId::class, 'Google_Service_CloudSearch_MessageId');
