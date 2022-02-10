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

namespace Google\Service\Storage;

class RewriteResponse extends \Google\Model
{
  /**
   * @var bool
   */
  public $done;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $objectSize;
  protected $resourceType = StorageObject::class;
  protected $resourceDataType = '';
  /**
   * @var string
   */
  public $rewriteToken;
  /**
   * @var string
   */
  public $totalBytesRewritten;

  /**
   * @param bool
   */
  public function setDone($done)
  {
    $this->done = $done;
  }
  /**
   * @return bool
   */
  public function getDone()
  {
    return $this->done;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setObjectSize($objectSize)
  {
    $this->objectSize = $objectSize;
  }
  /**
   * @return string
   */
  public function getObjectSize()
  {
    return $this->objectSize;
  }
  /**
   * @param StorageObject
   */
  public function setResource(StorageObject $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return StorageObject
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setRewriteToken($rewriteToken)
  {
    $this->rewriteToken = $rewriteToken;
  }
  /**
   * @return string
   */
  public function getRewriteToken()
  {
    return $this->rewriteToken;
  }
  /**
   * @param string
   */
  public function setTotalBytesRewritten($totalBytesRewritten)
  {
    $this->totalBytesRewritten = $totalBytesRewritten;
  }
  /**
   * @return string
   */
  public function getTotalBytesRewritten()
  {
    return $this->totalBytesRewritten;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RewriteResponse::class, 'Google_Service_Storage_RewriteResponse');
