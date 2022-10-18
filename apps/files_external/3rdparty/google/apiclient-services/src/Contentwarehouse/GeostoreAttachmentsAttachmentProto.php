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

class GeostoreAttachmentsAttachmentProto extends \Google\Model
{
  /**
   * @var string
   */
  public $attachmentId;
  /**
   * @var string
   */
  public $clientNameSpace;
  /**
   * @var string
   */
  public $comment;
  protected $messagesType = Proto2BridgeMessageSet::class;
  protected $messagesDataType = '';
  /**
   * @var string
   */
  public $typeId;

  /**
   * @param string
   */
  public function setAttachmentId($attachmentId)
  {
    $this->attachmentId = $attachmentId;
  }
  /**
   * @return string
   */
  public function getAttachmentId()
  {
    return $this->attachmentId;
  }
  /**
   * @param string
   */
  public function setClientNameSpace($clientNameSpace)
  {
    $this->clientNameSpace = $clientNameSpace;
  }
  /**
   * @return string
   */
  public function getClientNameSpace()
  {
    return $this->clientNameSpace;
  }
  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setMessages(Proto2BridgeMessageSet $messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param string
   */
  public function setTypeId($typeId)
  {
    $this->typeId = $typeId;
  }
  /**
   * @return string
   */
  public function getTypeId()
  {
    return $this->typeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreAttachmentsAttachmentProto::class, 'Google_Service_Contentwarehouse_GeostoreAttachmentsAttachmentProto');
