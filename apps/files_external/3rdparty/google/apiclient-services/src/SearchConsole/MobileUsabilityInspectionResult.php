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

namespace Google\Service\SearchConsole;

class MobileUsabilityInspectionResult extends \Google\Collection
{
  protected $collection_key = 'issues';
  protected $issuesType = MobileUsabilityIssue::class;
  protected $issuesDataType = 'array';
  /**
   * @var string
   */
  public $verdict;

  /**
   * @param MobileUsabilityIssue[]
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return MobileUsabilityIssue[]
   */
  public function getIssues()
  {
    return $this->issues;
  }
  /**
   * @param string
   */
  public function setVerdict($verdict)
  {
    $this->verdict = $verdict;
  }
  /**
   * @return string
   */
  public function getVerdict()
  {
    return $this->verdict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobileUsabilityInspectionResult::class, 'Google_Service_SearchConsole_MobileUsabilityInspectionResult');
