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

namespace Google\Service\Digitalassetlinks;

class BulkCheckRequest extends \Google\Collection
{
  protected $collection_key = 'statements';
  /**
   * @var bool
   */
  public $allowGoogleInternalDataSources;
  /**
   * @var string
   */
  public $defaultRelation;
  protected $defaultSourceType = Asset::class;
  protected $defaultSourceDataType = '';
  protected $defaultTargetType = Asset::class;
  protected $defaultTargetDataType = '';
  /**
   * @var bool
   */
  public $skipCacheLookup;
  protected $statementsType = StatementTemplate::class;
  protected $statementsDataType = 'array';

  /**
   * @param bool
   */
  public function setAllowGoogleInternalDataSources($allowGoogleInternalDataSources)
  {
    $this->allowGoogleInternalDataSources = $allowGoogleInternalDataSources;
  }
  /**
   * @return bool
   */
  public function getAllowGoogleInternalDataSources()
  {
    return $this->allowGoogleInternalDataSources;
  }
  /**
   * @param string
   */
  public function setDefaultRelation($defaultRelation)
  {
    $this->defaultRelation = $defaultRelation;
  }
  /**
   * @return string
   */
  public function getDefaultRelation()
  {
    return $this->defaultRelation;
  }
  /**
   * @param Asset
   */
  public function setDefaultSource(Asset $defaultSource)
  {
    $this->defaultSource = $defaultSource;
  }
  /**
   * @return Asset
   */
  public function getDefaultSource()
  {
    return $this->defaultSource;
  }
  /**
   * @param Asset
   */
  public function setDefaultTarget(Asset $defaultTarget)
  {
    $this->defaultTarget = $defaultTarget;
  }
  /**
   * @return Asset
   */
  public function getDefaultTarget()
  {
    return $this->defaultTarget;
  }
  /**
   * @param bool
   */
  public function setSkipCacheLookup($skipCacheLookup)
  {
    $this->skipCacheLookup = $skipCacheLookup;
  }
  /**
   * @return bool
   */
  public function getSkipCacheLookup()
  {
    return $this->skipCacheLookup;
  }
  /**
   * @param StatementTemplate[]
   */
  public function setStatements($statements)
  {
    $this->statements = $statements;
  }
  /**
   * @return StatementTemplate[]
   */
  public function getStatements()
  {
    return $this->statements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkCheckRequest::class, 'Google_Service_Digitalassetlinks_BulkCheckRequest');
