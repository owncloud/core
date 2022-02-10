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

class GooglePrivacyDlpV2HybridInspectStatistics extends \Google\Model
{
  /**
   * @var string
   */
  public $abortedCount;
  /**
   * @var string
   */
  public $pendingCount;
  /**
   * @var string
   */
  public $processedCount;

  /**
   * @param string
   */
  public function setAbortedCount($abortedCount)
  {
    $this->abortedCount = $abortedCount;
  }
  /**
   * @return string
   */
  public function getAbortedCount()
  {
    return $this->abortedCount;
  }
  /**
   * @param string
   */
  public function setPendingCount($pendingCount)
  {
    $this->pendingCount = $pendingCount;
  }
  /**
   * @return string
   */
  public function getPendingCount()
  {
    return $this->pendingCount;
  }
  /**
   * @param string
   */
  public function setProcessedCount($processedCount)
  {
    $this->processedCount = $processedCount;
  }
  /**
   * @return string
   */
  public function getProcessedCount()
  {
    return $this->processedCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2HybridInspectStatistics::class, 'Google_Service_DLP_GooglePrivacyDlpV2HybridInspectStatistics');
