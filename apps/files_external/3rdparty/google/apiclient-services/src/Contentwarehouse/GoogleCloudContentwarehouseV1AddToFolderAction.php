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

class GoogleCloudContentwarehouseV1AddToFolderAction extends \Google\Collection
{
  protected $collection_key = 'folders';
  /**
   * @var string[]
   */
  public $folders;

  /**
   * @param string[]
   */
  public function setFolders($folders)
  {
    $this->folders = $folders;
  }
  /**
   * @return string[]
   */
  public function getFolders()
  {
    return $this->folders;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1AddToFolderAction::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1AddToFolderAction');
