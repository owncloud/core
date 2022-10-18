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

class QualityPreviewChosenSnippetInfo extends \Google\Collection
{
  protected $collection_key = 'tidbits';
  /**
   * @var bool
   */
  public $isVulgar;
  /**
   * @var string
   */
  public $leadingTextType;
  /**
   * @var string
   */
  public $snippetType;
  /**
   * @var string
   */
  public $source;
  protected $tidbitsType = QualityPreviewChosenSnippetInfoTidbitInfo::class;
  protected $tidbitsDataType = 'array';
  /**
   * @var bool
   */
  public $trailingEllipsis;

  /**
   * @param bool
   */
  public function setIsVulgar($isVulgar)
  {
    $this->isVulgar = $isVulgar;
  }
  /**
   * @return bool
   */
  public function getIsVulgar()
  {
    return $this->isVulgar;
  }
  /**
   * @param string
   */
  public function setLeadingTextType($leadingTextType)
  {
    $this->leadingTextType = $leadingTextType;
  }
  /**
   * @return string
   */
  public function getLeadingTextType()
  {
    return $this->leadingTextType;
  }
  /**
   * @param string
   */
  public function setSnippetType($snippetType)
  {
    $this->snippetType = $snippetType;
  }
  /**
   * @return string
   */
  public function getSnippetType()
  {
    return $this->snippetType;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param QualityPreviewChosenSnippetInfoTidbitInfo[]
   */
  public function setTidbits($tidbits)
  {
    $this->tidbits = $tidbits;
  }
  /**
   * @return QualityPreviewChosenSnippetInfoTidbitInfo[]
   */
  public function getTidbits()
  {
    return $this->tidbits;
  }
  /**
   * @param bool
   */
  public function setTrailingEllipsis($trailingEllipsis)
  {
    $this->trailingEllipsis = $trailingEllipsis;
  }
  /**
   * @return bool
   */
  public function getTrailingEllipsis()
  {
    return $this->trailingEllipsis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewChosenSnippetInfo::class, 'Google_Service_Contentwarehouse_QualityPreviewChosenSnippetInfo');
