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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2IntentMessage extends \Google\Model
{
  protected $basicCardType = GoogleCloudDialogflowV2IntentMessageBasicCard::class;
  protected $basicCardDataType = '';
  protected $browseCarouselCardType = GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard::class;
  protected $browseCarouselCardDataType = '';
  protected $cardType = GoogleCloudDialogflowV2IntentMessageCard::class;
  protected $cardDataType = '';
  protected $carouselSelectType = GoogleCloudDialogflowV2IntentMessageCarouselSelect::class;
  protected $carouselSelectDataType = '';
  protected $imageType = GoogleCloudDialogflowV2IntentMessageImage::class;
  protected $imageDataType = '';
  protected $linkOutSuggestionType = GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion::class;
  protected $linkOutSuggestionDataType = '';
  protected $listSelectType = GoogleCloudDialogflowV2IntentMessageListSelect::class;
  protected $listSelectDataType = '';
  protected $mediaContentType = GoogleCloudDialogflowV2IntentMessageMediaContent::class;
  protected $mediaContentDataType = '';
  public $payload;
  public $platform;
  protected $quickRepliesType = GoogleCloudDialogflowV2IntentMessageQuickReplies::class;
  protected $quickRepliesDataType = '';
  protected $simpleResponsesType = GoogleCloudDialogflowV2IntentMessageSimpleResponses::class;
  protected $simpleResponsesDataType = '';
  protected $suggestionsType = GoogleCloudDialogflowV2IntentMessageSuggestions::class;
  protected $suggestionsDataType = '';
  protected $tableCardType = GoogleCloudDialogflowV2IntentMessageTableCard::class;
  protected $tableCardDataType = '';
  protected $textType = GoogleCloudDialogflowV2IntentMessageText::class;
  protected $textDataType = '';

  /**
   * @param GoogleCloudDialogflowV2IntentMessageBasicCard
   */
  public function setBasicCard(GoogleCloudDialogflowV2IntentMessageBasicCard $basicCard)
  {
    $this->basicCard = $basicCard;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageBasicCard
   */
  public function getBasicCard()
  {
    return $this->basicCard;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard
   */
  public function setBrowseCarouselCard(GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard $browseCarouselCard)
  {
    $this->browseCarouselCard = $browseCarouselCard;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard
   */
  public function getBrowseCarouselCard()
  {
    return $this->browseCarouselCard;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageCard
   */
  public function setCard(GoogleCloudDialogflowV2IntentMessageCard $card)
  {
    $this->card = $card;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageCard
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageCarouselSelect
   */
  public function setCarouselSelect(GoogleCloudDialogflowV2IntentMessageCarouselSelect $carouselSelect)
  {
    $this->carouselSelect = $carouselSelect;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageCarouselSelect
   */
  public function getCarouselSelect()
  {
    return $this->carouselSelect;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setImage(GoogleCloudDialogflowV2IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion
   */
  public function setLinkOutSuggestion(GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion $linkOutSuggestion)
  {
    $this->linkOutSuggestion = $linkOutSuggestion;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion
   */
  public function getLinkOutSuggestion()
  {
    return $this->linkOutSuggestion;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageListSelect
   */
  public function setListSelect(GoogleCloudDialogflowV2IntentMessageListSelect $listSelect)
  {
    $this->listSelect = $listSelect;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageListSelect
   */
  public function getListSelect()
  {
    return $this->listSelect;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageMediaContent
   */
  public function setMediaContent(GoogleCloudDialogflowV2IntentMessageMediaContent $mediaContent)
  {
    $this->mediaContent = $mediaContent;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageMediaContent
   */
  public function getMediaContent()
  {
    return $this->mediaContent;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageQuickReplies
   */
  public function setQuickReplies(GoogleCloudDialogflowV2IntentMessageQuickReplies $quickReplies)
  {
    $this->quickReplies = $quickReplies;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageQuickReplies
   */
  public function getQuickReplies()
  {
    return $this->quickReplies;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageSimpleResponses
   */
  public function setSimpleResponses(GoogleCloudDialogflowV2IntentMessageSimpleResponses $simpleResponses)
  {
    $this->simpleResponses = $simpleResponses;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageSimpleResponses
   */
  public function getSimpleResponses()
  {
    return $this->simpleResponses;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageSuggestions
   */
  public function setSuggestions(GoogleCloudDialogflowV2IntentMessageSuggestions $suggestions)
  {
    $this->suggestions = $suggestions;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageSuggestions
   */
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageTableCard
   */
  public function setTableCard(GoogleCloudDialogflowV2IntentMessageTableCard $tableCard)
  {
    $this->tableCard = $tableCard;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageTableCard
   */
  public function getTableCard()
  {
    return $this->tableCard;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageText
   */
  public function setText(GoogleCloudDialogflowV2IntentMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2IntentMessage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessage');
