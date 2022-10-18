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

class GoogleCloudContentwarehouseV1RemoveFromFolderAction extends \Google\Model
{
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $folder;

  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param string
   */
  public function setFolder($folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return string
   */
  public function getFolder()
  {
    return $this->folder;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1RemoveFromFolderAction::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1RemoveFromFolderAction');
