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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2InspectResult extends \Google\Collection
{
  protected $collection_key = 'findings';
  protected $findingsType = GooglePrivacyDlpV2Finding::class;
  protected $findingsDataType = 'array';
  /**
   * @var bool
   */
  public $findingsTruncated;

  /**
   * @param GooglePrivacyDlpV2Finding[]
   */
  public function setFindings($findings)
  {
    $this->findings = $findings;
  }
  /**
   * @return GooglePrivacyDlpV2Finding[]
   */
  public function getFindings()
  {
    return $this->findings;
  }
  /**
   * @param bool
   */
  public function setFindingsTruncated($findingsTruncated)
  {
    $this->findingsTruncated = $findingsTruncated;
  }
  /**
   * @return bool
   */
  public function getFindingsTruncated()
  {
    return $this->findingsTruncated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2InspectResult::class, 'Google_Service_DLP_GooglePrivacyDlpV2InspectResult');
