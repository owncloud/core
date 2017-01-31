<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

class ChromeDriverService extends DriverService {

  // The environment variable storing the path to the chrome driver executable.
  const CHROME_DRIVER_EXE_PROPERTY = "webdriver.chrome.driver";

  public static function createDefaultService() {
    $exe = getenv(self::CHROME_DRIVER_EXE_PROPERTY);
    $port = 9515; // TODO: Get another port if the default port is used.
    $args = array("--port=$port");
    $service = new ChromeDriverService($exe, $port, $args);
    return $service;
  }

}
