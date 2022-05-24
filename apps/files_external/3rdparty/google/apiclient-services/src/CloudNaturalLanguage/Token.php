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

namespace Google\Service\CloudNaturalLanguage;

class Token extends \Google\Model
{
  protected $dependencyEdgeType = DependencyEdge::class;
  protected $dependencyEdgeDataType = '';
  /**
   * @var string
   */
  public $lemma;
  protected $partOfSpeechType = PartOfSpeech::class;
  protected $partOfSpeechDataType = '';
  protected $textType = TextSpan::class;
  protected $textDataType = '';

  /**
   * @param DependencyEdge
   */
  public function setDependencyEdge(DependencyEdge $dependencyEdge)
  {
    $this->dependencyEdge = $dependencyEdge;
  }
  /**
   * @return DependencyEdge
   */
  public function getDependencyEdge()
  {
    return $this->dependencyEdge;
  }
  /**
   * @param string
   */
  public function setLemma($lemma)
  {
    $this->lemma = $lemma;
  }
  /**
   * @return string
   */
  public function getLemma()
  {
    return $this->lemma;
  }
  /**
   * @param PartOfSpeech
   */
  public function setPartOfSpeech(PartOfSpeech $partOfSpeech)
  {
    $this->partOfSpeech = $partOfSpeech;
  }
  /**
   * @return PartOfSpeech
   */
  public function getPartOfSpeech()
  {
    return $this->partOfSpeech;
  }
  /**
   * @param TextSpan
   */
  public function setText(TextSpan $text)
  {
    $this->text = $text;
  }
  /**
   * @return TextSpan
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Token::class, 'Google_Service_CloudNaturalLanguage_Token');
