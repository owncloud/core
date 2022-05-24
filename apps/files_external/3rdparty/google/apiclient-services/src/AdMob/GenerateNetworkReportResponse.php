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

namespace Google\Service\AdMob;

class GenerateNetworkReportResponse extends \Google\Model
{
  protected $footerType = ReportFooter::class;
  protected $footerDataType = '';
  protected $headerType = ReportHeader::class;
  protected $headerDataType = '';
  protected $rowType = ReportRow::class;
  protected $rowDataType = '';

  /**
   * @param ReportFooter
   */
  public function setFooter(ReportFooter $footer)
  {
    $this->footer = $footer;
  }
  /**
   * @return ReportFooter
   */
  public function getFooter()
  {
    return $this->footer;
  }
  /**
   * @param ReportHeader
   */
  public function setHeader(ReportHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return ReportHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param ReportRow
   */
  public function setRow(ReportRow $row)
  {
    $this->row = $row;
  }
  /**
   * @return ReportRow
   */
  public function getRow()
  {
    return $this->row;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GenerateNetworkReportResponse::class, 'Google_Service_AdMob_GenerateNetworkReportResponse');
