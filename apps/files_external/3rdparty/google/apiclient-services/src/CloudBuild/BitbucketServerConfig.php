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

namespace Google\Service\CloudBuild;

class BitbucketServerConfig extends \Google\Collection
{
  protected $collection_key = 'connectedRepositories';
  /**
   * @var string
   */
  public $apiKey;
  protected $connectedRepositoriesType = BitbucketServerRepositoryId::class;
  protected $connectedRepositoriesDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $hostUri;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $peeredNetwork;
  protected $secretsType = BitbucketServerSecrets::class;
  protected $secretsDataType = '';
  /**
   * @var string
   */
  public $sslCa;
  /**
   * @var string
   */
  public $username;
  /**
   * @var string
   */
  public $webhookKey;

  /**
   * @param string
   */
  public function setApiKey($apiKey)
  {
    $this->apiKey = $apiKey;
  }
  /**
   * @return string
   */
  public function getApiKey()
  {
    return $this->apiKey;
  }
  /**
   * @param BitbucketServerRepositoryId[]
   */
  public function setConnectedRepositories($connectedRepositories)
  {
    $this->connectedRepositories = $connectedRepositories;
  }
  /**
   * @return BitbucketServerRepositoryId[]
   */
  public function getConnectedRepositories()
  {
    return $this->connectedRepositories;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setHostUri($hostUri)
  {
    $this->hostUri = $hostUri;
  }
  /**
   * @return string
   */
  public function getHostUri()
  {
    return $this->hostUri;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPeeredNetwork($peeredNetwork)
  {
    $this->peeredNetwork = $peeredNetwork;
  }
  /**
   * @return string
   */
  public function getPeeredNetwork()
  {
    return $this->peeredNetwork;
  }
  /**
   * @param BitbucketServerSecrets
   */
  public function setSecrets(BitbucketServerSecrets $secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return BitbucketServerSecrets
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  /**
   * @param string
   */
  public function setSslCa($sslCa)
  {
    $this->sslCa = $sslCa;
  }
  /**
   * @return string
   */
  public function getSslCa()
  {
    return $this->sslCa;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
  /**
   * @param string
   */
  public function setWebhookKey($webhookKey)
  {
    $this->webhookKey = $webhookKey;
  }
  /**
   * @return string
   */
  public function getWebhookKey()
  {
    return $this->webhookKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BitbucketServerConfig::class, 'Google_Service_CloudBuild_BitbucketServerConfig');
