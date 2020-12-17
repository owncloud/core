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

class Google_Service_AdMob_ReportFooter extends Google_Collection
{
  protected $collection_key = 'warnings';
  public $matchingRowCount;
  protected $warningsType = 'Google_Service_AdMob_ReportWarning';
  protected $warningsDataType = 'array';

  public function setMatchingRowCount($matchingRowCount)
  {
    $this->matchingRowCount = $matchingRowCount;
  }
  public function getMatchingRowCount()
  {
    return $this->matchingRowCount;
  }
  /**
   * @param Google_Service_AdMob_ReportWarning[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_AdMob_ReportWarning[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
