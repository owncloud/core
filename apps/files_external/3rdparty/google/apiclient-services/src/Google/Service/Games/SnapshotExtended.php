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

class Google_Service_Games_SnapshotExtended extends Google_Collection
{
  protected $collection_key = 'conflictingRevisions';
  protected $conflictingRevisionsType = 'Google_Service_Games_SnapshotRevision';
  protected $conflictingRevisionsDataType = 'array';
  public $hasConflictingRevisions;
  protected $headRevisionType = 'Google_Service_Games_SnapshotRevision';
  protected $headRevisionDataType = '';
  public $snapshotName;

  /**
   * @param Google_Service_Games_SnapshotRevision[]
   */
  public function setConflictingRevisions($conflictingRevisions)
  {
    $this->conflictingRevisions = $conflictingRevisions;
  }
  /**
   * @return Google_Service_Games_SnapshotRevision[]
   */
  public function getConflictingRevisions()
  {
    return $this->conflictingRevisions;
  }
  public function setHasConflictingRevisions($hasConflictingRevisions)
  {
    $this->hasConflictingRevisions = $hasConflictingRevisions;
  }
  public function getHasConflictingRevisions()
  {
    return $this->hasConflictingRevisions;
  }
  /**
   * @param Google_Service_Games_SnapshotRevision
   */
  public function setHeadRevision(Google_Service_Games_SnapshotRevision $headRevision)
  {
    $this->headRevision = $headRevision;
  }
  /**
   * @return Google_Service_Games_SnapshotRevision
   */
  public function getHeadRevision()
  {
    return $this->headRevision;
  }
  public function setSnapshotName($snapshotName)
  {
    $this->snapshotName = $snapshotName;
  }
  public function getSnapshotName()
  {
    return $this->snapshotName;
  }
}
