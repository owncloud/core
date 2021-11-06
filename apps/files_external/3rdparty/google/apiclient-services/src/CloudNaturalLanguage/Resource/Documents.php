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

namespace Google\Service\CloudNaturalLanguage\Resource;

use Google\Service\CloudNaturalLanguage\AnalyzeEntitiesRequest;
use Google\Service\CloudNaturalLanguage\AnalyzeEntitiesResponse;
use Google\Service\CloudNaturalLanguage\AnalyzeEntitySentimentRequest;
use Google\Service\CloudNaturalLanguage\AnalyzeEntitySentimentResponse;
use Google\Service\CloudNaturalLanguage\AnalyzeSentimentRequest;
use Google\Service\CloudNaturalLanguage\AnalyzeSentimentResponse;
use Google\Service\CloudNaturalLanguage\AnalyzeSyntaxRequest;
use Google\Service\CloudNaturalLanguage\AnalyzeSyntaxResponse;
use Google\Service\CloudNaturalLanguage\AnnotateTextRequest;
use Google\Service\CloudNaturalLanguage\AnnotateTextResponse;
use Google\Service\CloudNaturalLanguage\ClassifyTextRequest;
use Google\Service\CloudNaturalLanguage\ClassifyTextResponse;

/**
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $languageService = new Google\Service\CloudNaturalLanguage(...);
 *   $documents = $languageService->documents;
 *  </code>
 */
class Documents extends \Google\Service\Resource
{
  /**
   * Finds named entities (currently proper names and common nouns) in the text
   * along with entity types, salience, mentions for each entity, and other
   * properties. (documents.analyzeEntities)
   *
   * @param AnalyzeEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnalyzeEntitiesResponse
   */
  public function analyzeEntities(AnalyzeEntitiesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeEntities', [$params], AnalyzeEntitiesResponse::class);
  }
  /**
   * Finds entities, similar to AnalyzeEntities in the text and analyzes sentiment
   * associated with each entity and its mentions.
   * (documents.analyzeEntitySentiment)
   *
   * @param AnalyzeEntitySentimentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnalyzeEntitySentimentResponse
   */
  public function analyzeEntitySentiment(AnalyzeEntitySentimentRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeEntitySentiment', [$params], AnalyzeEntitySentimentResponse::class);
  }
  /**
   * Analyzes the sentiment of the provided text. (documents.analyzeSentiment)
   *
   * @param AnalyzeSentimentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnalyzeSentimentResponse
   */
  public function analyzeSentiment(AnalyzeSentimentRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeSentiment', [$params], AnalyzeSentimentResponse::class);
  }
  /**
   * Analyzes the syntax of the text and provides sentence boundaries and
   * tokenization along with part of speech tags, dependency trees, and other
   * properties. (documents.analyzeSyntax)
   *
   * @param AnalyzeSyntaxRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnalyzeSyntaxResponse
   */
  public function analyzeSyntax(AnalyzeSyntaxRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeSyntax', [$params], AnalyzeSyntaxResponse::class);
  }
  /**
   * A convenience method that provides all the features that analyzeSentiment,
   * analyzeEntities, and analyzeSyntax provide in one call.
   * (documents.annotateText)
   *
   * @param AnnotateTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnnotateTextResponse
   */
  public function annotateText(AnnotateTextRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('annotateText', [$params], AnnotateTextResponse::class);
  }
  /**
   * Classifies a document into categories. (documents.classifyText)
   *
   * @param ClassifyTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClassifyTextResponse
   */
  public function classifyText(ClassifyTextRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('classifyText', [$params], ClassifyTextResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Documents::class, 'Google_Service_CloudNaturalLanguage_Resource_Documents');
