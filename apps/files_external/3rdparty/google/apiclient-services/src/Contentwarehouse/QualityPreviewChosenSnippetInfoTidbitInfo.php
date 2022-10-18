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

class QualityPreviewChosenSnippetInfoTidbitInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $sectionName;
  /**
   * @var string
   */
  public $separator;
  /**
   * @var string
   */
  public $tidbitText;
  /**
   * @var string
   */
  public $tokenBegin;
  /**
   * @var string
   */
  public $tokenEnd;

  /**
   * @param string
   */
  public function setSectionName($sectionName)
  {
    $this->sectionName = $sectionName;
  }
  /**
   * @return string
   */
  public function getSectionName()
  {
    return $this->sectionName;
  }
  /**
   * @param string
   */
  public function setSeparator($separator)
  {
    $this->separator = $separator;
  }
  /**
   * @return string
   */
  public function getSeparator()
  {
    return $this->separator;
  }
  /**
   * @param string
   */
  public function setTidbitText($tidbitText)
  {
    $this->tidbitText = $tidbitText;
  }
  /**
   * @return string
   */
  public function getTidbitText()
  {
    return $this->tidbitText;
  }
  /**
   * @param string
   */
  public function setTokenBegin($tokenBegin)
  {
    $this->tokenBegin = $tokenBegin;
  }
  /**
   * @return string
   */
  public function getTokenBegin()
  {
    return $this->tokenBegin;
  }
  /**
   * @param string
   */
  public function setTokenEnd($tokenEnd)
  {
    $this->tokenEnd = $tokenEnd;
  }
  /**
   * @return string
   */
  public function getTokenEnd()
  {
    return $this->tokenEnd;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewChosenSnippetInfoTidbitInfo::class, 'Google_Service_Contentwarehouse_QualityPreviewChosenSnippetInfoTidbitInfo');
