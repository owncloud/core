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

namespace Google\Service\SQLAdmin;

class ImportContextBakImportOptionsEncryptionOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $certPath;
  /**
   * @var string
   */
  public $pvkPassword;
  /**
   * @var string
   */
  public $pvkPath;

  /**
   * @param string
   */
  public function setCertPath($certPath)
  {
    $this->certPath = $certPath;
  }
  /**
   * @return string
   */
  public function getCertPath()
  {
    return $this->certPath;
  }
  /**
   * @param string
   */
  public function setPvkPassword($pvkPassword)
  {
    $this->pvkPassword = $pvkPassword;
  }
  /**
   * @return string
   */
  public function getPvkPassword()
  {
    return $this->pvkPassword;
  }
  /**
   * @param string
   */
  public function setPvkPath($pvkPath)
  {
    $this->pvkPath = $pvkPath;
  }
  /**
   * @return string
   */
  public function getPvkPath()
  {
    return $this->pvkPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImportContextBakImportOptionsEncryptionOptions::class, 'Google_Service_SQLAdmin_ImportContextBakImportOptionsEncryptionOptions');
