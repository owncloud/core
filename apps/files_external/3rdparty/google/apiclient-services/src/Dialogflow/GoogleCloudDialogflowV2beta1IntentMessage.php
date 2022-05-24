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

class GoogleCloudDialogflowV2beta1IntentMessage extends \Google\Model
{
  protected $basicCardType = GoogleCloudDialogflowV2beta1IntentMessageBasicCard::class;
  protected $basicCardDataType = '';
  protected $browseCarouselCardType = GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard::class;
  protected $browseCarouselCardDataType = '';
  protected $cardType = GoogleCloudDialogflowV2beta1IntentMessageCard::class;
  protected $cardDataType = '';
  protected $carouselSelectType = GoogleCloudDialogflowV2beta1IntentMessageCarouselSelect::class;
  protected $carouselSelectDataType = '';
  protected $imageType = GoogleCloudDialogflowV2beta1IntentMessageImage::class;
  protected $imageDataType = '';
  protected $linkOutSuggestionType = GoogleCloudDialogflowV2beta1IntentMessageLinkOutSuggestion::class;
  protected $linkOutSuggestionDataType = '';
  protected $listSelectType = GoogleCloudDialogflowV2beta1IntentMessageListSelect::class;
  protected $listSelectDataType = '';
  protected $mediaContentType = GoogleCloudDialogflowV2beta1IntentMessageMediaContent::class;
  protected $mediaContentDataType = '';
  /**
   * @var array[]
   */
  public $payload;
  /**
   * @var string
   */
  public $platform;
  protected $quickRepliesType = GoogleCloudDialogflowV2beta1IntentMessageQuickReplies::class;
  protected $quickRepliesDataType = '';
  protected $rbmCarouselRichCardType = GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard::class;
  protected $rbmCarouselRichCardDataType = '';
  protected $rbmStandaloneRichCardType = GoogleCloudDialogflowV2beta1IntentMessageRbmStandaloneCard::class;
  protected $rbmStandaloneRichCardDataType = '';
  protected $rbmTextType = GoogleCloudDialogflowV2beta1IntentMessageRbmText::class;
  protected $rbmTextDataType = '';
  protected $simpleResponsesType = GoogleCloudDialogflowV2beta1IntentMessageSimpleResponses::class;
  protected $simpleResponsesDataType = '';
  protected $suggestionsType = GoogleCloudDialogflowV2beta1IntentMessageSuggestions::class;
  protected $suggestionsDataType = '';
  protected $tableCardType = GoogleCloudDialogflowV2beta1IntentMessageTableCard::class;
  protected $tableCardDataType = '';
  protected $telephonyPlayAudioType = GoogleCloudDialogflowV2beta1IntentMessageTelephonyPlayAudio::class;
  protected $telephonyPlayAudioDataType = '';
  protected $telephonySynthesizeSpeechType = GoogleCloudDialogflowV2beta1IntentMessageTelephonySynthesizeSpeech::class;
  protected $telephonySynthesizeSpeechDataType = '';
  protected $telephonyTransferCallType = GoogleCloudDialogflowV2beta1IntentMessageTelephonyTransferCall::class;
  protected $telephonyTransferCallDataType = '';
  protected $textType = GoogleCloudDialogflowV2beta1IntentMessageText::class;
  protected $textDataType = '';

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageBasicCard
   */
  public function setBasicCard(GoogleCloudDialogflowV2beta1IntentMessageBasicCard $basicCard)
  {
    $this->basicCard = $basicCard;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageBasicCard
   */
  public function getBasicCard()
  {
    return $this->basicCard;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard
   */
  public function setBrowseCarouselCard(GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard $browseCarouselCard)
  {
    $this->browseCarouselCard = $browseCarouselCard;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard
   */
  public function getBrowseCarouselCard()
  {
    return $this->browseCarouselCard;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageCard
   */
  public function setCard(GoogleCloudDialogflowV2beta1IntentMessageCard $card)
  {
    $this->card = $card;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageCard
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageCarouselSelect
   */
  public function setCarouselSelect(GoogleCloudDialogflowV2beta1IntentMessageCarouselSelect $carouselSelect)
  {
    $this->carouselSelect = $carouselSelect;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageCarouselSelect
   */
  public function getCarouselSelect()
  {
    return $this->carouselSelect;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function setImage(GoogleCloudDialogflowV2beta1IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageLinkOutSuggestion
   */
  public function setLinkOutSuggestion(GoogleCloudDialogflowV2beta1IntentMessageLinkOutSuggestion $linkOutSuggestion)
  {
    $this->linkOutSuggestion = $linkOutSuggestion;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageLinkOutSuggestion
   */
  public function getLinkOutSuggestion()
  {
    return $this->linkOutSuggestion;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageListSelect
   */
  public function setListSelect(GoogleCloudDialogflowV2beta1IntentMessageListSelect $listSelect)
  {
    $this->listSelect = $listSelect;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageListSelect
   */
  public function getListSelect()
  {
    return $this->listSelect;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageMediaContent
   */
  public function setMediaContent(GoogleCloudDialogflowV2beta1IntentMessageMediaContent $mediaContent)
  {
    $this->mediaContent = $mediaContent;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageMediaContent
   */
  public function getMediaContent()
  {
    return $this->mediaContent;
  }
  /**
   * @param array[]
   */
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return array[]
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param string
   */
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return string
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageQuickReplies
   */
  public function setQuickReplies(GoogleCloudDialogflowV2beta1IntentMessageQuickReplies $quickReplies)
  {
    $this->quickReplies = $quickReplies;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageQuickReplies
   */
  public function getQuickReplies()
  {
    return $this->quickReplies;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard
   */
  public function setRbmCarouselRichCard(GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard $rbmCarouselRichCard)
  {
    $this->rbmCarouselRichCard = $rbmCarouselRichCard;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard
   */
  public function getRbmCarouselRichCard()
  {
    return $this->rbmCarouselRichCard;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmStandaloneCard
   */
  public function setRbmStandaloneRichCard(GoogleCloudDialogflowV2beta1IntentMessageRbmStandaloneCard $rbmStandaloneRichCard)
  {
    $this->rbmStandaloneRichCard = $rbmStandaloneRichCard;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmStandaloneCard
   */
  public function getRbmStandaloneRichCard()
  {
    return $this->rbmStandaloneRichCard;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmText
   */
  public function setRbmText(GoogleCloudDialogflowV2beta1IntentMessageRbmText $rbmText)
  {
    $this->rbmText = $rbmText;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmText
   */
  public function getRbmText()
  {
    return $this->rbmText;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageSimpleResponses
   */
  public function setSimpleResponses(GoogleCloudDialogflowV2beta1IntentMessageSimpleResponses $simpleResponses)
  {
    $this->simpleResponses = $simpleResponses;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageSimpleResponses
   */
  public function getSimpleResponses()
  {
    return $this->simpleResponses;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageSuggestions
   */
  public function setSuggestions(GoogleCloudDialogflowV2beta1IntentMessageSuggestions $suggestions)
  {
    $this->suggestions = $suggestions;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageSuggestions
   */
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageTableCard
   */
  public function setTableCard(GoogleCloudDialogflowV2beta1IntentMessageTableCard $tableCard)
  {
    $this->tableCard = $tableCard;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTableCard
   */
  public function getTableCard()
  {
    return $this->tableCard;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageTelephonyPlayAudio
   */
  public function setTelephonyPlayAudio(GoogleCloudDialogflowV2beta1IntentMessageTelephonyPlayAudio $telephonyPlayAudio)
  {
    $this->telephonyPlayAudio = $telephonyPlayAudio;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTelephonyPlayAudio
   */
  public function getTelephonyPlayAudio()
  {
    return $this->telephonyPlayAudio;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageTelephonySynthesizeSpeech
   */
  public function setTelephonySynthesizeSpeech(GoogleCloudDialogflowV2beta1IntentMessageTelephonySynthesizeSpeech $telephonySynthesizeSpeech)
  {
    $this->telephonySynthesizeSpeech = $telephonySynthesizeSpeech;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTelephonySynthesizeSpeech
   */
  public function getTelephonySynthesizeSpeech()
  {
    return $this->telephonySynthesizeSpeech;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageTelephonyTransferCall
   */
  public function setTelephonyTransferCall(GoogleCloudDialogflowV2beta1IntentMessageTelephonyTransferCall $telephonyTransferCall)
  {
    $this->telephonyTransferCall = $telephonyTransferCall;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTelephonyTransferCall
   */
  public function getTelephonyTransferCall()
  {
    return $this->telephonyTransferCall;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageText
   */
  public function setText(GoogleCloudDialogflowV2beta1IntentMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessage');
