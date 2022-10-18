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

class KnowledgeAnswersIntentQueryToken extends \Google\Collection
{
  protected $collection_key = 'synonyms';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var string
   */
  public $ngram;
  /**
   * @var string[]
   */
  public $parsedDueToExperiment;
  /**
   * @var float
   */
  public $prior;
  /**
   * @var string
   */
  public $provenance;
  /**
   * @var string[]
   */
  public $provenanceId;
  /**
   * @var string
   */
  public $provenanceLanguage;
  protected $synonymsType = KnowledgeAnswersIntentQueryTokenSynonym::class;
  protected $synonymsDataType = 'array';

  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param string
   */
  public function setNgram($ngram)
  {
    $this->ngram = $ngram;
  }
  /**
   * @return string
   */
  public function getNgram()
  {
    return $this->ngram;
  }
  /**
   * @param string[]
   */
  public function setParsedDueToExperiment($parsedDueToExperiment)
  {
    $this->parsedDueToExperiment = $parsedDueToExperiment;
  }
  /**
   * @return string[]
   */
  public function getParsedDueToExperiment()
  {
    return $this->parsedDueToExperiment;
  }
  /**
   * @param float
   */
  public function setPrior($prior)
  {
    $this->prior = $prior;
  }
  /**
   * @return float
   */
  public function getPrior()
  {
    return $this->prior;
  }
  /**
   * @param string
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return string
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param string[]
   */
  public function setProvenanceId($provenanceId)
  {
    $this->provenanceId = $provenanceId;
  }
  /**
   * @return string[]
   */
  public function getProvenanceId()
  {
    return $this->provenanceId;
  }
  /**
   * @param string
   */
  public function setProvenanceLanguage($provenanceLanguage)
  {
    $this->provenanceLanguage = $provenanceLanguage;
  }
  /**
   * @return string
   */
  public function getProvenanceLanguage()
  {
    return $this->provenanceLanguage;
  }
  /**
   * @param KnowledgeAnswersIntentQueryTokenSynonym[]
   */
  public function setSynonyms($synonyms)
  {
    $this->synonyms = $synonyms;
  }
  /**
   * @return KnowledgeAnswersIntentQueryTokenSynonym[]
   */
  public function getSynonyms()
  {
    return $this->synonyms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryToken::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryToken');
