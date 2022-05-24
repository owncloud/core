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

namespace Google\Service\Vault;

class ExportStats extends \Google\Model
{
  /**
   * @var string
   */
  public $exportedArtifactCount;
  /**
   * @var string
   */
  public $sizeInBytes;
  /**
   * @var string
   */
  public $totalArtifactCount;

  /**
   * @param string
   */
  public function setExportedArtifactCount($exportedArtifactCount)
  {
    $this->exportedArtifactCount = $exportedArtifactCount;
  }
  /**
   * @return string
   */
  public function getExportedArtifactCount()
  {
    return $this->exportedArtifactCount;
  }
  /**
   * @param string
   */
  public function setSizeInBytes($sizeInBytes)
  {
    $this->sizeInBytes = $sizeInBytes;
  }
  /**
   * @return string
   */
  public function getSizeInBytes()
  {
    return $this->sizeInBytes;
  }
  /**
   * @param string
   */
  public function setTotalArtifactCount($totalArtifactCount)
  {
    $this->totalArtifactCount = $totalArtifactCount;
  }
  /**
   * @return string
   */
  public function getTotalArtifactCount()
  {
    return $this->totalArtifactCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExportStats::class, 'Google_Service_Vault_ExportStats');
