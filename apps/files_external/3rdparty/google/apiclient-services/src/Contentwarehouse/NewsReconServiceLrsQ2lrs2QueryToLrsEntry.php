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

namespace Google\Service\Contentwarehouse;

class NewsReconServiceLrsQ2lrs2QueryToLrsEntry extends \Google\Collection
{
  protected $collection_key = 'qrefEntities';
  /**
   * @var int
   */
  public $algoVersion;
  /**
   * @var int
   */
  public $entryIndex;
  protected $internalPayloadType = NewsReconServiceLrsQ2lrs2EntryPayload::class;
  protected $internalPayloadDataType = '';
  protected $lrsType = NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity::class;
  protected $lrsDataType = '';
  protected $patternsType = NewsReconServiceLrsQ2lrs2QueryToLrsEntryPattern::class;
  protected $patternsDataType = 'array';
  protected $qrefEntitiesType = NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity::class;
  protected $qrefEntitiesDataType = 'array';

  /**
   * @param int
   */
  public function setAlgoVersion($algoVersion)
  {
    $this->algoVersion = $algoVersion;
  }
  /**
   * @return int
   */
  public function getAlgoVersion()
  {
    return $this->algoVersion;
  }
  /**
   * @param int
   */
  public function setEntryIndex($entryIndex)
  {
    $this->entryIndex = $entryIndex;
  }
  /**
   * @return int
   */
  public function getEntryIndex()
  {
    return $this->entryIndex;
  }
  /**
   * @param NewsReconServiceLrsQ2lrs2EntryPayload
   */
  public function setInternalPayload(NewsReconServiceLrsQ2lrs2EntryPayload $internalPayload)
  {
    $this->internalPayload = $internalPayload;
  }
  /**
   * @return NewsReconServiceLrsQ2lrs2EntryPayload
   */
  public function getInternalPayload()
  {
    return $this->internalPayload;
  }
  /**
   * @param NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity
   */
  public function setLrs(NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity $lrs)
  {
    $this->lrs = $lrs;
  }
  /**
   * @return NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity
   */
  public function getLrs()
  {
    return $this->lrs;
  }
  /**
   * @param NewsReconServiceLrsQ2lrs2QueryToLrsEntryPattern[]
   */
  public function setPatterns($patterns)
  {
    $this->patterns = $patterns;
  }
  /**
   * @return NewsReconServiceLrsQ2lrs2QueryToLrsEntryPattern[]
   */
  public function getPatterns()
  {
    return $this->patterns;
  }
  /**
   * @param NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity[]
   */
  public function setQrefEntities($qrefEntities)
  {
    $this->qrefEntities = $qrefEntities;
  }
  /**
   * @return NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity[]
   */
  public function getQrefEntities()
  {
    return $this->qrefEntities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewsReconServiceLrsQ2lrs2QueryToLrsEntry::class, 'Google_Service_Contentwarehouse_NewsReconServiceLrsQ2lrs2QueryToLrsEntry');
