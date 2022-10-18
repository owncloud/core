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

class NlxDataSchemaCharacter extends \Google\Model
{
  protected $documentType = MultiscalePointerIndex::class;
  protected $documentDataType = '';
  protected $paragraphType = MultiscalePointerIndex::class;
  protected $paragraphDataType = '';
  protected $sentenceType = MultiscalePointerIndex::class;
  protected $sentenceDataType = '';
  /**
   * @var string
   */
  public $text;
  protected $tokenType = MultiscalePointerIndex::class;
  protected $tokenDataType = '';

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
   * @param MultiscalePointerIndex
   */
  public function setSentence(MultiscalePointerIndex $sentence)
  {
    $this->sentence = $sentence;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getSentence()
  {
    return $this->sentence;
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
   * @param MultiscalePointerIndex
   */
  public function setToken(MultiscalePointerIndex $token)
  {
    $this->token = $token;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaCharacter::class, 'Google_Service_Contentwarehouse_NlxDataSchemaCharacter');
