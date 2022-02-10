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

namespace Google\Service\HangoutsChat;

class Message extends \Google\Collection
{
  protected $collection_key = 'cards';
  protected $actionResponseType = ActionResponse::class;
  protected $actionResponseDataType = '';
  protected $annotationsType = Annotation::class;
  protected $annotationsDataType = 'array';
  /**
   * @var string
   */
  public $argumentText;
  protected $attachmentType = Attachment::class;
  protected $attachmentDataType = 'array';
  protected $cardsType = Card::class;
  protected $cardsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $fallbackText;
  /**
   * @var string
   */
  public $lastUpdateTime;
  protected $matchedUrlType = MatchedUrl::class;
  protected $matchedUrlDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $previewText;
  protected $senderType = User::class;
  protected $senderDataType = '';
  protected $slashCommandType = SlashCommand::class;
  protected $slashCommandDataType = '';
  protected $spaceType = Space::class;
  protected $spaceDataType = '';
  /**
   * @var string
   */
  public $text;
  protected $threadType = Thread::class;
  protected $threadDataType = '';

  /**
   * @param ActionResponse
   */
  public function setActionResponse(ActionResponse $actionResponse)
  {
    $this->actionResponse = $actionResponse;
  }
  /**
   * @return ActionResponse
   */
  public function getActionResponse()
  {
    return $this->actionResponse;
  }
  /**
   * @param Annotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Annotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param string
   */
  public function setArgumentText($argumentText)
  {
    $this->argumentText = $argumentText;
  }
  /**
   * @return string
   */
  public function getArgumentText()
  {
    return $this->argumentText;
  }
  /**
   * @param Attachment[]
   */
  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return Attachment[]
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param Card[]
   */
  public function setCards($cards)
  {
    $this->cards = $cards;
  }
  /**
   * @return Card[]
   */
  public function getCards()
  {
    return $this->cards;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setFallbackText($fallbackText)
  {
    $this->fallbackText = $fallbackText;
  }
  /**
   * @return string
   */
  public function getFallbackText()
  {
    return $this->fallbackText;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param MatchedUrl
   */
  public function setMatchedUrl(MatchedUrl $matchedUrl)
  {
    $this->matchedUrl = $matchedUrl;
  }
  /**
   * @return MatchedUrl
   */
  public function getMatchedUrl()
  {
    return $this->matchedUrl;
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
   * @param string
   */
  public function setPreviewText($previewText)
  {
    $this->previewText = $previewText;
  }
  /**
   * @return string
   */
  public function getPreviewText()
  {
    return $this->previewText;
  }
  /**
   * @param User
   */
  public function setSender(User $sender)
  {
    $this->sender = $sender;
  }
  /**
   * @return User
   */
  public function getSender()
  {
    return $this->sender;
  }
  /**
   * @param SlashCommand
   */
  public function setSlashCommand(SlashCommand $slashCommand)
  {
    $this->slashCommand = $slashCommand;
  }
  /**
   * @return SlashCommand
   */
  public function getSlashCommand()
  {
    return $this->slashCommand;
  }
  /**
   * @param Space
   */
  public function setSpace(Space $space)
  {
    $this->space = $space;
  }
  /**
   * @return Space
   */
  public function getSpace()
  {
    return $this->space;
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
   * @param Thread
   */
  public function setThread(Thread $thread)
  {
    $this->thread = $thread;
  }
  /**
   * @return Thread
   */
  public function getThread()
  {
    return $this->thread;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Message::class, 'Google_Service_HangoutsChat_Message');
