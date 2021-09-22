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

namespace Google\Service\OnDemandScanning;

class UpgradeDistribution extends \Google\Collection
{
  protected $collection_key = 'cve';
  public $classification;
  public $cpeUri;
  public $cve;
  public $severity;

  public function setClassification($classification)
  {
    $this->classification = $classification;
  }
  public function getClassification()
  {
    return $this->classification;
  }
  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  public function getCpeUri()
  {
    return $this->cpeUri;
  }
  public function setCve($cve)
  {
    $this->cve = $cve;
  }
  public function getCve()
  {
    return $this->cve;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpgradeDistribution::class, 'Google_Service_OnDemandScanning_UpgradeDistribution');
