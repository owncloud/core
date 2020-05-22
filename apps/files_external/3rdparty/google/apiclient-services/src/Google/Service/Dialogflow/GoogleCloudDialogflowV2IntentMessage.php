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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessage extends Google_Model
{
  protected $basicCardType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBasicCard';
  protected $basicCardDataType = '';
  protected $browseCarouselCardType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard';
  protected $browseCarouselCardDataType = '';
  protected $cardType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCard';
  protected $cardDataType = '';
  protected $carouselSelectType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCarouselSelect';
  protected $carouselSelectDataType = '';
  protected $imageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage';
  protected $imageDataType = '';
  protected $linkOutSuggestionType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion';
  protected $linkOutSuggestionDataType = '';
  protected $listSelectType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageListSelect';
  protected $listSelectDataType = '';
  protected $mediaContentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContent';
  protected $mediaContentDataType = '';
  public $payload;
  public $platform;
  protected $quickRepliesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageQuickReplies';
  protected $quickRepliesDataType = '';
  protected $simpleResponsesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSimpleResponses';
  protected $simpleResponsesDataType = '';
  protected $suggestionsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSuggestions';
  protected $suggestionsDataType = '';
  protected $tableCardType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageTableCard';
  protected $tableCardDataType = '';
  protected $textType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageText';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBasicCard
   */
  public function setBasicCard(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBasicCard $basicCard)
  {
    $this->basicCard = $basicCard;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBasicCard
   */
  public function getBasicCard()
  {
    return $this->basicCard;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard
   */
  public function setBrowseCarouselCard(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard $browseCarouselCard)
  {
    $this->browseCarouselCard = $browseCarouselCard;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCard
   */
  public function getBrowseCarouselCard()
  {
    return $this->browseCarouselCard;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCard
   */
  public function setCard(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCard $card)
  {
    $this->card = $card;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCard
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCarouselSelect
   */
  public function setCarouselSelect(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCarouselSelect $carouselSelect)
  {
    $this->carouselSelect = $carouselSelect;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageCarouselSelect
   */
  public function getCarouselSelect()
  {
    return $this->carouselSelect;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setImage(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion
   */
  public function setLinkOutSuggestion(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion $linkOutSuggestion)
  {
    $this->linkOutSuggestion = $linkOutSuggestion;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageLinkOutSuggestion
   */
  public function getLinkOutSuggestion()
  {
    return $this->linkOutSuggestion;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageListSelect
   */
  public function setListSelect(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageListSelect $listSelect)
  {
    $this->listSelect = $listSelect;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageListSelect
   */
  public function getListSelect()
  {
    return $this->listSelect;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContent
   */
  public function setMediaContent(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContent $mediaContent)
  {
    $this->mediaContent = $mediaContent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContent
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageQuickReplies
   */
  public function setQuickReplies(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageQuickReplies $quickReplies)
  {
    $this->quickReplies = $quickReplies;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageQuickReplies
   */
  public function getQuickReplies()
  {
    return $this->quickReplies;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSimpleResponses
   */
  public function setSimpleResponses(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSimpleResponses $simpleResponses)
  {
    $this->simpleResponses = $simpleResponses;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSimpleResponses
   */
  public function getSimpleResponses()
  {
    return $this->simpleResponses;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSuggestions
   */
  public function setSuggestions(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSuggestions $suggestions)
  {
    $this->suggestions = $suggestions;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageSuggestions
   */
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageTableCard
   */
  public function setTableCard(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageTableCard $tableCard)
  {
    $this->tableCard = $tableCard;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageTableCard
   */
  public function getTableCard()
  {
    return $this->tableCard;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageText
   */
  public function setText(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}
