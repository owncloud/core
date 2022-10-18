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

class NlxDataSchemaSentence extends \Google\Model
{
  protected $bytesType = MultiscalePointerSpan::class;
  protected $bytesDataType = '';
  protected $charactersType = MultiscalePointerSpan::class;
  protected $charactersDataType = '';
  protected $documentType = MultiscalePointerIndex::class;
  protected $documentDataType = '';
  protected $paragraphType = MultiscalePointerIndex::class;
  protected $paragraphDataType = '';
  /**
   * @var string
   */
  public $text;
  protected $tokensType = MultiscalePointerSpan::class;
  protected $tokensDataType = '';

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
   * @param MultiscalePointerIndex
   */
  public function setDocument(MultiscalePointerIndex $document)
  {
    $this->document = $document;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param MultiscalePointerIndex
   */
  public function setParagraph(MultiscalePointerIndex $paragraph)
  {
    $this->paragraph = $paragraph;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getParagraph()
  {
    return $this->paragraph;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaSentence::class, 'Google_Service_Contentwarehouse_NlxDataSchemaSentence');
