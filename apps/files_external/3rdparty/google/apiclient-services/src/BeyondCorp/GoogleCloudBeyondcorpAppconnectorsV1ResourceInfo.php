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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo extends \Google\Collection
{
  protected $collection_key = 'sub';
  /**
   * @var string
   */
  public $id;
  /**
   * @var array[]
   */
  public $resource;
  /**
   * @var string
   */
  public $status;
  protected $subType = GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo::class;
  protected $subDataType = 'array';
  /**
   * @var string
   */
  public $time;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param array[]
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return array[]
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo[]
   */
  public function setSub($sub)
  {
    $this->sub = $sub;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo[]
   */
  public function getSub()
  {
    return $this->sub;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectorsV1ResourceInfo');
