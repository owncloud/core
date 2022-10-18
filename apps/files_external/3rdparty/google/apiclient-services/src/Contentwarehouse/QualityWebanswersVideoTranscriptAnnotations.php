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

class QualityWebanswersVideoTranscriptAnnotations extends \Google\Model
{
  /**
   * @var string
   */
  public $amarnaDocid;
  /**
   * @var string
   */
  public $lang;
  /**
   * @var string
   */
  public $punctuatedTranscript;
  protected $saftDocumentType = NlpSaftDocument::class;
  protected $saftDocumentDataType = '';
  protected $saftSentenceBoundaryType = SentenceBoundaryAnnotations::class;
  protected $saftSentenceBoundaryDataType = '';
  protected $timingInfoType = QualityWebanswersVideoYouTubeCaptionTimingInfoAnnotations::class;
  protected $timingInfoDataType = '';
  protected $webrefEntitiesType = RepositoryWebrefWebrefEntities::class;
  protected $webrefEntitiesDataType = '';

  /**
   * @param string
   */
  public function setAmarnaDocid($amarnaDocid)
  {
    $this->amarnaDocid = $amarnaDocid;
  }
  /**
   * @return string
   */
  public function getAmarnaDocid()
  {
    return $this->amarnaDocid;
  }
  /**
   * @param string
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  /**
   * @return string
   */
  public function getLang()
  {
    return $this->lang;
  }
  /**
   * @param string
   */
  public function setPunctuatedTranscript($punctuatedTranscript)
  {
    $this->punctuatedTranscript = $punctuatedTranscript;
  }
  /**
   * @return string
   */
  public function getPunctuatedTranscript()
  {
    return $this->punctuatedTranscript;
  }
  /**
   * @param NlpSaftDocument
   */
  public function setSaftDocument(NlpSaftDocument $saftDocument)
  {
    $this->saftDocument = $saftDocument;
  }
  /**
   * @return NlpSaftDocument
   */
  public function getSaftDocument()
  {
    return $this->saftDocument;
  }
  /**
   * @param SentenceBoundaryAnnotations
   */
  public function setSaftSentenceBoundary(SentenceBoundaryAnnotations $saftSentenceBoundary)
  {
    $this->saftSentenceBoundary = $saftSentenceBoundary;
  }
  /**
   * @return SentenceBoundaryAnnotations
   */
  public function getSaftSentenceBoundary()
  {
    return $this->saftSentenceBoundary;
  }
  /**
   * @param QualityWebanswersVideoYouTubeCaptionTimingInfoAnnotations
   */
  public function setTimingInfo(QualityWebanswersVideoYouTubeCaptionTimingInfoAnnotations $timingInfo)
  {
    $this->timingInfo = $timingInfo;
  }
  /**
   * @return QualityWebanswersVideoYouTubeCaptionTimingInfoAnnotations
   */
  public function getTimingInfo()
  {
    return $this->timingInfo;
  }
  /**
   * @param RepositoryWebrefWebrefEntities
   */
  public function setWebrefEntities(RepositoryWebrefWebrefEntities $webrefEntities)
  {
    $this->webrefEntities = $webrefEntities;
  }
  /**
   * @return RepositoryWebrefWebrefEntities
   */
  public function getWebrefEntities()
  {
    return $this->webrefEntities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityWebanswersVideoTranscriptAnnotations::class, 'Google_Service_Contentwarehouse_QualityWebanswersVideoTranscriptAnnotations');
