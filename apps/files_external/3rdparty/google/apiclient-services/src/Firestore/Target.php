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

namespace Google\Service\Firestore;

class Target extends \Google\Model
{
  protected $documentsType = DocumentsTarget::class;
  protected $documentsDataType = '';
  public $once;
  protected $queryType = QueryTarget::class;
  protected $queryDataType = '';
  public $readTime;
  public $resumeToken;
  public $targetId;

  /**
   * @param DocumentsTarget
   */
  public function setDocuments(DocumentsTarget $documents)
  {
    $this->documents = $documents;
  }
  /**
   * @return DocumentsTarget
   */
  public function getDocuments()
  {
    return $this->documents;
  }
  public function setOnce($once)
  {
    $this->once = $once;
  }
  public function getOnce()
  {
    return $this->once;
  }
  /**
   * @param QueryTarget
   */
  public function setQuery(QueryTarget $query)
  {
    $this->query = $query;
  }
  /**
   * @return QueryTarget
   */
  public function getQuery()
  {
    return $this->query;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  public function getTargetId()
  {
    return $this->targetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Target::class, 'Google_Service_Firestore_Target');
