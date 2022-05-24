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

namespace Google\Service\Bigquery;

class GoogleSheetsOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $range;
  /**
   * @var string
   */
  public $skipLeadingRows;

  /**
   * @param string
   */
  public function setRange($range)
  {
    $this->range = $range;
  }
  /**
   * @return string
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param string
   */
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  /**
   * @return string
   */
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSheetsOptions::class, 'Google_Service_Bigquery_GoogleSheetsOptions');
