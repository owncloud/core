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

namespace Google\Service\Gmail;

class Label extends \Google\Model
{
  protected $colorType = LabelColor::class;
  protected $colorDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $labelListVisibility;
  /**
   * @var string
   */
  public $messageListVisibility;
  /**
   * @var int
   */
  public $messagesTotal;
  /**
   * @var int
   */
  public $messagesUnread;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $threadsTotal;
  /**
   * @var int
   */
  public $threadsUnread;
  /**
   * @var string
   */
  public $type;

  /**
   * @param LabelColor
   */
  public function setColor(LabelColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return LabelColor
   */
  public function getColor()
  {
    return $this->color;
  }
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
   * @param string
   */
  public function setLabelListVisibility($labelListVisibility)
  {
    $this->labelListVisibility = $labelListVisibility;
  }
  /**
   * @return string
   */
  public function getLabelListVisibility()
  {
    return $this->labelListVisibility;
  }
  /**
   * @param string
   */
  public function setMessageListVisibility($messageListVisibility)
  {
    $this->messageListVisibility = $messageListVisibility;
  }
  /**
   * @return string
   */
  public function getMessageListVisibility()
  {
    return $this->messageListVisibility;
  }
  /**
   * @param int
   */
  public function setMessagesTotal($messagesTotal)
  {
    $this->messagesTotal = $messagesTotal;
  }
  /**
   * @return int
   */
  public function getMessagesTotal()
  {
    return $this->messagesTotal;
  }
  /**
   * @param int
   */
  public function setMessagesUnread($messagesUnread)
  {
    $this->messagesUnread = $messagesUnread;
  }
  /**
   * @return int
   */
  public function getMessagesUnread()
  {
    return $this->messagesUnread;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setThreadsTotal($threadsTotal)
  {
    $this->threadsTotal = $threadsTotal;
  }
  /**
   * @return int
   */
  public function getThreadsTotal()
  {
    return $this->threadsTotal;
  }
  /**
   * @param int
   */
  public function setThreadsUnread($threadsUnread)
  {
    $this->threadsUnread = $threadsUnread;
  }
  /**
   * @return int
   */
  public function getThreadsUnread()
  {
    return $this->threadsUnread;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Label::class, 'Google_Service_Gmail_Label');
