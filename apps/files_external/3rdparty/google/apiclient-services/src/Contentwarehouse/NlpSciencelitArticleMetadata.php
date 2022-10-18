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

class NlpSciencelitArticleMetadata extends \Google\Collection
{
  protected $collection_key = 'url';
  protected $abstractType = NlpSciencelitTokenizedText::class;
  protected $abstractDataType = '';
  protected $articleIdType = NlpSciencelitArticleId::class;
  protected $articleIdDataType = 'array';
  protected $authorType = NlpSciencelitAuthor::class;
  protected $authorDataType = 'array';
  protected $datasetType = NlpSciencelitDataset::class;
  protected $datasetDataType = 'array';
  /**
   * @var string
   */
  public $dateStr;
  /**
   * @var bool
   */
  public $deleted;
  protected $headingType = NlpSciencelitMeshHeading::class;
  protected $headingDataType = 'array';
  /**
   * @var string
   */
  public $issue;
  /**
   * @var string
   */
  public $journal;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastRevisedDateStr;
  /**
   * @var string[]
   */
  public $metadataSource;
  /**
   * @var string
   */
  public $parsedFrom;
  /**
   * @var string
   */
  public $pmid;
  protected $publicationTypeType = NlpSciencelitPublicationType::class;
  protected $publicationTypeDataType = 'array';
  protected $scamRestrictTokensType = ResearchScamV3Restrict::class;
  protected $scamRestrictTokensDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string[]
   */
  public $url;
  /**
   * @var string
   */
  public $volume;

  /**
   * @param NlpSciencelitTokenizedText
   */
  public function setAbstract(NlpSciencelitTokenizedText $abstract)
  {
    $this->abstract = $abstract;
  }
  /**
   * @return NlpSciencelitTokenizedText
   */
  public function getAbstract()
  {
    return $this->abstract;
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
   * @param NlpSciencelitAuthor[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return NlpSciencelitAuthor[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param NlpSciencelitDataset[]
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return NlpSciencelitDataset[]
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param string
   */
  public function setDateStr($dateStr)
  {
    $this->dateStr = $dateStr;
  }
  /**
   * @return string
   */
  public function getDateStr()
  {
    return $this->dateStr;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param NlpSciencelitMeshHeading[]
   */
  public function setHeading($heading)
  {
    $this->heading = $heading;
  }
  /**
   * @return NlpSciencelitMeshHeading[]
   */
  public function getHeading()
  {
    return $this->heading;
  }
  /**
   * @param string
   */
  public function setIssue($issue)
  {
    $this->issue = $issue;
  }
  /**
   * @return string
   */
  public function getIssue()
  {
    return $this->issue;
  }
  /**
   * @param string
   */
  public function setJournal($journal)
  {
    $this->journal = $journal;
  }
  /**
   * @return string
   */
  public function getJournal()
  {
    return $this->journal;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLastRevisedDateStr($lastRevisedDateStr)
  {
    $this->lastRevisedDateStr = $lastRevisedDateStr;
  }
  /**
   * @return string
   */
  public function getLastRevisedDateStr()
  {
    return $this->lastRevisedDateStr;
  }
  /**
   * @param string[]
   */
  public function setMetadataSource($metadataSource)
  {
    $this->metadataSource = $metadataSource;
  }
  /**
   * @return string[]
   */
  public function getMetadataSource()
  {
    return $this->metadataSource;
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
   * @param string
   */
  public function setPmid($pmid)
  {
    $this->pmid = $pmid;
  }
  /**
   * @return string
   */
  public function getPmid()
  {
    return $this->pmid;
  }
  /**
   * @param NlpSciencelitPublicationType[]
   */
  public function setPublicationType($publicationType)
  {
    $this->publicationType = $publicationType;
  }
  /**
   * @return NlpSciencelitPublicationType[]
   */
  public function getPublicationType()
  {
    return $this->publicationType;
  }
  /**
   * @param ResearchScamV3Restrict
   */
  public function setScamRestrictTokens(ResearchScamV3Restrict $scamRestrictTokens)
  {
    $this->scamRestrictTokens = $scamRestrictTokens;
  }
  /**
   * @return ResearchScamV3Restrict
   */
  public function getScamRestrictTokens()
  {
    return $this->scamRestrictTokens;
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
   * @param string[]
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string[]
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return string
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitArticleMetadata::class, 'Google_Service_Contentwarehouse_NlpSciencelitArticleMetadata');
