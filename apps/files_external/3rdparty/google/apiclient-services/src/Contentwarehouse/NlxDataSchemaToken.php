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

class NlxDataSchemaToken extends \Google\Model
{
  protected $bytesType = MultiscalePointerSpan::class;
  protected $bytesDataType = '';
  protected $charactersType = MultiscalePointerSpan::class;
  protected $charactersDataType = '';
  protected $dependencyType = NlxDataSchemaTokenDependencyEdge::class;
  protected $dependencyDataType = '';
  protected $dependencyHeadType = MultiscalePointerIndex::class;
  protected $dependencyHeadDataType = '';
  /**
   * @var string
   */
  public $dependencyLabel;
  protected $documentType = MultiscalePointerIndex::class;
  protected $documentDataType = '';
  protected $paragraphType = MultiscalePointerIndex::class;
  protected $paragraphDataType = '';
  /**
   * @var string
   */
  public $pos;
  protected $sentenceType = MultiscalePointerIndex::class;
  protected $sentenceDataType = '';
  /**
   * @var string
   */
  public $text;

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
   * @param NlxDataSchemaTokenDependencyEdge
   */
  public function setDependency(NlxDataSchemaTokenDependencyEdge $dependency)
  {
    $this->dependency = $dependency;
  }
  /**
   * @return NlxDataSchemaTokenDependencyEdge
   */
  public function getDependency()
  {
    return $this->dependency;
  }
  /**
   * @param MultiscalePointerIndex
   */
  public function setDependencyHead(MultiscalePointerIndex $dependencyHead)
  {
    $this->dependencyHead = $dependencyHead;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getDependencyHead()
  {
    return $this->dependencyHead;
  }
  /**
   * @param string
   */
  public function setDependencyLabel($dependencyLabel)
  {
    $this->dependencyLabel = $dependencyLabel;
  }
  /**
   * @return string
   */
  public function getDependencyLabel()
  {
    return $this->dependencyLabel;
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
  public function setPos($pos)
  {
    $this->pos = $pos;
  }
  /**
   * @return string
   */
  public function getPos()
  {
    return $this->pos;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaToken::class, 'Google_Service_Contentwarehouse_NlxDataSchemaToken');
