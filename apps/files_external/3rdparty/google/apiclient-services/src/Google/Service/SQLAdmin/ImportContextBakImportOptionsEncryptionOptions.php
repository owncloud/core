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

class Google_Service_SQLAdmin_ImportContextBakImportOptionsEncryptionOptions extends Google_Model
{
  public $certPath;
  public $pvkPassword;
  public $pvkPath;

  public function setCertPath($certPath)
  {
    $this->certPath = $certPath;
  }
  public function getCertPath()
  {
    return $this->certPath;
  }
  public function setPvkPassword($pvkPassword)
  {
    $this->pvkPassword = $pvkPassword;
  }
  public function getPvkPassword()
  {
    return $this->pvkPassword;
  }
  public function setPvkPath($pvkPath)
  {
    $this->pvkPath = $pvkPath;
  }
  public function getPvkPath()
  {
    return $this->pvkPath;
  }
}
