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

class Message extends \Google\Collection
{
  protected $collection_key = 'labelIds';
  /**
   * @var string
   */
  public $historyId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $internalDate;
  /**
   * @var string[]
   */
  public $labelIds;
  protected $payloadType = MessagePart::class;
  protected $payloadDataType = '';
  /**
   * @var string
   */
  public $raw;
  /**
   * @var int
   */
  public $sizeEstimate;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var string
   */
  public $threadId;

  /**
   * @param string
   */
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  /**
   * @return string
   */
  public function getHistoryId()
  {
    return $this->historyId;
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
  public function setInternalDate($internalDate)
  {
    $this->internalDate = $internalDate;
  }
  /**
   * @return string
   */
  public function getInternalDate()
  {
    return $this->internalDate;
  }
  /**
   * @param string[]
   */
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  /**
   * @return string[]
   */
  public function getLabelIds()
  {
    return $this->labelIds;
  }
  /**
   * @param MessagePart
   */
  public function setPayload(MessagePart $payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return MessagePart
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param string
   */
  public function setRaw($raw)
  {
    $this->raw = $raw;
  }
  /**
   * @return string
   */
  public function getRaw()
  {
    return $this->raw;
  }
  /**
   * @param int
   */
  public function setSizeEstimate($sizeEstimate)
  {
    $this->sizeEstimate = $sizeEstimate;
  }
  /**
   * @return int
   */
  public function getSizeEstimate()
  {
    return $this->sizeEstimate;
  }
  /**
   * @param string
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param string
   */
  public function setThreadId($threadId)
  {
    $this->threadId = $threadId;
  }
  /**
   * @return string
   */
  public function getThreadId()
  {
    return $this->threadId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Message::class, 'Google_Service_Gmail_Message');
