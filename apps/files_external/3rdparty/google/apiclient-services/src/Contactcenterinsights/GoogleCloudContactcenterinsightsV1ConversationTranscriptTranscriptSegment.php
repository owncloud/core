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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegment extends \Google\Collection
{
  protected $collection_key = 'words';
  public $channelTag;
  public $confidence;
  public $languageCode;
  protected $segmentParticipantType = GoogleCloudContactcenterinsightsV1ConversationParticipant::class;
  protected $segmentParticipantDataType = '';
  public $text;
  protected $wordsType = GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegmentWordInfo::class;
  protected $wordsDataType = 'array';

  public function setChannelTag($channelTag)
  {
    $this->channelTag = $channelTag;
  }
  public function getChannelTag()
  {
    return $this->channelTag;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1ConversationParticipant
   */
  public function setSegmentParticipant(GoogleCloudContactcenterinsightsV1ConversationParticipant $segmentParticipant)
  {
    $this->segmentParticipant = $segmentParticipant;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ConversationParticipant
   */
  public function getSegmentParticipant()
  {
    return $this->segmentParticipant;
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
   * @param GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegmentWordInfo[]
   */
  public function setWords($words)
  {
    $this->words = $words;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegmentWordInfo[]
   */
  public function getWords()
  {
    return $this->words;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegment::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1ConversationTranscriptTranscriptSegment');
