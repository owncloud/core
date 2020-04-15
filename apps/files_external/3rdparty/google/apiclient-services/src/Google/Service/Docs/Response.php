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

class Google_Service_Docs_Response extends Google_Model
{
  protected $createFooterType = 'Google_Service_Docs_CreateFooterResponse';
  protected $createFooterDataType = '';
  protected $createFootnoteType = 'Google_Service_Docs_CreateFootnoteResponse';
  protected $createFootnoteDataType = '';
  protected $createHeaderType = 'Google_Service_Docs_CreateHeaderResponse';
  protected $createHeaderDataType = '';
  protected $createNamedRangeType = 'Google_Service_Docs_CreateNamedRangeResponse';
  protected $createNamedRangeDataType = '';
  protected $insertInlineImageType = 'Google_Service_Docs_InsertInlineImageResponse';
  protected $insertInlineImageDataType = '';
  protected $insertInlineSheetsChartType = 'Google_Service_Docs_InsertInlineSheetsChartResponse';
  protected $insertInlineSheetsChartDataType = '';
  protected $replaceAllTextType = 'Google_Service_Docs_ReplaceAllTextResponse';
  protected $replaceAllTextDataType = '';

  /**
   * @param Google_Service_Docs_CreateFooterResponse
   */
  public function setCreateFooter(Google_Service_Docs_CreateFooterResponse $createFooter)
  {
    $this->createFooter = $createFooter;
  }
  /**
   * @return Google_Service_Docs_CreateFooterResponse
   */
  public function getCreateFooter()
  {
    return $this->createFooter;
  }
  /**
   * @param Google_Service_Docs_CreateFootnoteResponse
   */
  public function setCreateFootnote(Google_Service_Docs_CreateFootnoteResponse $createFootnote)
  {
    $this->createFootnote = $createFootnote;
  }
  /**
   * @return Google_Service_Docs_CreateFootnoteResponse
   */
  public function getCreateFootnote()
  {
    return $this->createFootnote;
  }
  /**
   * @param Google_Service_Docs_CreateHeaderResponse
   */
  public function setCreateHeader(Google_Service_Docs_CreateHeaderResponse $createHeader)
  {
    $this->createHeader = $createHeader;
  }
  /**
   * @return Google_Service_Docs_CreateHeaderResponse
   */
  public function getCreateHeader()
  {
    return $this->createHeader;
  }
  /**
   * @param Google_Service_Docs_CreateNamedRangeResponse
   */
  public function setCreateNamedRange(Google_Service_Docs_CreateNamedRangeResponse $createNamedRange)
  {
    $this->createNamedRange = $createNamedRange;
  }
  /**
   * @return Google_Service_Docs_CreateNamedRangeResponse
   */
  public function getCreateNamedRange()
  {
    return $this->createNamedRange;
  }
  /**
   * @param Google_Service_Docs_InsertInlineImageResponse
   */
  public function setInsertInlineImage(Google_Service_Docs_InsertInlineImageResponse $insertInlineImage)
  {
    $this->insertInlineImage = $insertInlineImage;
  }
  /**
   * @return Google_Service_Docs_InsertInlineImageResponse
   */
  public function getInsertInlineImage()
  {
    return $this->insertInlineImage;
  }
  /**
   * @param Google_Service_Docs_InsertInlineSheetsChartResponse
   */
  public function setInsertInlineSheetsChart(Google_Service_Docs_InsertInlineSheetsChartResponse $insertInlineSheetsChart)
  {
    $this->insertInlineSheetsChart = $insertInlineSheetsChart;
  }
  /**
   * @return Google_Service_Docs_InsertInlineSheetsChartResponse
   */
  public function getInsertInlineSheetsChart()
  {
    return $this->insertInlineSheetsChart;
  }
  /**
   * @param Google_Service_Docs_ReplaceAllTextResponse
   */
  public function setReplaceAllText(Google_Service_Docs_ReplaceAllTextResponse $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return Google_Service_Docs_ReplaceAllTextResponse
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
}
