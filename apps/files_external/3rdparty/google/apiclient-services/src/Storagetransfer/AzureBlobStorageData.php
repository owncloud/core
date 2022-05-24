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

namespace Google\Service\Storagetransfer;

class AzureBlobStorageData extends \Google\Model
{
  protected $azureCredentialsType = AzureCredentials::class;
  protected $azureCredentialsDataType = '';
  /**
   * @var string
   */
  public $container;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $storageAccount;

  /**
   * @param AzureCredentials
   */
  public function setAzureCredentials(AzureCredentials $azureCredentials)
  {
    $this->azureCredentials = $azureCredentials;
  }
  /**
   * @return AzureCredentials
   */
  public function getAzureCredentials()
  {
    return $this->azureCredentials;
  }
  /**
   * @param string
   */
  public function setContainer($container)
  {
    $this->container = $container;
  }
  /**
   * @return string
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setStorageAccount($storageAccount)
  {
    $this->storageAccount = $storageAccount;
  }
  /**
   * @return string
   */
  public function getStorageAccount()
  {
    return $this->storageAccount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AzureBlobStorageData::class, 'Google_Service_Storagetransfer_AzureBlobStorageData');
