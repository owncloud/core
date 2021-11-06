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

namespace Google\Service\Docs;

class Response extends \Google\Model
{
  protected $createFooterType = CreateFooterResponse::class;
  protected $createFooterDataType = '';
  protected $createFootnoteType = CreateFootnoteResponse::class;
  protected $createFootnoteDataType = '';
  protected $createHeaderType = CreateHeaderResponse::class;
  protected $createHeaderDataType = '';
  protected $createNamedRangeType = CreateNamedRangeResponse::class;
  protected $createNamedRangeDataType = '';
  protected $insertInlineImageType = InsertInlineImageResponse::class;
  protected $insertInlineImageDataType = '';
  protected $insertInlineSheetsChartType = InsertInlineSheetsChartResponse::class;
  protected $insertInlineSheetsChartDataType = '';
  protected $replaceAllTextType = ReplaceAllTextResponse::class;
  protected $replaceAllTextDataType = '';

  /**
   * @param CreateFooterResponse
   */
  public function setCreateFooter(CreateFooterResponse $createFooter)
  {
    $this->createFooter = $createFooter;
  }
  /**
   * @return CreateFooterResponse
   */
  public function getCreateFooter()
  {
    return $this->createFooter;
  }
  /**
   * @param CreateFootnoteResponse
   */
  public function setCreateFootnote(CreateFootnoteResponse $createFootnote)
  {
    $this->createFootnote = $createFootnote;
  }
  /**
   * @return CreateFootnoteResponse
   */
  public function getCreateFootnote()
  {
    return $this->createFootnote;
  }
  /**
   * @param CreateHeaderResponse
   */
  public function setCreateHeader(CreateHeaderResponse $createHeader)
  {
    $this->createHeader = $createHeader;
  }
  /**
   * @return CreateHeaderResponse
   */
  public function getCreateHeader()
  {
    return $this->createHeader;
  }
  /**
   * @param CreateNamedRangeResponse
   */
  public function setCreateNamedRange(CreateNamedRangeResponse $createNamedRange)
  {
    $this->createNamedRange = $createNamedRange;
  }
  /**
   * @return CreateNamedRangeResponse
   */
  public function getCreateNamedRange()
  {
    return $this->createNamedRange;
  }
  /**
   * @param InsertInlineImageResponse
   */
  public function setInsertInlineImage(InsertInlineImageResponse $insertInlineImage)
  {
    $this->insertInlineImage = $insertInlineImage;
  }
  /**
   * @return InsertInlineImageResponse
   */
  public function getInsertInlineImage()
  {
    return $this->insertInlineImage;
  }
  /**
   * @param InsertInlineSheetsChartResponse
   */
  public function setInsertInlineSheetsChart(InsertInlineSheetsChartResponse $insertInlineSheetsChart)
  {
    $this->insertInlineSheetsChart = $insertInlineSheetsChart;
  }
  /**
   * @return InsertInlineSheetsChartResponse
   */
  public function getInsertInlineSheetsChart()
  {
    return $this->insertInlineSheetsChart;
  }
  /**
   * @param ReplaceAllTextResponse
   */
  public function setReplaceAllText(ReplaceAllTextResponse $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return ReplaceAllTextResponse
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Response::class, 'Google_Service_Docs_Response');
