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

class Google_Service_AdMob_GenerateNetworkReportResponse extends Google_Model
{
  protected $footerType = 'Google_Service_AdMob_ReportFooter';
  protected $footerDataType = '';
  protected $headerType = 'Google_Service_AdMob_ReportHeader';
  protected $headerDataType = '';
  protected $rowType = 'Google_Service_AdMob_ReportRow';
  protected $rowDataType = '';

  /**
   * @param Google_Service_AdMob_ReportFooter
   */
  public function setFooter(Google_Service_AdMob_ReportFooter $footer)
  {
    $this->footer = $footer;
  }
  /**
   * @return Google_Service_AdMob_ReportFooter
   */
  public function getFooter()
  {
    return $this->footer;
  }
  /**
   * @param Google_Service_AdMob_ReportHeader
   */
  public function setHeader(Google_Service_AdMob_ReportHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_AdMob_ReportHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param Google_Service_AdMob_ReportRow
   */
  public function setRow(Google_Service_AdMob_ReportRow $row)
  {
    $this->row = $row;
  }
  /**
   * @return Google_Service_AdMob_ReportRow
   */
  public function getRow()
  {
    return $this->row;
  }
}
