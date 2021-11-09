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

namespace Google\Service\ContainerAnalysis;

class ComplianceNote extends \Google\Collection
{
  protected $collection_key = 'version';
  protected $cisBenchmarkType = CisBenchmark::class;
  protected $cisBenchmarkDataType = '';
  public $description;
  public $rationale;
  public $remediation;
  public $scanInstructions;
  public $title;
  protected $versionType = ComplianceVersion::class;
  protected $versionDataType = 'array';

  /**
   * @param CisBenchmark
   */
  public function setCisBenchmark(CisBenchmark $cisBenchmark)
  {
    $this->cisBenchmark = $cisBenchmark;
  }
  /**
   * @return CisBenchmark
   */
  public function getCisBenchmark()
  {
    return $this->cisBenchmark;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setRationale($rationale)
  {
    $this->rationale = $rationale;
  }
  public function getRationale()
  {
    return $this->rationale;
  }
  public function setRemediation($remediation)
  {
    $this->remediation = $remediation;
  }
  public function getRemediation()
  {
    return $this->remediation;
  }
  public function setScanInstructions($scanInstructions)
  {
    $this->scanInstructions = $scanInstructions;
  }
  public function getScanInstructions()
  {
    return $this->scanInstructions;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param ComplianceVersion[]
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return ComplianceVersion[]
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ComplianceNote::class, 'Google_Service_ContainerAnalysis_ComplianceNote');
