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

class NlpSciencelitArticleData extends \Google\Collection
{
  protected $collection_key = 'scholarDocument';
  protected $analyzedTextType = NlxDataSchemaScaleSet::class;
  protected $analyzedTextDataType = '';
  protected $articleIdType = NlpSciencelitArticleId::class;
  protected $articleIdDataType = 'array';
  protected $citationType = NlpSciencelitCitationData::class;
  protected $citationDataType = 'array';
  /**
   * @var string
   */
  public $earliestPubDate;
  protected $metadataType = NlpSciencelitArticleMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $nonAbstractWordCount;
  /**
   * @var string
   */
  public $parsedFrom;
  protected $pubDateType = NlpSciencelitPubDate::class;
  protected $pubDateDataType = 'array';
  protected $referencedBlockType = NlpSciencelitReferencedBlock::class;
  protected $referencedBlockDataType = 'array';
  protected $scholarCitationType = ScienceCitation::class;
  protected $scholarCitationDataType = '';
  protected $scholarDocumentType = CompositeDoc::class;
  protected $scholarDocumentDataType = 'array';
  protected $scholarSignalType = ScienceIndexSignal::class;
  protected $scholarSignalDataType = '';
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $wordCount;

  /**
   * @param NlxDataSchemaScaleSet
   */
  public function setAnalyzedText(NlxDataSchemaScaleSet $analyzedText)
  {
    $this->analyzedText = $analyzedText;
  }
  /**
   * @return NlxDataSchemaScaleSet
   */
  public function getAnalyzedText()
  {
    return $this->analyzedText;
  }
  /**
   * @param NlpSciencelitArticleId[]
   */
  public function setArticleId($articleId)
  {
    $this->articleId = $articleId;
  }
  /**
   * @return NlpSciencelitArticleId[]
   */
  public function getArticleId()
  {
    return $this->articleId;
  }
  /**
   * @param NlpSciencelitCitationData[]
   */
  public function setCitation($citation)
  {
    $this->citation = $citation;
  }
  /**
   * @return NlpSciencelitCitationData[]
   */
  public function getCitation()
  {
    return $this->citation;
  }
  /**
   * @param string
   */
  public function setEarliestPubDate($earliestPubDate)
  {
    $this->earliestPubDate = $earliestPubDate;
  }
  /**
   * @return string
   */
  public function getEarliestPubDate()
  {
    return $this->earliestPubDate;
  }
  /**
   * @param NlpSciencelitArticleMetadata
   */
  public function setMetadata(NlpSciencelitArticleMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return NlpSciencelitArticleMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setNonAbstractWordCount($nonAbstractWordCount)
  {
    $this->nonAbstractWordCount = $nonAbstractWordCount;
  }
  /**
   * @return string
   */
  public function getNonAbstractWordCount()
  {
    return $this->nonAbstractWordCount;
  }
  /**
   * @param string
   */
  public function setParsedFrom($parsedFrom)
  {
    $this->parsedFrom = $parsedFrom;
  }
  /**
   * @return string
   */
  public function getParsedFrom()
  {
    return $this->parsedFrom;
  }
  /**
   * @param NlpSciencelitPubDate[]
   */
  public function setPubDate($pubDate)
  {
    $this->pubDate = $pubDate;
  }
  /**
   * @return NlpSciencelitPubDate[]
   */
  public function getPubDate()
  {
    return $this->pubDate;
  }
  /**
   * @param NlpSciencelitReferencedBlock[]
   */
  public function setReferencedBlock($referencedBlock)
  {
    $this->referencedBlock = $referencedBlock;
  }
  /**
   * @return NlpSciencelitReferencedBlock[]
   */
  public function getReferencedBlock()
  {
    return $this->referencedBlock;
  }
  /**
   * @param ScienceCitation
   */
  public function setScholarCitation(ScienceCitation $scholarCitation)
  {
    $this->scholarCitation = $scholarCitation;
  }
  /**
   * @return ScienceCitation
   */
  public function getScholarCitation()
  {
    return $this->scholarCitation;
  }
  /**
   * @param CompositeDoc[]
   */
  public function setScholarDocument($scholarDocument)
  {
    $this->scholarDocument = $scholarDocument;
  }
  /**
   * @return CompositeDoc[]
   */
  public function getScholarDocument()
  {
    return $this->scholarDocument;
  }
  /**
   * @param ScienceIndexSignal
   */
  public function setScholarSignal(ScienceIndexSignal $scholarSignal)
  {
    $this->scholarSignal = $scholarSignal;
  }
  /**
   * @return ScienceIndexSignal
   */
  public function getScholarSignal()
  {
    return $this->scholarSignal;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setWordCount($wordCount)
  {
    $this->wordCount = $wordCount;
  }
  /**
   * @return string
   */
  public function getWordCount()
  {
    return $this->wordCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitArticleData::class, 'Google_Service_Contentwarehouse_NlpSciencelitArticleData');
