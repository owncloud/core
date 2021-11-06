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

namespace Google\Service\Books;

class RequestAccessData extends \Google\Model
{
  protected $concurrentAccessType = ConcurrentAccessRestriction::class;
  protected $concurrentAccessDataType = '';
  protected $downloadAccessType = DownloadAccessRestriction::class;
  protected $downloadAccessDataType = '';
  public $kind;

  /**
   * @param ConcurrentAccessRestriction
   */
  public function setConcurrentAccess(ConcurrentAccessRestriction $concurrentAccess)
  {
    $this->concurrentAccess = $concurrentAccess;
  }
  /**
   * @return ConcurrentAccessRestriction
   */
  public function getConcurrentAccess()
  {
    return $this->concurrentAccess;
  }
  /**
   * @param DownloadAccessRestriction
   */
  public function setDownloadAccess(DownloadAccessRestriction $downloadAccess)
  {
    $this->downloadAccess = $downloadAccess;
  }
  /**
   * @return DownloadAccessRestriction
   */
  public function getDownloadAccess()
  {
    return $this->downloadAccess;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestAccessData::class, 'Google_Service_Books_RequestAccessData');
