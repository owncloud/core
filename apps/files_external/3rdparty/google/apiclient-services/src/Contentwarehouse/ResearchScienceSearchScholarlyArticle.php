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

class ResearchScienceSearchScholarlyArticle extends \Google\Model
{
  protected $citationType = ScienceCitation::class;
  protected $citationDataType = '';
  /**
   * @var string
   */
  public $figureOrTableImage;
  /**
   * @var string
   */
  public $figureOrTableOcrText;
  /**
   * @var string
   */
  public $landingPageUrl;
  /**
   * @var int
   */
  public $pageNumber;
  /**
   * @var string
   */
  public $pdfDownloadUrl;

  /**
   * @param ScienceCitation
   */
  public function setCitation(ScienceCitation $citation)
  {
    $this->citation = $citation;
  }
  /**
   * @return ScienceCitation
   */
  public function getCitation()
  {
    return $this->citation;
  }
  /**
   * @param string
   */
  public function setFigureOrTableImage($figureOrTableImage)
  {
    $this->figureOrTableImage = $figureOrTableImage;
  }
  /**
   * @return string
   */
  public function getFigureOrTableImage()
  {
    return $this->figureOrTableImage;
  }
  /**
   * @param string
   */
  public function setFigureOrTableOcrText($figureOrTableOcrText)
  {
    $this->figureOrTableOcrText = $figureOrTableOcrText;
  }
  /**
   * @return string
   */
  public function getFigureOrTableOcrText()
  {
    return $this->figureOrTableOcrText;
  }
  /**
   * @param string
   */
  public function setLandingPageUrl($landingPageUrl)
  {
    $this->landingPageUrl = $landingPageUrl;
  }
  /**
   * @return string
   */
  public function getLandingPageUrl()
  {
    return $this->landingPageUrl;
  }
  /**
   * @param int
   */
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  /**
   * @return int
   */
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param string
   */
  public function setPdfDownloadUrl($pdfDownloadUrl)
  {
    $this->pdfDownloadUrl = $pdfDownloadUrl;
  }
  /**
   * @return string
   */
  public function getPdfDownloadUrl()
  {
    return $this->pdfDownloadUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchScholarlyArticle::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchScholarlyArticle');
