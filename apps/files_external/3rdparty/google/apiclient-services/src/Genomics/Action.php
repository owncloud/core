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

namespace Google\Service\Genomics;

class Action extends \Google\Collection
{
  protected $collection_key = 'mounts';
  /**
   * @var string[]
   */
  public $commands;
  protected $credentialsType = Secret::class;
  protected $credentialsDataType = '';
  protected $encryptedEnvironmentType = Secret::class;
  protected $encryptedEnvironmentDataType = '';
  /**
   * @var string
   */
  public $entrypoint;
  /**
   * @var string[]
   */
  public $environment;
  /**
   * @var string[]
   */
  public $flags;
  /**
   * @var string
   */
  public $imageUri;
  /**
   * @var string[]
   */
  public $labels;
  protected $mountsType = Mount::class;
  protected $mountsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pidNamespace;
  /**
   * @var int[]
   */
  public $portMappings;
  /**
   * @var string
   */
  public $timeout;

  /**
   * @param string[]
   */
  public function setCommands($commands)
  {
    $this->commands = $commands;
  }
  /**
   * @return string[]
   */
  public function getCommands()
  {
    return $this->commands;
  }
  /**
   * @param Secret
   */
  public function setCredentials(Secret $credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return Secret
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  /**
   * @param Secret
   */
  public function setEncryptedEnvironment(Secret $encryptedEnvironment)
  {
    $this->encryptedEnvironment = $encryptedEnvironment;
  }
  /**
   * @return Secret
   */
  public function getEncryptedEnvironment()
  {
    return $this->encryptedEnvironment;
  }
  /**
   * @param string
   */
  public function setEntrypoint($entrypoint)
  {
    $this->entrypoint = $entrypoint;
  }
  /**
   * @return string
   */
  public function getEntrypoint()
  {
    return $this->entrypoint;
  }
  /**
   * @param string[]
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string[]
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string[]
   */
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return string[]
   */
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param string
   */
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  /**
   * @return string
   */
  public function getImageUri()
  {
    return $this->imageUri;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Mount[]
   */
  public function setMounts($mounts)
  {
    $this->mounts = $mounts;
  }
  /**
   * @return Mount[]
   */
  public function getMounts()
  {
    return $this->mounts;
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
  public function setPidNamespace($pidNamespace)
  {
    $this->pidNamespace = $pidNamespace;
  }
  /**
   * @return string
   */
  public function getPidNamespace()
  {
    return $this->pidNamespace;
  }
  /**
   * @param int[]
   */
  public function setPortMappings($portMappings)
  {
    $this->portMappings = $portMappings;
  }
  /**
   * @return int[]
   */
  public function getPortMappings()
  {
    return $this->portMappings;
  }
  /**
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Action::class, 'Google_Service_Genomics_Action');
