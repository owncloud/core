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

namespace Google\Service\DataprocMetastore;

class MetadataManagementActivity extends \Google\Collection
{
  protected $collection_key = 'restores';
  protected $metadataExportsType = MetadataExport::class;
  protected $metadataExportsDataType = 'array';
  protected $restoresType = Restore::class;
  protected $restoresDataType = 'array';

  /**
   * @param MetadataExport[]
   */
  public function setMetadataExports($metadataExports)
  {
    $this->metadataExports = $metadataExports;
  }
  /**
   * @return MetadataExport[]
   */
  public function getMetadataExports()
  {
    return $this->metadataExports;
  }
  /**
   * @param Restore[]
   */
  public function setRestores($restores)
  {
    $this->restores = $restores;
  }
  /**
   * @return Restore[]
   */
  public function getRestores()
  {
    return $this->restores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetadataManagementActivity::class, 'Google_Service_DataprocMetastore_MetadataManagementActivity');
