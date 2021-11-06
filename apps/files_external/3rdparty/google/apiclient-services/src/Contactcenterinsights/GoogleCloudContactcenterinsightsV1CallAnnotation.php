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

class GoogleCloudContactcenterinsightsV1CallAnnotation extends \Google\Model
{
  protected $annotationEndBoundaryType = GoogleCloudContactcenterinsightsV1AnnotationBoundary::class;
  protected $annotationEndBoundaryDataType = '';
  protected $annotationStartBoundaryType = GoogleCloudContactcenterinsightsV1AnnotationBoundary::class;
  protected $annotationStartBoundaryDataType = '';
  public $channelTag;
  protected $entityMentionDataType = GoogleCloudContactcenterinsightsV1EntityMentionData::class;
  protected $entityMentionDataDataType = '';
  protected $holdDataType = GoogleCloudContactcenterinsightsV1HoldData::class;
  protected $holdDataDataType = '';
  protected $intentMatchDataType = GoogleCloudContactcenterinsightsV1IntentMatchData::class;
  protected $intentMatchDataDataType = '';
  protected $interruptionDataType = GoogleCloudContactcenterinsightsV1InterruptionData::class;
  protected $interruptionDataDataType = '';
  protected $phraseMatchDataType = GoogleCloudContactcenterinsightsV1PhraseMatchData::class;
  protected $phraseMatchDataDataType = '';
  protected $sentimentDataType = GoogleCloudContactcenterinsightsV1SentimentData::class;
  protected $sentimentDataDataType = '';
  protected $silenceDataType = GoogleCloudContactcenterinsightsV1SilenceData::class;
  protected $silenceDataDataType = '';

  /**
   * @param GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function setAnnotationEndBoundary(GoogleCloudContactcenterinsightsV1AnnotationBoundary $annotationEndBoundary)
  {
    $this->annotationEndBoundary = $annotationEndBoundary;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function getAnnotationEndBoundary()
  {
    return $this->annotationEndBoundary;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function setAnnotationStartBoundary(GoogleCloudContactcenterinsightsV1AnnotationBoundary $annotationStartBoundary)
  {
    $this->annotationStartBoundary = $annotationStartBoundary;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function getAnnotationStartBoundary()
  {
    return $this->annotationStartBoundary;
  }
  public function setChannelTag($channelTag)
  {
    $this->channelTag = $channelTag;
  }
  public function getChannelTag()
  {
    return $this->channelTag;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1EntityMentionData
   */
  public function setEntityMentionData(GoogleCloudContactcenterinsightsV1EntityMentionData $entityMentionData)
  {
    $this->entityMentionData = $entityMentionData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1EntityMentionData
   */
  public function getEntityMentionData()
  {
    return $this->entityMentionData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1HoldData
   */
  public function setHoldData(GoogleCloudContactcenterinsightsV1HoldData $holdData)
  {
    $this->holdData = $holdData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1HoldData
   */
  public function getHoldData()
  {
    return $this->holdData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IntentMatchData
   */
  public function setIntentMatchData(GoogleCloudContactcenterinsightsV1IntentMatchData $intentMatchData)
  {
    $this->intentMatchData = $intentMatchData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IntentMatchData
   */
  public function getIntentMatchData()
  {
    return $this->intentMatchData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1InterruptionData
   */
  public function setInterruptionData(GoogleCloudContactcenterinsightsV1InterruptionData $interruptionData)
  {
    $this->interruptionData = $interruptionData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1InterruptionData
   */
  public function getInterruptionData()
  {
    return $this->interruptionData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1PhraseMatchData
   */
  public function setPhraseMatchData(GoogleCloudContactcenterinsightsV1PhraseMatchData $phraseMatchData)
  {
    $this->phraseMatchData = $phraseMatchData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1PhraseMatchData
   */
  public function getPhraseMatchData()
  {
    return $this->phraseMatchData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1SentimentData
   */
  public function setSentimentData(GoogleCloudContactcenterinsightsV1SentimentData $sentimentData)
  {
    $this->sentimentData = $sentimentData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SentimentData
   */
  public function getSentimentData()
  {
    return $this->sentimentData;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1SilenceData
   */
  public function setSilenceData(GoogleCloudContactcenterinsightsV1SilenceData $silenceData)
  {
    $this->silenceData = $silenceData;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SilenceData
   */
  public function getSilenceData()
  {
    return $this->silenceData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1CallAnnotation::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1CallAnnotation');
