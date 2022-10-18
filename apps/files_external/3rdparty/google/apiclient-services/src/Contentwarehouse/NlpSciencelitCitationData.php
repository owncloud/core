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

class NlpSciencelitCitationData extends \Google\Collection
{
  protected $collection_key = 'author';
  protected $articleIdType = NlpSciencelitArticleId::class;
  protected $articleIdDataType = 'array';
  protected $authorType = NlpSciencelitAuthor::class;
  protected $authorDataType = 'array';
  /**
   * @var string
   */
  public $externalLink;
  /**
   * @var string
   */
  public $fullText;
  /**
   * @var string
   */
  public $reference;
  protected $scholarCitationType = ScienceCitation::class;
  protected $scholarCitationDataType = '';
  /**
   * @var string
   */
  public $title;

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
   * @param string
   */
  public function setExternalLink($externalLink)
  {
    $this->externalLink = $externalLink;
  }
  /**
   * @return string
   */
  public function getExternalLink()
  {
    return $this->externalLink;
  }
  /**
   * @param string
   */
  public function setFullText($fullText)
  {
    $this->fullText = $fullText;
  }
  /**
   * @return string
   */
  public function getFullText()
  {
    return $this->fullText;
  }
  /**
   * @param string
   */
  public function setReference($reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return string
   */
  public function getReference()
  {
    return $this->reference;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitCitationData::class, 'Google_Service_Contentwarehouse_NlpSciencelitCitationData');
