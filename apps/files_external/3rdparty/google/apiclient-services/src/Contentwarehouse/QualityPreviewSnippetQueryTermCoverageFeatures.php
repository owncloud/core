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

class QualityPreviewSnippetQueryTermCoverageFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $snippetQueryTermCoverage;
  /**
   * @var float
   */
  public $titleQueryTermCoverage;
  /**
   * @var float
   */
  public $titleSnippetQueryTermCoverage;

  /**
   * @param float
   */
  public function setSnippetQueryTermCoverage($snippetQueryTermCoverage)
  {
    $this->snippetQueryTermCoverage = $snippetQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getSnippetQueryTermCoverage()
  {
    return $this->snippetQueryTermCoverage;
  }
  /**
   * @param float
   */
  public function setTitleQueryTermCoverage($titleQueryTermCoverage)
  {
    $this->titleQueryTermCoverage = $titleQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getTitleQueryTermCoverage()
  {
    return $this->titleQueryTermCoverage;
  }
  /**
   * @param float
   */
  public function setTitleSnippetQueryTermCoverage($titleSnippetQueryTermCoverage)
  {
    $this->titleSnippetQueryTermCoverage = $titleSnippetQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getTitleSnippetQueryTermCoverage()
  {
    return $this->titleSnippetQueryTermCoverage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetQueryTermCoverageFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetQueryTermCoverageFeatures');
