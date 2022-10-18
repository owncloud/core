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

class RepositoryAnnotationsMustangSentimentSnippetAnnotations extends \Google\Model
{
  /**
   * @var float
   */
  public $deprecatedMagnitude;
  /**
   * @var float
   */
  public $deprecatedPolarity;
  /**
   * @var int
   */
  public $end;
  /**
   * @var bool
   */
  public $isTruncated;
  /**
   * @var string
   */
  public $phraseType;
  /**
   * @var int
   */
  public $snippetScore;
  /**
   * @var string
   */
  public $snippetText;
  /**
   * @var int
   */
  public $start;

  /**
   * @param float
   */
  public function setDeprecatedMagnitude($deprecatedMagnitude)
  {
    $this->deprecatedMagnitude = $deprecatedMagnitude;
  }
  /**
   * @return float
   */
  public function getDeprecatedMagnitude()
  {
    return $this->deprecatedMagnitude;
  }
  /**
   * @param float
   */
  public function setDeprecatedPolarity($deprecatedPolarity)
  {
    $this->deprecatedPolarity = $deprecatedPolarity;
  }
  /**
   * @return float
   */
  public function getDeprecatedPolarity()
  {
    return $this->deprecatedPolarity;
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
   * @param bool
   */
  public function setIsTruncated($isTruncated)
  {
    $this->isTruncated = $isTruncated;
  }
  /**
   * @return bool
   */
  public function getIsTruncated()
  {
    return $this->isTruncated;
  }
  /**
   * @param string
   */
  public function setPhraseType($phraseType)
  {
    $this->phraseType = $phraseType;
  }
  /**
   * @return string
   */
  public function getPhraseType()
  {
    return $this->phraseType;
  }
  /**
   * @param int
   */
  public function setSnippetScore($snippetScore)
  {
    $this->snippetScore = $snippetScore;
  }
  /**
   * @return int
   */
  public function getSnippetScore()
  {
    return $this->snippetScore;
  }
  /**
   * @param string
   */
  public function setSnippetText($snippetText)
  {
    $this->snippetText = $snippetText;
  }
  /**
   * @return string
   */
  public function getSnippetText()
  {
    return $this->snippetText;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryAnnotationsMustangSentimentSnippetAnnotations::class, 'Google_Service_Contentwarehouse_RepositoryAnnotationsMustangSentimentSnippetAnnotations');
