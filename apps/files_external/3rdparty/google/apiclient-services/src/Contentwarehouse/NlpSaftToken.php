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

class NlpSaftToken extends \Google\Model
{
  /**
   * @var string
   */
  public $breakLevel;
  /**
   * @var bool
   */
  public $breakSkippedText;
  /**
   * @var string
   */
  public $category;
  /**
   * @var int
   */
  public $end;
  /**
   * @var int
   */
  public $head;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $lemma;
  protected $morphType = NlpSaftMorphology::class;
  protected $morphDataType = '';
  /**
   * @var string
   */
  public $scriptCode;
  /**
   * @var int
   */
  public $start;
  /**
   * @var string
   */
  public $tag;
  /**
   * @var float
   */
  public $tagConfidence;
  /**
   * @var string
   */
  public $textProperties;
  /**
   * @var string
   */
  public $word;

  /**
   * @param string
   */
  public function setBreakLevel($breakLevel)
  {
    $this->breakLevel = $breakLevel;
  }
  /**
   * @return string
   */
  public function getBreakLevel()
  {
    return $this->breakLevel;
  }
  /**
   * @param bool
   */
  public function setBreakSkippedText($breakSkippedText)
  {
    $this->breakSkippedText = $breakSkippedText;
  }
  /**
   * @return bool
   */
  public function getBreakSkippedText()
  {
    return $this->breakSkippedText;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param int
   */
  public function setEnd($end)
  {
    $this->end = $end;
  }
  /**
   * @return int
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param int
   */
  public function setHead($head)
  {
    $this->head = $head;
  }
  /**
   * @return int
   */
  public function getHead()
  {
    return $this->head;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
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
   * @param NlpSaftMorphology
   */
  public function setMorph(NlpSaftMorphology $morph)
  {
    $this->morph = $morph;
  }
  /**
   * @return NlpSaftMorphology
   */
  public function getMorph()
  {
    return $this->morph;
  }
  /**
   * @param string
   */
  public function setScriptCode($scriptCode)
  {
    $this->scriptCode = $scriptCode;
  }
  /**
   * @return string
   */
  public function getScriptCode()
  {
    return $this->scriptCode;
  }
  /**
   * @param int
   */
  public function setStart($start)
  {
    $this->start = $start;
  }
  /**
   * @return int
   */
  public function getStart()
  {
    return $this->start;
  }
  /**
   * @param string
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param float
   */
  public function setTagConfidence($tagConfidence)
  {
    $this->tagConfidence = $tagConfidence;
  }
  /**
   * @return float
   */
  public function getTagConfidence()
  {
    return $this->tagConfidence;
  }
  /**
   * @param string
   */
  public function setTextProperties($textProperties)
  {
    $this->textProperties = $textProperties;
  }
  /**
   * @return string
   */
  public function getTextProperties()
  {
    return $this->textProperties;
  }
  /**
   * @param string
   */
  public function setWord($word)
  {
    $this->word = $word;
  }
  /**
   * @return string
   */
  public function getWord()
  {
    return $this->word;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftToken::class, 'Google_Service_Contentwarehouse_NlpSaftToken');
