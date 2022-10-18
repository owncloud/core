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

class GoogleCloudContentwarehouseV1MergeFieldsOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $replaceMessageFields;
  /**
   * @var bool
   */
  public $replaceRepeatedFields;

  /**
   * @param bool
   */
  public function setReplaceMessageFields($replaceMessageFields)
  {
    $this->replaceMessageFields = $replaceMessageFields;
  }
  /**
   * @return bool
   */
  public function getReplaceMessageFields()
  {
    return $this->replaceMessageFields;
  }
  /**
   * @param bool
   */
  public function setReplaceRepeatedFields($replaceRepeatedFields)
  {
    $this->replaceRepeatedFields = $replaceRepeatedFields;
  }
  /**
   * @return bool
   */
  public function getReplaceRepeatedFields()
  {
    return $this->replaceRepeatedFields;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1MergeFieldsOptions::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1MergeFieldsOptions');
