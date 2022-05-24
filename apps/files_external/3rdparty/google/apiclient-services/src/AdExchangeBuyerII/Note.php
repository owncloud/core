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

namespace Google\Service\AdExchangeBuyerII;

class Note extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creatorRole;
  /**
   * @var string
   */
  public $note;
  /**
   * @var string
   */
  public $noteId;
  /**
   * @var string
   */
  public $proposalRevision;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreatorRole($creatorRole)
  {
    $this->creatorRole = $creatorRole;
  }
  /**
   * @return string
   */
  public function getCreatorRole()
  {
    return $this->creatorRole;
  }
  /**
   * @param string
   */
  public function setNote($note)
  {
    $this->note = $note;
  }
  /**
   * @return string
   */
  public function getNote()
  {
    return $this->note;
  }
  /**
   * @param string
   */
  public function setNoteId($noteId)
  {
    $this->noteId = $noteId;
  }
  /**
   * @return string
   */
  public function getNoteId()
  {
    return $this->noteId;
  }
  /**
   * @param string
   */
  public function setProposalRevision($proposalRevision)
  {
    $this->proposalRevision = $proposalRevision;
  }
  /**
   * @return string
   */
  public function getProposalRevision()
  {
    return $this->proposalRevision;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Note::class, 'Google_Service_AdExchangeBuyerII_Note');
