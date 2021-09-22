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

namespace Google\Service\CloudNaturalLanguage;

class AnalyzeSentimentResponse extends \Google\Collection
{
  protected $collection_key = 'sentences';
  protected $documentSentimentType = Sentiment::class;
  protected $documentSentimentDataType = '';
  public $language;
  protected $sentencesType = Sentence::class;
  protected $sentencesDataType = 'array';

  /**
   * @param Sentiment
   */
  public function setDocumentSentiment(Sentiment $documentSentiment)
  {
    $this->documentSentiment = $documentSentiment;
  }
  /**
   * @return Sentiment
   */
  public function getDocumentSentiment()
  {
    return $this->documentSentiment;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param Sentence[]
   */
  public function setSentences($sentences)
  {
    $this->sentences = $sentences;
  }
  /**
   * @return Sentence[]
   */
  public function getSentences()
  {
    return $this->sentences;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnalyzeSentimentResponse::class, 'Google_Service_CloudNaturalLanguage_AnalyzeSentimentResponse');
