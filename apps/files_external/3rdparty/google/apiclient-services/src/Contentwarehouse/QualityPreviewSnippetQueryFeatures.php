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

class QualityPreviewSnippetQueryFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $experimentalQueryTitleScore;
  /**
   * @var float
   */
  public $passageembedScore;
  /**
   * @var bool
   */
  public $queryHasPassageembedEmbeddings;
  /**
   * @var float
   */
  public $queryScore;
  /**
   * @var float
   */
  public $radishScore;

  /**
   * @param float
   */
  public function setExperimentalQueryTitleScore($experimentalQueryTitleScore)
  {
    $this->experimentalQueryTitleScore = $experimentalQueryTitleScore;
  }
  /**
   * @return float
   */
  public function getExperimentalQueryTitleScore()
  {
    return $this->experimentalQueryTitleScore;
  }
  /**
   * @param float
   */
  public function setPassageembedScore($passageembedScore)
  {
    $this->passageembedScore = $passageembedScore;
  }
  /**
   * @return float
   */
  public function getPassageembedScore()
  {
    return $this->passageembedScore;
  }
  /**
   * @param bool
   */
  public function setQueryHasPassageembedEmbeddings($queryHasPassageembedEmbeddings)
  {
    $this->queryHasPassageembedEmbeddings = $queryHasPassageembedEmbeddings;
  }
  /**
   * @return bool
   */
  public function getQueryHasPassageembedEmbeddings()
  {
    return $this->queryHasPassageembedEmbeddings;
  }
  /**
   * @param float
   */
  public function setQueryScore($queryScore)
  {
    $this->queryScore = $queryScore;
  }
  /**
   * @return float
   */
  public function getQueryScore()
  {
    return $this->queryScore;
  }
  /**
   * @param float
   */
  public function setRadishScore($radishScore)
  {
    $this->radishScore = $radishScore;
  }
  /**
   * @return float
   */
  public function getRadishScore()
  {
    return $this->radishScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetQueryFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetQueryFeatures');
