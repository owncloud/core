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
  public $commands;
  protected $credentialsType = Secret::class;
  protected $credentialsDataType = '';
  protected $encryptedEnvironmentType = Secret::class;
  protected $encryptedEnvironmentDataType = '';
  public $entrypoint;
  public $environment;
  public $flags;
  public $imageUri;
  public $labels;
  protected $mountsType = Mount::class;
  protected $mountsDataType = 'array';
  public $name;
  public $pidNamespace;
  public $portMappings;
  public $timeout;

  public function setCommands($commands)
  {
    $this->commands = $commands;
  }
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
  public function setEntrypoint($entrypoint)
  {
    $this->entrypoint = $entrypoint;
  }
  public function getEntrypoint()
  {
    return $this->entrypoint;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  public function getFlags()
  {
    return $this->flags;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPidNamespace($pidNamespace)
  {
    $this->pidNamespace = $pidNamespace;
  }
  public function getPidNamespace()
  {
    return $this->pidNamespace;
  }
  public function setPortMappings($portMappings)
  {
    $this->portMappings = $portMappings;
  }
  public function getPortMappings()
  {
    return $this->portMappings;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Action::class, 'Google_Service_Genomics_Action');
