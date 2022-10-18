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

class BabelMessageProps extends \Google\Model
{
  /**
   * @var string
   */
  public $clientGeneratedId;
  protected $contentExtensionType = ChatContentExtension::class;
  protected $contentExtensionDataType = '';
  protected $deliveryMediumType = DeliveryMedium::class;
  protected $deliveryMediumDataType = '';
  /**
   * @var string
   */
  public $eventId;
  protected $messageContentType = ChatConserverMessageContent::class;
  protected $messageContentDataType = '';
  /**
   * @var bool
   */
  public $wasUpdatedByBackfill;

  /**
   * @param string
   */
  public function setClientGeneratedId($clientGeneratedId)
  {
    $this->clientGeneratedId = $clientGeneratedId;
  }
  /**
   * @return string
   */
  public function getClientGeneratedId()
  {
    return $this->clientGeneratedId;
  }
  /**
   * @param ChatContentExtension
   */
  public function setContentExtension(ChatContentExtension $contentExtension)
  {
    $this->contentExtension = $contentExtension;
  }
  /**
   * @return ChatContentExtension
   */
  public function getContentExtension()
  {
    return $this->contentExtension;
  }
  /**
   * @param DeliveryMedium
   */
  public function setDeliveryMedium(DeliveryMedium $deliveryMedium)
  {
    $this->deliveryMedium = $deliveryMedium;
  }
  /**
   * @return DeliveryMedium
   */
  public function getDeliveryMedium()
  {
    return $this->deliveryMedium;
  }
  /**
   * @param string
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param ChatConserverMessageContent
   */
  public function setMessageContent(ChatConserverMessageContent $messageContent)
  {
    $this->messageContent = $messageContent;
  }
  /**
   * @return ChatConserverMessageContent
   */
  public function getMessageContent()
  {
    return $this->messageContent;
  }
  /**
   * @param bool
   */
  public function setWasUpdatedByBackfill($wasUpdatedByBackfill)
  {
    $this->wasUpdatedByBackfill = $wasUpdatedByBackfill;
  }
  /**
   * @return bool
   */
  public function getWasUpdatedByBackfill()
  {
    return $this->wasUpdatedByBackfill;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BabelMessageProps::class, 'Google_Service_CloudSearch_BabelMessageProps');
