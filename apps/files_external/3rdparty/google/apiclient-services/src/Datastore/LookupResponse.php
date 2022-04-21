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

namespace Google\Service\Datastore;

class LookupResponse extends \Google\Collection
{
  protected $collection_key = 'missing';
  protected $deferredType = Key::class;
  protected $deferredDataType = 'array';
  protected $foundType = EntityResult::class;
  protected $foundDataType = 'array';
  protected $missingType = EntityResult::class;
  protected $missingDataType = 'array';
  /**
   * @var string
   */
  public $readTime;

  /**
   * @param Key[]
   */
  public function setDeferred($deferred)
  {
    $this->deferred = $deferred;
  }
  /**
   * @return Key[]
   */
  public function getDeferred()
  {
    return $this->deferred;
  }
  /**
   * @param EntityResult[]
   */
  public function setFound($found)
  {
    $this->found = $found;
  }
  /**
   * @return EntityResult[]
   */
  public function getFound()
  {
    return $this->found;
  }
  /**
   * @param EntityResult[]
   */
  public function setMissing($missing)
  {
    $this->missing = $missing;
  }
  /**
   * @return EntityResult[]
   */
  public function getMissing()
  {
    return $this->missing;
  }
  /**
   * @param string
   */
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  /**
   * @return string
   */
  public function getReadTime()
  {
    return $this->readTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LookupResponse::class, 'Google_Service_Datastore_LookupResponse');
