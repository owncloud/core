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

namespace Google\Service\BackupforGKE;

class ListVolumeRestoresResponse extends \Google\Collection
{
  protected $collection_key = 'volumeRestores';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $volumeRestoresType = VolumeRestore::class;
  protected $volumeRestoresDataType = 'array';

  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param VolumeRestore[]
   */
  public function setVolumeRestores($volumeRestores)
  {
    $this->volumeRestores = $volumeRestores;
  }
  /**
   * @return VolumeRestore[]
   */
  public function getVolumeRestores()
  {
    return $this->volumeRestores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListVolumeRestoresResponse::class, 'Google_Service_BackupforGKE_ListVolumeRestoresResponse');
