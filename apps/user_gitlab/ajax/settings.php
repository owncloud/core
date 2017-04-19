<?php

/*
 * The MIT License
 *
 * Copyright 2016 cambierr.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace OCA\user_gitlab;

use OC;
use OCP\JSON;
use OCP\User;
use OCP\Util;

User::checkAdminUser();
JSON::checkAppEnabled('user_gitlab');
JSON::callCheck();


if (isset($_POST) && isset($_POST['gitlab_url']) && isset($_POST['gitlab_secret']) && filter_var($_POST['gitlab_url'], FILTER_VALIDATE_URL) && strlen($_POST['gitlab_secret']) > 0) {
    OC::$server->getConfig()->setAppValue('user_gitlab', 'gitlab_url', $_POST['gitlab_url']);
    OC::$server->getConfig()->setAppValue('user_gitlab', 'gitlab_secret', $_POST['gitlab_secret']);
} else {
    Util::writeLog('USER_GITLAB', "setting change endpointd called with wrong parameters", Util::WARN);
}