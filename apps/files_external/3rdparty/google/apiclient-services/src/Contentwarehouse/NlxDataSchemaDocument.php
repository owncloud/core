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

class NlxDataSchemaDocument extends \Google\Collection
{
  protected $collection_key = 'languageCode';
  protected $authorType = MultiscalePointerIndex::class;
  protected $authorDataType = 'array';
  protected $bytesType = MultiscalePointerSpan::class;
  protected $bytesDataType = '';
  protected $charactersType = MultiscalePointerSpan::class;
  protected $charactersDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $languageCode;
  protected $languageSpansType = MultiscalePointerSpan::class;
  protected $languageSpansDataType = '';
  protected $mentionsType = MultiscalePointerSpan::class;
  protected $mentionsDataType = '';
  protected $paragraphsType = MultiscalePointerSpan::class;
  protected $paragraphsDataType = '';
  protected $sentencesType = MultiscalePointerSpan::class;
  protected $sentencesDataType = '';
  /**
   * @var string
   */
  public $text;
  protected $tokensType = MultiscalePointerSpan::class;
  protected $tokensDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param MultiscalePointerIndex[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return MultiscalePointerIndex[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setBytes(MultiscalePointerSpan $bytes)
  {
    $this->bytes = $bytes;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getBytes()
  {
    return $this->bytes;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setCharacters(MultiscalePointerSpan $characters)
  {
    $this->characters = $characters;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getCharacters()
  {
    return $this->characters;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string[]
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setLanguageSpans(MultiscalePointerSpan $languageSpans)
  {
    $this->languageSpans = $languageSpans;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getLanguageSpans()
  {
    return $this->languageSpans;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setMentions(MultiscalePointerSpan $mentions)
  {
    $this->mentions = $mentions;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getMentions()
  {
    return $this->mentions;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setParagraphs(MultiscalePointerSpan $paragraphs)
  {
    $this->paragraphs = $paragraphs;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getParagraphs()
  {
    return $this->paragraphs;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setSentences(MultiscalePointerSpan $sentences)
  {
    $this->sentences = $sentences;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getSentences()
  {
    return $this->sentences;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setTokens(MultiscalePointerSpan $tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaDocument::class, 'Google_Service_Contentwarehouse_NlxDataSchemaDocument');
