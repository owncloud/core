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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingModelsShoppingAssistantProductMediaProduct extends \Google\Model
{
  protected $authorType = NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue::class;
  protected $authorDataType = '';
  protected $genreType = NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue::class;
  protected $genreDataType = '';
  protected $mediaTitleType = NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue::class;
  protected $mediaTitleDataType = '';
  protected $orderInSeriesType = NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue::class;
  protected $orderInSeriesDataType = '';
  protected $topicType = NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue::class;
  protected $topicDataType = '';

  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function setAuthor(NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue $author)
  {
    $this->author = $author;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function setGenre(NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue $genre)
  {
    $this->genre = $genre;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function getGenre()
  {
    return $this->genre;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function setMediaTitle(NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue $mediaTitle)
  {
    $this->mediaTitle = $mediaTitle;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function getMediaTitle()
  {
    return $this->mediaTitle;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function setOrderInSeries(NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue $orderInSeries)
  {
    $this->orderInSeries = $orderInSeries;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function getOrderInSeries()
  {
    return $this->orderInSeries;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function setTopic(NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue $topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProductMediaAttributeValue
   */
  public function getTopic()
  {
    return $this->topic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsShoppingAssistantProductMediaProduct::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantProductMediaProduct');
