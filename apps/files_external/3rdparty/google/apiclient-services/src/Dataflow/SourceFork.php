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

namespace Google\Service\Dataflow;

class SourceFork extends \Google\Model
{
  protected $primaryType = SourceSplitShard::class;
  protected $primaryDataType = '';
  protected $primarySourceType = DerivedSource::class;
  protected $primarySourceDataType = '';
  protected $residualType = SourceSplitShard::class;
  protected $residualDataType = '';
  protected $residualSourceType = DerivedSource::class;
  protected $residualSourceDataType = '';

  /**
   * @param SourceSplitShard
   */
  public function setPrimary(SourceSplitShard $primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return SourceSplitShard
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param DerivedSource
   */
  public function setPrimarySource(DerivedSource $primarySource)
  {
    $this->primarySource = $primarySource;
  }
  /**
   * @return DerivedSource
   */
  public function getPrimarySource()
  {
    return $this->primarySource;
  }
  /**
   * @param SourceSplitShard
   */
  public function setResidual(SourceSplitShard $residual)
  {
    $this->residual = $residual;
  }
  /**
   * @return SourceSplitShard
   */
  public function getResidual()
  {
    return $this->residual;
  }
  /**
   * @param DerivedSource
   */
  public function setResidualSource(DerivedSource $residualSource)
  {
    $this->residualSource = $residualSource;
  }
  /**
   * @return DerivedSource
   */
  public function getResidualSource()
  {
    return $this->residualSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceFork::class, 'Google_Service_Dataflow_SourceFork');
