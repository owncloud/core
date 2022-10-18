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

class SnippetsLeadingtextLeadingTextAnnotationPiece extends \Google\Model
{
  /**
   * @var int
   */
  public $begin;
  /**
   * @var string
   */
  public $beginText;
  /**
   * @var int
   */
  public $end;
  /**
   * @var string
   */
  public $endText;
  /**
   * @var string
   */
  public $matchedPattern;

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
  public function setBeginText($beginText)
  {
    $this->beginText = $beginText;
  }
  /**
   * @return string
   */
  public function getBeginText()
  {
    return $this->beginText;
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
   * @param string
   */
  public function setEndText($endText)
  {
    $this->endText = $endText;
  }
  /**
   * @return string
   */
  public function getEndText()
  {
    return $this->endText;
  }
  /**
   * @param string
   */
  public function setMatchedPattern($matchedPattern)
  {
    $this->matchedPattern = $matchedPattern;
  }
  /**
   * @return string
   */
  public function getMatchedPattern()
  {
    return $this->matchedPattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnippetsLeadingtextLeadingTextAnnotationPiece::class, 'Google_Service_Contentwarehouse_SnippetsLeadingtextLeadingTextAnnotationPiece');
