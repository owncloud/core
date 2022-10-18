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

class SentenceBoundaryAnnotationsInstance extends \Google\Model
{
  /**
   * @var int
   */
  public $begin;
  /**
   * @var string
   */
  public $cleanText;
  /**
   * @var string
   */
  public $context;
  /**
   * @var int
   */
  public $contextBegin;
  /**
   * @var int
   */
  public $contextEnd;
  /**
   * @var int
   */
  public $end;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var bool
   */
  public $toIndex;

  /**
   * @param int
   */
  public function setBegin($begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return int
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param string
   */
  public function setCleanText($cleanText)
  {
    $this->cleanText = $cleanText;
  }
  /**
   * @return string
   */
  public function getCleanText()
  {
    return $this->cleanText;
  }
  /**
   * @param string
   */
  public function setContext($context)
  {
    $this->context = $context;
  }
  /**
   * @return string
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param int
   */
  public function setContextBegin($contextBegin)
  {
    $this->contextBegin = $contextBegin;
  }
  /**
   * @return int
   */
  public function getContextBegin()
  {
    return $this->contextBegin;
  }
  /**
   * @param int
   */
  public function setContextEnd($contextEnd)
  {
    $this->contextEnd = $contextEnd;
  }
  /**
   * @return int
   */
  public function getContextEnd()
  {
    return $this->contextEnd;
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
   * @param bool
   */
  public function setToIndex($toIndex)
  {
    $this->toIndex = $toIndex;
  }
  /**
   * @return bool
   */
  public function getToIndex()
  {
    return $this->toIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SentenceBoundaryAnnotationsInstance::class, 'Google_Service_Contentwarehouse_SentenceBoundaryAnnotationsInstance');
