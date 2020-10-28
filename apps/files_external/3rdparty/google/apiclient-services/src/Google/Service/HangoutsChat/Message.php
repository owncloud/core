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

class Google_Service_HangoutsChat_Message extends Google_Collection
{
  protected $collection_key = 'cards';
  protected $actionResponseType = 'Google_Service_HangoutsChat_ActionResponse';
  protected $actionResponseDataType = '';
  protected $annotationsType = 'Google_Service_HangoutsChat_Annotation';
  protected $annotationsDataType = 'array';
  public $argumentText;
  protected $attachmentType = 'Google_Service_HangoutsChat_Attachment';
  protected $attachmentDataType = 'array';
  protected $cardsType = 'Google_Service_HangoutsChat_Card';
  protected $cardsDataType = 'array';
  public $createTime;
  public $fallbackText;
  public $name;
  public $previewText;
  protected $senderType = 'Google_Service_HangoutsChat_User';
  protected $senderDataType = '';
  protected $slashCommandType = 'Google_Service_HangoutsChat_SlashCommand';
  protected $slashCommandDataType = '';
  protected $spaceType = 'Google_Service_HangoutsChat_Space';
  protected $spaceDataType = '';
  public $text;
  protected $threadType = 'Google_Service_HangoutsChat_Thread';
  protected $threadDataType = '';

  /**
   * @param Google_Service_HangoutsChat_ActionResponse
   */
  public function setActionResponse(Google_Service_HangoutsChat_ActionResponse $actionResponse)
  {
    $this->actionResponse = $actionResponse;
  }
  /**
   * @return Google_Service_HangoutsChat_ActionResponse
   */
  public function getActionResponse()
  {
    return $this->actionResponse;
  }
  /**
   * @param Google_Service_HangoutsChat_Annotation
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Google_Service_HangoutsChat_Annotation
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  public function setArgumentText($argumentText)
  {
    $this->argumentText = $argumentText;
  }
  public function getArgumentText()
  {
    return $this->argumentText;
  }
  /**
   * @param Google_Service_HangoutsChat_Attachment
   */
  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return Google_Service_HangoutsChat_Attachment
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param Google_Service_HangoutsChat_Card
   */
  public function setCards($cards)
  {
    $this->cards = $cards;
  }
  /**
   * @return Google_Service_HangoutsChat_Card
   */
  public function getCards()
  {
    return $this->cards;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFallbackText($fallbackText)
  {
    $this->fallbackText = $fallbackText;
  }
  public function getFallbackText()
  {
    return $this->fallbackText;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPreviewText($previewText)
  {
    $this->previewText = $previewText;
  }
  public function getPreviewText()
  {
    return $this->previewText;
  }
  /**
   * @param Google_Service_HangoutsChat_User
   */
  public function setSender(Google_Service_HangoutsChat_User $sender)
  {
    $this->sender = $sender;
  }
  /**
   * @return Google_Service_HangoutsChat_User
   */
  public function getSender()
  {
    return $this->sender;
  }
  /**
   * @param Google_Service_HangoutsChat_SlashCommand
   */
  public function setSlashCommand(Google_Service_HangoutsChat_SlashCommand $slashCommand)
  {
    $this->slashCommand = $slashCommand;
  }
  /**
   * @return Google_Service_HangoutsChat_SlashCommand
   */
  public function getSlashCommand()
  {
    return $this->slashCommand;
  }
  /**
   * @param Google_Service_HangoutsChat_Space
   */
  public function setSpace(Google_Service_HangoutsChat_Space $space)
  {
    $this->space = $space;
  }
  /**
   * @return Google_Service_HangoutsChat_Space
   */
  public function getSpace()
  {
    return $this->space;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param Google_Service_HangoutsChat_Thread
   */
  public function setThread(Google_Service_HangoutsChat_Thread $thread)
  {
    $this->thread = $thread;
  }
  /**
   * @return Google_Service_HangoutsChat_Thread
   */
  public function getThread()
  {
    return $this->thread;
  }
}
